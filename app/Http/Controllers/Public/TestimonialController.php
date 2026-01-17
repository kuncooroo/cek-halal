<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\Admin; 
use App\Notifications\AdminNotification; 
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $approvedTestimonials = Testimoni::where('status', 'approved')
            ->latest()
            ->get();

        return view('public.testimonial', compact('approvedTestimonials'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'rating'  => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:1000',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('testimonials', 'public');
            $imagePath = 'storage/' . $imagePath;
        }

        $testimoni = Testimoni::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'rating'  => $validated['rating'],
            'message' => $validated['message'],
            'image'   => $imagePath,
            'status'  => 'pending',
        ]);

        try {
            $admins = Admin::all(); 
            
            foreach ($admins as $admin) {

                $admin->notify(new AdminNotification(
                    'Testimoni baru masuk dari ' . $testimoni->name, 
                    'info', 
                    route('admin.testimoni.index', ['status' => 'pending']) 
                ));
            }
        } catch (\Exception $e) {
        }

        return redirect()
            ->route('testimonial')
            ->with(
                'success',
                'Terima kasih! Testimoni Anda telah dikirim dan sedang menunggu persetujuan admin.'
            );
    }
}