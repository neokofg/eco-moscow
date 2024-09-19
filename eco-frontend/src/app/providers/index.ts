"use client";

import { useContext } from "react";
import { MapContext } from "./MapProvider";
import { UserContext } from "./UserProvider";
import { ThemeContext } from "./ThemeProvider";
import { MobileContext } from "./MobileProvider";
import { SignInContext } from "./SignInProvider";

export { MapProvider } from "./MapProvider";
export { UserProvider } from "./UserProvider";
export { ThemeProvider, type Theme } from "./ThemeProvider";
export { MobileProvider } from "./MobileProvider";
export { SignInProvider } from "./SignInProvider";
export const useMap = () => useContext(MapContext);
export const useUser = () => useContext(UserContext);
export const useTheme = () => useContext(ThemeContext);
export const useMobile = () => useContext(MobileContext);
export const useSignIn = () => useContext(SignInContext);
