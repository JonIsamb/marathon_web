/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php"],
    theme: {
      colors: {
        accent: "#ef4444"
      },
        extend: {

        },
    },
    plugins: [],
    safelist: [
        ...[...Array(12).keys()].flatMap((i) => [
            `col-span-${i + 1}`,
            `sm:col-span-${i + 1}`,
            `md:col-span-${i + 1}`,
            `lg:col-span-${i + 1}`,
            `xl:col-span-${i + 1}`,
            `2xl:col-span-${i + 1}`,
            `gap-${i + 1}`,
        ]),
    ],
};
