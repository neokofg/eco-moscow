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
        "border border-border-primary min-w-[163px] flex bg-background-primary flex-row rounded-2xl",
        active ? "bg-content-primary text-content-inverse-primary" : "",
      )}
    >
      <Image
        width={48}
        height={48}
        alt={title[0] + title[1]}
        src={src}
        className="bg-background-tertiary rounded-s-2xl"
      />
      <p className="px-4 py-3">{title}</p>
    </div>
  );
};
