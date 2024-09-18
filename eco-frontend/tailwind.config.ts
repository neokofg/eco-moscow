import type { Config } from "tailwindcss";

const config: Config = {
  content: [
    "./pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/**/*.{js,ts,jsx,tsx}",
    "./components/**/*.{js,ts,jsx,tsx,mdx}",
    "./app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      container: {
        padding: "1rem",
        center: true,
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
      },
    },
  },
  plugins: [],
};
export default config;
