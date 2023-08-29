/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/errors/404.blade.php"
  ],
  theme: {
    extend: {
      colors: {
        accent: "#F4A051",
        onhover: "#f07c0f",
        // onhover: "#E5A66C",
        background: "#D9D9D9",
        buttons: "#C3C3C3",
        disabled: "#4f4f4f",
        bgsec: "#949494",
        open: "#B1E320",
        closed: "#E34320"
      },
      borderRadius: {
          'lg': '10px',
      },
    },
  },
  plugins: [],
}

