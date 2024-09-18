import { FC } from "react";
import { AssetType } from ".";

export const BurgerIcon: FC<AssetType> = (props) => {
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
        d="M20.75 7a.75.75 0 01-.75.75H4a.75.75 0 010-1.5h16a.75.75 0 01.75.75zM20.75 12a.75.75 0 01-.75.75H4a.75.75 0 010-1.5h16a.75.75 0 01.75.75zM20.75 17a.75.75 0 01-.75.75H4a.75.75 0 010-1.5h16a.75.75 0 01.75.75z"
        clipRule="evenodd"
      ></path>
    </svg>
  );
};
