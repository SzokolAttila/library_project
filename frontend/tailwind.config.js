/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "formkit.theme.ts",
      "./index.html",
      "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        import('@tailwindcss/aspect-ratio'),
        import('@tailwindcss/container-queries'),
        import('@tailwindcss/forms'),
        import('@tailwindcss/typography')
    ],
  }