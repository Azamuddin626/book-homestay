import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import daisyui from "daisyui"; // ✅ Add this line

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                customFamily: ["Merriweather", "serif"],
            },
        },
    },

    plugins: [forms, daisyui],
};