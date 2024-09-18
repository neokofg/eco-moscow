import { Footer } from "@/src/widgets/footer";
import { Header } from "@/src/widgets/header";
import { FC, PropsWithChildren } from "react";
import { MobileProvider, ThemeProvider } from "../providers";

export const MainLayout: FC<PropsWithChildren> = ({ children }) => {
  return (
    <ThemeProvider>
      <MobileProvider>
        <main className="bg-background-secondary">
          <Header />
          {children}
          <Footer />
        </main>
      </MobileProvider>
    </ThemeProvider>
  );
};
