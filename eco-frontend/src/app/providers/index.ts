"use client";

import { useContext } from "react";
import { ThemeContext } from "./ThemeProvider";
import { MobileContext } from "./MobileProvider";

export { ThemeProvider, type Theme } from "./ThemeProvider";
export { MobileProvider } from "./MobileProvider";
export const useTheme = () => useContext(ThemeContext);
export const useMobile = () => useContext(MobileContext);
