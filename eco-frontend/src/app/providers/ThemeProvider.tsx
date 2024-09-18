"use client";

import {
  Dispatch,
  FC,
  PropsWithChildren,
  SetStateAction,
  createContext,
  useCallback,
  useEffect,
  useState,
} from "react";

export type Theme = "default" | "dark" | undefined;

interface ThemeColors {
  white: string;
  black: string;
  contentPrimary: string;
  contentSecondary: string;
  contentTertiary: string;
  contentInversePrimary: string;
  contentInverseSecondary: string;
  contentInverseTertiary: string;
  backgroundPrimary: string;
  backgroundSecondary: string;
  backgroundTertiary: string;
  backgroundInversePrimary: string;
  backgroundInverseSecondary: string;
  backgroundInverseTertiary: string;
  backgroundHover: string;
  backgroundHoverOverlay: string;
  backgroundInverseHoverOverlay: string;
  borderPrimary: string;
  borderSecondary: string;
  borderTertiary: string;
  borderInversePrimary: string;
  borderInverseSecondary: string;
  borderInverseTertiary: string;
  borderHoverOverlay: string;
  borderInverseHoverOverlay: string;
  contentGreen: string;
  borderError: string;
  borderWarning: string;
  borderSuccess: string;
  backgroundRed: string;
  backgroundOrange: string;
  backgroundGreen: string;
}

interface ThemeContext {
  theme: Theme;
  setTheme: Dispatch<SetStateAction<Theme>>;
  colors: ThemeColors;
  setup: () => void;
}

const defaultValues: ThemeContext = {
  theme: undefined,
  setTheme: () => null,
  colors: {
    white: "",
    black: "",
    contentPrimary: "",
    contentSecondary: "",
    contentTertiary: "",
    contentInversePrimary: "",
    contentInverseSecondary: "",
    contentInverseTertiary: "",
    backgroundPrimary: "",
    backgroundSecondary: "",
    backgroundTertiary: "",
    backgroundInversePrimary: "",
    backgroundInverseSecondary: "",
    backgroundInverseTertiary: "",
    backgroundHover: "",
    backgroundHoverOverlay: "",
    backgroundInverseHoverOverlay: "",
    borderPrimary: "",
    borderSecondary: "",
    borderTertiary: "",
    borderInversePrimary: "",
    borderInverseSecondary: "",
    borderInverseTertiary: "",
    borderHoverOverlay: "",
    borderInverseHoverOverlay: "",
    contentGreen: "",
    borderError: "",
    borderWarning: "",
    borderSuccess: "",
    backgroundRed: "",
    backgroundOrange: "",
    backgroundGreen: "",
  },
  setup: () => null,
};

export const ThemeContext = createContext(defaultValues);

export const ThemeProvider: FC<PropsWithChildren> = ({ children }) => {
  const [theme, setTheme] = useState<Theme>(defaultValues.theme);
  const [colors, setColors] = useState<ThemeColors>(defaultValues.colors);

  const setup = useCallback(() => {
    localStorage.setItem("user_theme", "default");
    setTheme("default");
    //if (!("user_theme" in localStorage)) {
    //  if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
    //    document.documentElement.classList.add("dark");
    //    localStorage.setItem("user_theme", "dark");
    //    setTheme("dark");
    //  } else {
    //    document.documentElement.classList.remove("dark");
    //    localStorage.setItem("user_theme", "default");
    //    setTheme("default");
    //  }
    //} else if (theme == undefined && "user_theme" in localStorage) {
    //  if (localStorage.getItem("user_theme") === "dark") {
    //    document.documentElement.classList.add("dark");
    //  } else if (localStorage.getItem("user_theme") === "default") {
    //    document.documentElement.classList.remove("dark");
    //  }
    //
    //  setTheme(localStorage.getItem("user_theme") as Theme);
    //}
    //
    //if (theme === "dark" && localStorage.getItem("user_theme") === "default") {
    //  document.documentElement.classList.add("dark");
    //  localStorage.setItem("user_theme", "dark");
    //} else if (
    //  theme === "default" &&
    //  localStorage.getItem("user_theme") === "dark"
    //) {
    //  document.documentElement.classList.remove("dark");
    //  localStorage.setItem("user_theme", "default");
    //}
    setColors({
      white: getComputedStyle(document.body).getPropertyValue("--white"),
      black: getComputedStyle(document.body).getPropertyValue("--black"),
      contentPrimary: getComputedStyle(document.body).getPropertyValue(
        "--content-primary",
      ),
      contentSecondary: getComputedStyle(document.body).getPropertyValue(
        "--content-secondary",
      ),
      contentTertiary: getComputedStyle(document.body).getPropertyValue(
        "--content-tertiary",
      ),
      contentInversePrimary: getComputedStyle(document.body).getPropertyValue(
        "--content-inverse-primary",
      ),
      contentInverseSecondary: getComputedStyle(document.body).getPropertyValue(
        "--content-inverse-secondary",
      ),
      contentInverseTertiary: getComputedStyle(document.body).getPropertyValue(
        "--content-inverse-tertiary",
      ),
      backgroundPrimary: getComputedStyle(document.body).getPropertyValue(
        "--background-primary",
      ),
      backgroundSecondary: getComputedStyle(document.body).getPropertyValue(
        "--background-secondary",
      ),
      backgroundTertiary: getComputedStyle(document.body).getPropertyValue(
        "--background-tertiary",
      ),
      backgroundInversePrimary: getComputedStyle(
        document.body,
      ).getPropertyValue("--background-inverse-primary"),
      backgroundInverseSecondary: getComputedStyle(
        document.body,
      ).getPropertyValue("--background-inverse-secondary"),
      backgroundInverseTertiary: getComputedStyle(
        document.body,
      ).getPropertyValue("--background-inverse-tertiary"),
      backgroundHover: getComputedStyle(document.body).getPropertyValue(
        "--background-hover",
      ),
      backgroundHoverOverlay: getComputedStyle(document.body).getPropertyValue(
        "--background-hover-overlay",
      ),
      backgroundInverseHoverOverlay: getComputedStyle(
        document.body,
      ).getPropertyValue("--background-inverse-hover-overlay"),
      borderPrimary: getComputedStyle(document.body).getPropertyValue(
        "--border-primary",
      ),
      borderSecondary: getComputedStyle(document.body).getPropertyValue(
        "--border-secondary",
      ),
      borderTertiary: getComputedStyle(document.body).getPropertyValue(
        "--border-tertiary",
      ),
      borderInversePrimary: getComputedStyle(document.body).getPropertyValue(
        "--border-inverse-primary",
      ),
      borderInverseSecondary: getComputedStyle(document.body).getPropertyValue(
        "--border-inverse-secondary",
      ),
      borderInverseTertiary: getComputedStyle(document.body).getPropertyValue(
        "--border-inverse-tertiary",
      ),
      borderHoverOverlay: getComputedStyle(document.body).getPropertyValue(
        "--border-hover-overlay",
      ),
      borderInverseHoverOverlay: getComputedStyle(
        document.body,
      ).getPropertyValue("--border-inverse-hover-overlay"),
      contentGreen: getComputedStyle(document.body).getPropertyValue(
        "--content-green",
      ),
      borderError: getComputedStyle(document.body).getPropertyValue(
        "--border-error",
      ),
      borderWarning: getComputedStyle(document.body).getPropertyValue(
        "--border-warning",
      ),
      borderSuccess: getComputedStyle(document.body).getPropertyValue(
        "--border-success",
      ),
      backgroundRed: getComputedStyle(document.body).getPropertyValue(
        "--background-red",
      ),
      backgroundOrange: getComputedStyle(document.body).getPropertyValue(
        "--background-orange",
      ),
      backgroundGreen: getComputedStyle(document.body).getPropertyValue(
        "--background-green",
      ),
    });
  }, [theme, setColors]);

  useEffect(() => {
    setup();
  }, [setup]);

  const values = {
    theme,
    setTheme,
    colors,
    setup,
  };

  return (
    <ThemeContext.Provider value={values}>{children}</ThemeContext.Provider>
  );
};
