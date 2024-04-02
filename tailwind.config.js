import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [typography],
}

