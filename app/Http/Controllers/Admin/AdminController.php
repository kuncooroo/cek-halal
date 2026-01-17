<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Notifications\AdminNotification; 

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user('admin')->cannot('viewAny', Admin::class)) {
            abort(403, 'Anda tidak memiliki izin untuk melihat daftar admin.');
        }

        $admins = Admin::when($request->search, function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.admin.index', compact('admins'));
    }

    public function create(Request $request)
    {
        if ($request->user('admin')->cannot('create', Admin::class)) {
            abort(403, 'Hanya Superadmin yang boleh menambah admin.');
        }

        return view('admin.admin.create');
    }
    public function store(StoreAdminRequest $request)
    {

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $this->processImage($request->file('avatar'), 'create');
        }

        $newAdmin = Admin::create($validated);

        Log::info('Admin created successfully', [
            'by_admin_id' => auth()->guard('admin')->id(),
            'created_email' => $validated['email']
        ]);

        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();
        if ($user) {
            $user->notify(new AdminNotification(
                'Admin baru "' . $newAdmin->name . '" telah ditambahkan.',
                'important', 
                route('admin.admin.index')
            ));
        }

        return redirect()
            ->route('admin.admin.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit(Request $request, Admin $admin)
    {
        if ($request->user('admin')->cannot('update', $admin)) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit admin ini.');
        }

        return view('admin.admin.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {

        $validated = $request->validated();

        $admin->name  = $validated['name'];
        $admin->email = $validated['email'];
        $admin->phone = $validated['phone'];
        $admin->role  = $validated['role'];

        if ($request->filled('password')) {
            $admin->password = Hash::make($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
                Storage::disk('public')->delete($admin->avatar);
            }

            $admin->avatar = $this->processImage($request->file('avatar'), 'update', $admin->id);
        }

        $admin->save();

        Log::info('Admin updated', [
            'by_admin_id' => auth()->guard('admin')->id(),
            'target_admin_id' => $admin->id
        ]);

        return redirect()
            ->route('admin.admin.index')
            ->with('success', 'Data admin berhasil diperbarui.');
    }

    public function destroy(Request $request, Admin $admin)
    {
        if ($request->user('admin')->cannot('delete', $admin)) {
            abort(403, 'Hanya Superadmin yang bisa menghapus data.');
        }

        if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
            Storage::disk('public')->delete($admin->avatar);
        }

        Log::warning('Admin deleted', [
            'by_admin_id' => auth()->guard('admin')->id(),
            'deleted_admin_id' => $admin->id,
            'deleted_admin_email' => $admin->email
        ]);

        $admin->delete();

        return redirect()
            ->route('admin.admin.index')
            ->with('success', 'Admin berhasil dihapus.');
    }

    private function processImage($file, $action, $id = null)
    {
        try {
            $startTime = microtime(true);

            $manager = new ImageManager(new Driver());
            $filename = 'admin_' . Str::uuid() . '.webp';
            $path = 'avatars/admins/' . $filename;

            $image = $manager->read($file);

            $image->cover(300, 300);

            $image->text('CONFIDENTIAL', 150, 280, function ($font) {
                $font->size(24);
                $font->color('rgba(255, 255, 255, 0.5)');
                $font->align('center');
                $font->valign('middle');
            });

            $encoded = $image->toWebp(80);

            Storage::disk('public')->put($path, $encoded);

            $duration = round((microtime(true) - $startTime) * 1000, 2);
            Log::info("Avatar uploaded & processed ({$action})", [
                'filename' => $filename,
                'size_kb' => round(strlen($encoded) / 1024, 2),
                'processing_time_ms' => $duration,
                'admin_id' => $id ?? 'new'
            ]);

            return $path;
        } catch (\Exception $e) {
            Log::error("Avatar upload failed: " . $e->getMessage());
            throw $e;
        }
    }
    public function destroyAvatar(Admin $admin)
    {
        if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
            Storage::disk('public')->delete($admin->avatar);
            $admin->update(['avatar' => null]);
        }

        return back()->with('success', 'Foto profil berhasil dihapus.');
    }
}