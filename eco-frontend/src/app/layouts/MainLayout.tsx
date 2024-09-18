import { Footer } from "@/src/widgets/footer";
import { Header } from "@/src/widgets/header";
import { FC, PropsWithChildren } from "react";
import { MobileProvider, ThemeProvider } from "../providers";
import { Toaster } from "@/src/shared/ui/toaster";

export const MainLayout: FC<PropsWithChildren> = ({ children }) => {
  return (
    <ThemeProvider>
      <MobileProvider>
        <main className="bg-background-secondary flex flex-col min-h-screen">
          <Header />
          {children}
          <div className="flex-1" />
          <Footer />
        </main>
        <Toaster />
      </MobileProvider>
    </ThemeProvider>
  );
};
