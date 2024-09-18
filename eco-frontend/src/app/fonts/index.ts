import { Inter, Sofia_Sans_Condensed } from "next/font/google";

export const inter = Inter({
  subsets: ["latin", "cyrillic"],
  display: "swap",
  variable: "--font-inter",
});

export const sofiaSansCondensed = Sofia_Sans_Condensed({
  subsets: ["latin", "cyrillic"],
  display: "swap",
  variable: "--font-sofia-sans-condensed",
});
