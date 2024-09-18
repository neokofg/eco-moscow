import { inter, sofiaSansCondensed } from "@/src/app/fonts";
import { twMerge } from "tailwind-merge";

type FormattingProps = { children?: React.ReactNode; className?: string };

export const H1 = ({ children, className }: FormattingProps) => {
  return (
    <h1
      className={twMerge(["font-bold text-5xl uppercase", className])}
      style={sofiaSansCondensed.style}
    >
      {children}
    </h1>
  );
};

export const H2 = ({ children, className }: FormattingProps) => {
  return (
    <h2
      className={twMerge(["font-bold text-3xl uppercase"], className)}
      style={sofiaSansCondensed.style}
    >
      {children}
    </h2>
  );
};

export const TextBase = ({ children, className }: FormattingProps) => {
  return (
    <div
      className={twMerge(["text-base font-medium", className])}
      style={inter.style}
    >
      {children}
    </div>
  );
};
