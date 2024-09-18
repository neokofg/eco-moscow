import { FC } from "react";
import { IconType } from ".";

export const LogoIcon: FC<IconType> = (props) => {
  const { width = 32, height = 32, color = "#16A34A" } = props;
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width={width}
      height={height}
      fill="none"
      viewBox="0 0 32 32"
    >
      <g clipPath="url(#clip0_60_318)">
        <path
          fill={color}
          d="M12.477 27.334c6.466 0 11.714-5.244 11.714-11.714a7.81 7.81 0 00-15.62 0 5.21 5.21 0 005.207 5.207 5.209 5.209 0 005.206-5.207 2.604 2.604 0 10-5.206 0h2.604a2.602 2.602 0 01-5.207 0 5.206 5.206 0 1110.412 0 7.81 7.81 0 01-15.618 0C5.97 9.87 10.63 5.21 16.382 5.21c5.75 0 10.411 4.661 10.411 10.411 0 7.906-6.411 14.316-14.316 14.316-1.025 0-2.022-.11-2.987-.316a15.545 15.545 0 006.892 1.618C25.006 31.238 32 24.245 32 15.62 32 6.993 25.006 0 16.382 0 7.755 0 .762 6.993.762 15.62c0 .403.03.8.06 1.196.602 5.908 5.588 10.518 11.655 10.518z"
        ></path>
      </g>
      <defs>
        <clipPath id="clip0_60_318">
          <rect width="32" height="32" fill="#fff" rx="12"></rect>
        </clipPath>
      </defs>
    </svg>
  );
};
