import type { Metadata } from "next";

import "@/src/app/styles";
import { inter } from "../fonts";
import { MainLayout } from ".";
import { cookies } from "next/headers";
import { UserProvider } from "../providers";

export const metadata: Metadata = {
  title: "ЭКО МОСКВА",
  description: "Здесь вы увидите эко-мероприятия города Москвы!",
};

export function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  const cookieStore = cookies();
  const token = cookieStore.get("token");

  return (
    <html lang="en">
      <body className={inter.className}>
        <UserProvider cookie_token={token?.value as string}>
          <MainLayout>{children}</MainLayout>
        </UserProvider>
      </body>
    </html>
  );
}
