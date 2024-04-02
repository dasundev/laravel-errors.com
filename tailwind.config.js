import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
  ],
  theme: {
      fontFamily: {
          'exception': ['Jetbrains Mono', 'system-ui']
      }
  },
  plugins: [typography],
}

