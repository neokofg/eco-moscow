import { FC } from "react";
import { IconType } from ".";

export const ChevronRightIcon: FC<IconType> = (props) => {
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
        d="M7.881 3.383a.875.875 0 011.238 0l6.406 6.407a3.125 3.125 0 010 4.42L9.12 20.616A.875.875 0 017.88 19.38l6.407-6.407a1.375 1.375 0 000-1.944L7.881 4.62a.875.875 0 010-1.238z"
      ></path>
    </svg>
  );
};
