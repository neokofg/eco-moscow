import { FC } from "react";
import { IconType } from ".";

export const DangerCircleIcon: FC<IconType> = (props) => {
  const { width = 24, height = 24, color = "#F59E0B" } = props;
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
        fillRule="evenodd"
        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10 10-4.477 10-10zM12 6.25a.75.75 0 01.75.75v6a.75.75 0 01-1.5 0V7a.75.75 0 01.75-.75zM12 17a1 1 0 100-2 1 1 0 000 2z"
        clipRule="evenodd"
      ></path>
    </svg>
  );
};
