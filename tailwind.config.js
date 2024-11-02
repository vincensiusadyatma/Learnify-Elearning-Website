/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {},
        screens: {
            'tablet': '768px',
            'laptop': '1024px'
        }
    },
    darkMode: 'class',
    plugins: [
        require('flowbite/plugin'),
    ],
}


