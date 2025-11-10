// tailwind.config.js
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", // (Bisa dihapus jika tidak pakai Vue)
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}