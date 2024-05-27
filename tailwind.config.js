/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            width: {
                300: "300px",
            },
            height: {
                500: "500px",
            },
        },
    },
    plugins: [],
};
