import { FC } from "react";
import { IconType } from ".";

export const HandShakeIcon: FC<IconType> = (props) => {
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
        d="M4.414 17.86a.75.75 0 011.026.27c.827 1.417 2.09 2.49 3.65 3.185a.75.75 0 01-.612 1.37c-1.811-.809-3.33-2.08-4.334-3.8a.75.75 0 01.27-1.026zM18.906 3.922c-1.014-1.036-2.46-1.417-3.875-1.015a.75.75 0 01-.41-1.442c1.937-.552 3.954-.025 5.357 1.408a.75.75 0 11-1.072 1.049zM11.19 3.308c-.213-.367-.837-.59-1.47-.227-.632.36-.743.997-.533 1.357l2.526 4.332a.75.75 0 01-1.296.755L7.049 3.75c-.214-.367-.838-.59-1.471-.227-.632.36-.743.997-.532 1.357l3.788 6.497a.75.75 0 01-1.296.756L5.855 9.245c-.214-.367-.838-.59-1.472-.227-.631.36-.742.997-.532 1.357l3.789 6.497c1.608 2.759 5.579 3.654 8.946 1.73 3.365-1.923 4.56-5.764 2.955-8.517l-2.525-4.331c-.214-.367-.838-.59-1.472-.228-.631.361-.742.997-.532 1.358l1.684 2.887a.75.75 0 01-.276 1.03c-1.542.88-2.015 2.585-1.34 3.743a.75.75 0 11-1.296.756c-.912-1.565-.543-3.45.635-4.782.33-.372.443-.914.192-1.344l-3.42-5.866z"
        clipRule="evenodd"
      ></path>
    </svg>
  );
};