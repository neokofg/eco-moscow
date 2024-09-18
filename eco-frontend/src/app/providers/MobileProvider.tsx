"use client";

import {
  FC,
  PropsWithChildren,
  createContext,
  useEffect,
  useState,
} from "react";

type MobileContext = boolean;
const defaultValues: MobileContext = false;

export const MobileContext = createContext(defaultValues);

export const MobileProvider: FC<PropsWithChildren> = ({ children }) => {
  const [isMobile, setMobile] = useState(defaultValues);

  useEffect(() => {
    function handleResize() {
      setMobile(window.innerWidth < 1280);
    }

    handleResize();
    window.addEventListener("resize", handleResize);
    return () => window.removeEventListener("resize", handleResize);
  }, []);

  return (
    <MobileContext.Provider value={isMobile}>{children}</MobileContext.Provider>
  );
};
