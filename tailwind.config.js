/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/*.php",
    "./app/views/**/*.php",
    "./app/views/**/**/*.php",
    "./app/views/**/**/**/*.php",
  ],
  theme: {
    screens: {
      'ss': '425px',
      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    extend: {},
  },
  plugins: [
    require("daisyui"),
    require('@tailwindcss/line-clamp'),
  ],
}

