import { CheckboxProps, Checkbox as HeadlessCheckbox } from "@headlessui/react";
import { FC } from "react";
import { CheckIcon } from "@/src/shared/icons";
import { cn } from "../lib/utils";

export const Checkbox: FC<CheckboxProps> = ({ className, ...props }) => {
  return (
    <HeadlessCheckbox
      className={cn(
        "group/checkbox cursor-pointer data-[checked]:bg-content-green h-5 w-5 rounded-md p-[2px] bg-background-tertiary",
        className,
      )}
      {...props}
    >
      <CheckIcon />
    </HeadlessCheckbox>
  );
};
