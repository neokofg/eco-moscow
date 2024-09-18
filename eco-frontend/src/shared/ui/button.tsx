"use client";

import { cva, type VariantProps } from "class-variance-authority";
import { forwardRef } from "react";
import { Button as HeadlessButton } from "@headlessui/react";
import { cn } from "@/src/shared/lib/utils";

const buttonVariants = cva("flex gap-[10px] font-semibold text-base", {
  variants: {
    variant: {
      default: "bg-content-green text-content-inverse-primary",
      destructive: "",
      secondary: "text-content-primary bg-background-tertiary",
      ghost: "bg-transparent text-content-primary",
    },
    size: {
      default: "py-3 px-6 rounded-2xl",
      lg: "py-4 px-6 rounded-2xl",
      sm: "py-3 px-6 rounded-lg",
      "icon-lg": "h-14 w-14 p-4 rounded-2xl",
      "icon-md": "h-12 w-12 p-3 rounded-2xl",
      "icon-sm": "h-8 w-8 p-2 rounded-lg",
    },
  },
  defaultVariants: {
    variant: "default",
    size: "default",
  },
});

export interface ButtonProps
  extends React.ButtonHTMLAttributes<HTMLButtonElement>,
  VariantProps<typeof buttonVariants> { }

const Button = forwardRef<HTMLButtonElement, ButtonProps>(
  ({ className, variant, size, ...props }, ref) => {
    return (
      <HeadlessButton
        className={cn(buttonVariants({ variant, size, className }))}
        ref={ref}
        {...props}
      />
    );
  },
);
Button.displayName = "Button";

export { Button, buttonVariants };
