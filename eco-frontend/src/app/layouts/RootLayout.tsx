import type { Metadata } from "next";

import "@/src/app/styles";
import { inter } from "../fonts";

export const metadata: Metadata = {
  title: "ЭКО МОСКВА",
  description: "Здесь вы увидите эко-мероприятия города Москвы!",
};

export function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className={`${inter.className} antialiased`}>{children}</body>
    </html>
  );
}
