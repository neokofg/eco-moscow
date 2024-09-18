import { FC } from "react";
import { IconType } from ".";

export const CheckIcon: FC<IconType> = (props) => {
  const { width = 16, height = 16, color = "#FFFFFF" } = props;
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      className="opacity-0 group-data-[checked]/checkbox:opacity-100"
      width={width}
      height={height}
      fill="none"
      viewBox="0 0 16 16"
    >
      <path
        stroke={color}
        strokeLinecap="round"
        strokeLinejoin="round"
        strokeWidth="2"
        d="M13.333 4L6 11.333 2.667 8"
      ></path>
    </svg>
  );
};
