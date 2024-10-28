import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                "oxford-blue": "#334153",
                iron: "#d1d8d9",
                hoki: "#67869f",
                "pine-cone": "#62544b",
                beaver: "#8d7456",
                nepal: "#91abbc",
                "natural-gray": "#938c88",
                mongoose: "#baa88b",
                "hit-gray": "#a8b1b9",
                "fountain-blue": "#48a4b8",
                background: "#F4F6FF",
                heading: "#33372C",
                text: "#3C3D37",
                "dark-text": "#F4F6FF",
                "dark-heading": "#d1d8d9",
            },
        },
    },

    plugins: [forms],
};
