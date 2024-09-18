import type { Config } from "tailwindcss";
import plugin from "tailwindcss/plugin";

const config: Config = {
  content: [
    "./pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/**/*.{js,ts,jsx,tsx}",
    "./components/**/*.{js,ts,jsx,tsx,mdx}",
    "./app/**/*.{js,ts,jsx,tsx,mdx}",
    "./**/*.{svg}",
  ],
  theme: {
    extend: {
      container: {
        padding: "1rem",
        center: true,
      },
      fontFamily: {
        sofiaSansCondensed: ["var(--font-sofia-sans-condensed)"],
        inter: ["var(--font-inter)"],
      },
      colors: {
        white: "var(--white)",
        black: "var(--black)",
        "content-primary": "var(--content-primary)",
        "content-secondary": "var(--content-secondary)",
        "content-tertiary": "var(--content-tertiary)",
        "content-inverse-primary": "var(--content-inverse-primary)",
        "content-inverse-secondary": "var(--content-inverse-secondary)",
        "content-inverse-tertiary": "var(--content-inverse-tertiary)",
        "background-primary": "var(--background-primary)",
        "background-secondary": "var(--background-secondary)",
        "background-tertiary": "var(--background-tertiary)",
        "background-inverse-primary": "var(--background-inverse-primary)",
        "background-inverse-secondary": "var(--background-inverse-secondary)",
        "background-inverse-tertiary": "var(--background-inverse-tertiary)",
        "background-hover": "var(--background-hover)",
        "background-hover-overlay": "var(--background-hover-overlay)",
        "background-inverse-hover-overlay":
          "var(--background-inverse-hover-overlay)",
        "border-primary": "var(--border-primary)",
        "border-secondary": "var(--border-secondary)",
        "border-tertiary": "var(--border-tertiary)",
        "border-inverse-primary": "var(--border-inverse-primary)",
        "border-inverse-secondary": "var(--border-inverse-secondary)",
        "border-inverse-tertiary": "var(--border-inverse-tertiary)",
        "border-hover-overlay": "var(--border-hover-overlay)",
        "border-inverse-hover-overlay": "var(--border-inverse-hover-overlay)",
        "content-green": "var(--content-green)",
        "border-error": "var(--border-error)",
        "border-warning": "var(--border-warning)",
        "border-success": "var(--border-success)",
        "background-red": "var(--background-red)",
        "background-orange": "var(--background-orange)",
        "background-green": "var(--background-green)",
      },
    },
  },
  plugins: [
    require("tailwindcss-animate"),
    plugin(function({ addComponents }) {
      addComponents({
        ".display-extra-large": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-9xl font-bold text-content-primary":
            {},
        },

        ".display-large": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-8xl font-bold text-content-primary":
            {},
        },

        ".display-medium": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-7xl font-bold text-content-primary":
            {},
        },

        ".display-small": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-6xl font-bold text-content-primary":
            {},
        },

        ".display-tiny": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-5xl font-bold text-content-primary":
            {},
        },

        ".heading-large": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-4xl font-bold text-content-primary":
            {},
        },

        ".heading-medium": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-3xl font-bold text-content-primary":
            {},
        },

        ".heading-small": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-2xl font-bold text-content-primary":
            {},
        },

        ".heading-tiny": {
          "@apply tracking-tight uppercase font-sofiaSansCondensed text-xl font-bold text-content-primary":
            {},
        },

        ".label-large": {
          "@apply font-inter text-lg font-medium text-content-primary": {},
        },

        ".label-base": {
          "@apply font-inter text-base font-medium text-content-primary": {},
        },

        ".label-small": {
          "@apply font-inter text-sm font-medium text-content-primary": {},
        },

        ".label-tiny": {
          "@apply font-inter text-xs font-medium text-content-primary": {},
        },

        ".paragraph-large": {
          "@apply font-inter text-lg font-normal text-content-primary": {},
        },

        ".paragraph-base": {
          "@apply font-inter text-base font-normal text-content-primary": {},
        },

        ".paragraph-small": {
          "@apply font-inter text-sm font-normal text-content-primary": {},
        },

        ".paragraph-tiny": {
          "@apply font-inter text-xs font-normal text-content-primary": {},
        },
      });
    }),
  ],
};
export default config;
