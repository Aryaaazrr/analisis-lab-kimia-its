/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            container: {
                center: true,
                padding: "16px",
            },
            colors: {
                primary: "2F6D46",
                secondary: "1C3324",
            },
        },
        screens: {
            xs: "320px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            '2xl': "1536px",
        },
    },
    plugins: [require("flowbite/plugin")],
};
