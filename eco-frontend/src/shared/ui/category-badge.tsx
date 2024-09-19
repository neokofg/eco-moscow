"use client";
import Image from "next/image";
import { FC } from "react";
import { cn } from "../lib/utils";

interface CategoryBadgeProps {
  src: string;
  title: string;
  active?: boolean;
}
export const CategoryBadge: FC<CategoryBadgeProps> = ({
  src,
  title,
  active,
}) => {
  return (
    <div
      className={cn(
        "border shrink-0 border-border-primary min-w-[192px] flex bg-background-primary flex-row rounded-2xl",
        active ? "bg-content-primary" : "",
      )}
    >
      <Image
        width={48}
        height={48}
        alt={title[0] + title[1]}
        src={src}
        className="bg-background-tertiary rounded-s-2xl"
      />
      <p
        className={cn(
          "px-4 py-3",
          active ? "text-content-inverse-primary" : "",
        )}
      >
        {title}
      </p>
    </div>
  );
};
