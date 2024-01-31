/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: '1rem',
    },
    screens: {
      lg: { min: "1023px" },
      md: { min: "767px" },
      sm: { min: "639px" },
    },
    extend: {
      colors: {
        gold: {
          1: '#F9F295',
          2: '#E0AA3E',
          3: '#FAF398',
          4: '#B88A44',
        },
      },
    },
  },
  plugins: [],
}
