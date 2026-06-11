/** @type {import('tailwindcss').Config} */
export default {
  content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
  theme: {
    extend: {
      colors: {
        cr: {
          white: '#ffffff',
          dark: '#050505',
          surface: '#161c24',
          'surface-light': '#1c232e',
          orange: '#cc4a04',         // Naranja Oscuro
          'orange-hover': '#ea580c', // Naranja Claro
          blue: '#173154',           // Azul Marino Oscuro
          'blue-light': '#2c5b9c',   // Azul Claro (Para el degradado)
          light: '#cbced6'
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'], 
        display: ['Montserrat', 'sans-serif'],
        mono: ['monospace'], 
      }
    },
  },
  plugins: [],
}