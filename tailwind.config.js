/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
          container: {
            center: true, 
            padding: '16px',
          },
          colors: {
            primary: '2F6D46',
            secondary: '1C3324',
          },
        },
    },
    plugins: [
      require('flowbite/plugin')
    ],
};
