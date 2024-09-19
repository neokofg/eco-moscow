"use client";

import { IMaskInput } from "react-imask";
import {
  FC,
  forwardRef,
  HTMLInputTypeAttribute,
  InputHTMLAttributes,
  useState,
} from "react";
import { Input as HeadlessInput } from "@headlessui/react";
import { cn } from "@/src/shared/lib/utils";
import { EyeClosedIcon, EyeIcon, IconType } from "@/src/shared/icons";
import { Button } from "./button";
import { PopoverTrigger } from "./popover";
import { InputMask, MaskedDate } from "imask";

export interface InputProps extends InputHTMLAttributes<HTMLInputElement> {
  withAsterisk?: boolean;
  Icon?: FC<IconType>;
  IconStart?: FC<IconType>;
  FullWidth?: boolean;
}

const Input = forwardRef<HTMLInputElement, InputProps>(
  (
    {
      placeholder,
      Icon,
      withAsterisk,
      className,
      type,
      IconStart,
      FullWidth,
      ...props
    },
    ref,
  ) => {
    return (
      <div
        className={cn(
          "transition duration-100 relative",
          FullWidth && "w-full",
        )}
      >
        {IconStart && (
          <div className="absolute left-4 top-4">
            <IconStart />
          </div>
        )}
        <label
          className={cn(
            "select-none pointer-events-none transition duration-300 absolute text-content-tertiary top-4 text-base font-medium left-4",
            props.value &&
            placeholder &&
            "translate-y-[-8px] opacity-100 text-content-primary text-xs",
            IconStart && "pl-10",
            className,
          )}
        >
          {placeholder}
          {withAsterisk && <span className="text-border-error">*</span>}
        </label>
        <HeadlessInput
          type={type}
          className={cn(
            "transition duration-300 p-4 bg-background-secondary w-full outline outline-[1.5px] outline-border-secondary rounded-2xl text-content-primary text-base placeholder:text-transparent disabled:text-border-hover-overlay",
            props.value &&
            placeholder &&
            "placeholder:text-opacity-0 pt-[26px] pb-[6px]",
            Icon && "pr-12",
            IconStart && "pl-14",
            className,
          )}
          ref={ref}
          {...props}
        />
        {Icon && (
          <div className="absolute right-4 top-4">
            <Icon />
          </div>
        )}
      </div>
    );
  },
);
Input.displayName = "Input";

const PasswordInput = forwardRef<HTMLInputElement, InputProps>(
  (
    { placeholder, withAsterisk, className, type = "password", ...props },
    ref,
  ) => {
    const [inputType, setInputType] = useState<HTMLInputTypeAttribute>(type);
    return (
      <div className="transition duration-100 relative">
        <label
          className={cn(
            "select-none pointer-events-none transition duration-300 absolute text-content-tertiary top-4 text-base font-medium left-4",
            props.value &&
            placeholder &&
            "translate-y-[-8px] opacity-100 text-content-primary text-xs",
          )}
        >
          {placeholder}
          {withAsterisk && <span className="text-border-error">*</span>}
        </label>
        <HeadlessInput
          type={inputType}
          className={cn(
            "transition duration-300 p-4 pr-12 bg-background-secondary w-full outline outline-[1.5px] outline-border-secondary rounded-2xl text-content-primary text-base placeholder:text-transparent disabled:text-border-hover-overlay",
            props.value &&
            placeholder &&
            "placeholder:text-opacity-0 pt-[26px] pb-[6px]",
            className,
          )}
          ref={ref}
          {...props}
        />
        <Button
          className="absolute right-4 top-4"
          variant="ghost"
          size="icon-xs"
          onClick={() =>
            setInputType((prev) => (prev === "text" ? "password" : "text"))
          }
        >
          {inputType == "text" && <EyeIcon />}
          {inputType == "password" && <EyeClosedIcon />}
        </Button>
      </div>
    );
  },
);
PasswordInput.displayName = "PasswordInput";

interface MaskInputProps extends InputProps {
  onAccept: (
    value: InputMask<MaskedDate>["value"],
    maskRef: InputMask<{ [x: string]: unknown }>,
    e?: InputEvent | undefined,
  ) => void;
}

const MaskInput = forwardRef<HTMLInputElement, MaskInputProps>(
  ({ placeholder, Icon, withAsterisk, className, type, ...props }, ref) => {
    return (
      <div className="transition duration-100 relative">
        <label
          className={cn(
            "select-none pointer-events-none transition duration-300 absolute text-content-tertiary top-4 text-base font-medium left-4",
            props.value &&
            placeholder &&
            "translate-y-[-8px] opacity-100 text-content-primary text-xs",
          )}
        >
          {placeholder}
          {withAsterisk && <span className="text-border-error">*</span>}
        </label>
        <IMaskInput
          mask={Date}
          className={cn(
            "transition duration-300 p-4 bg-background-secondary w-full outline outline-[1.5px] outline-border-secondary rounded-2xl text-content-primary text-base placeholder:text-transparent disabled:text-border-hover-overlay",
            props.value &&
            placeholder &&
            "placeholder:text-opacity-0 pt-[26px] pb-[6px]",
            Icon && "pr-12",
            className,
          )}
          onAccept={props.onAccept}
          ref={ref}
          value={props.value as string}
        />
        {Icon && (
          <div className="absolute right-4 top-4">
            <PopoverTrigger>
              <Icon />
            </PopoverTrigger>
          </div>
        )}
      </div>
    );
  },
);
MaskInput.displayName = "MaskInput";

export { Input, PasswordInput, MaskInput };
