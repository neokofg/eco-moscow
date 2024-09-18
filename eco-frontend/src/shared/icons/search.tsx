import { FC } from "react";
import { IconType } from ".";

export const SearchIcon: FC<IconType> = (props) => {
  const { width = 24, height = 24, color = "#A1A1AA" } = props;
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
        d="M11.5 2.75a8.75 8.75 0 100 17.5 8.75 8.75 0 000-17.5zM1.25 11.5c0-5.66 4.59-10.25 10.25-10.25S21.75 5.84 21.75 11.5c0 2.56-.939 4.902-2.491 6.698l3.271 3.272a.75.75 0 11-1.06 1.06l-3.272-3.271A10.21 10.21 0 0111.5 21.75c-5.66 0-10.25-4.59-10.25-10.25z"
        clipRule="evenodd"
      ></path>
    </svg>
  );
};
