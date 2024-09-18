import { FC } from "react";
import { IconType } from ".";

export const ChevronLeftIcon: FC<IconType> = (props) => {
  const { width = 24, height = 24, color = "#09090B" } = props;
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width={width}
      height={height}
      fill="none"
      viewBox="0 0 24 24"
    >
      <path
        fill={color}
        d="M16.119 20.617a.875.875 0 01-1.238 0L8.474 14.21a3.125 3.125 0 010-4.42l6.407-6.406A.875.875 0 1116.12 4.62l-6.407 6.407a1.375 1.375 0 000 1.944l6.407 6.407a.875.875 0 010 1.238z"
      ></path>
    </svg>
  );
};
