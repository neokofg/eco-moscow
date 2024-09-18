import { FC } from "react";
import { IconType } from ".";

export const AvatarIcon: FC<IconType> = (props) => {
  const { width = 48, height = 48, color = "#F4F4F5" } = props;
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width={width}
      height={height}
      fill="none"
      viewBox="0 0 48 48"
    >
      <rect width="48" height="48" fill={color} rx="24"></rect>
      <ellipse
        cx="24"
        cy="16"
        fill="#000"
        fillOpacity="0.2"
        rx="5.333"
        ry="5.333"
      ></ellipse>
      <ellipse
        cx="24"
        cy="30.667"
        fill="#000"
        fillOpacity="0.2"
        rx="9.333"
        ry="5.333"
      ></ellipse>
    </svg>
  );
};
