/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/filament/**/*.blade.php',
    ],
    theme: {
      extend: {
        colors: {
            primary: {
                500: '#4f46e5', // Indigo
                600: '#4338ca',
                700: '#3730a3',
            },
            secondary: {
                500: '#9333ea', // Purple
                600: '#7e22ce',
            },
        },
      },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),

    ],
  }
