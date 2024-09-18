import Image from "next/image";
import { FC } from "react";

interface CategoryBadgeProps {
  src: string;
  title: string;
}
export const CategoryBadge: FC<CategoryBadgeProps> = ({ src, title }) => {
  return (
    <div className="flex bg-background-primary flex-row rounded-2xl">
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
