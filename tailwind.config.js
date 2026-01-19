import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#1e88e5',
                    hover: '#1565c0',
                },
                navy: {
                    DEFAULT: '#0f172a',
                },
                gray: {
                    text: '#64748b',
                    light: '#94a3b8',
                },
                bg: {
                    light: '#f8fbff', 
                },
                pastel: {
                    blue: '#e3f2fd',
                    pink: '#fce4ec',
                    purple: '#f3e5f5',
                    orange: '#fff3e0',
                }
            },
            container: {
                center: true,
                padding: '1.5rem',
                screens: {
                    lg: '1200px',
                    xl: '1400px',
                },
            },
            animation: {
                'float': 'float 3s ease-in-out infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                }
            }
        },
    },
    plugins: [],
};