import { FC } from "react";
import { IconType } from ".";

export const UsersGroupIcon: FC<IconType> = (props) => {
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
        d="M15.5 7.5a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0zM18 16.5c0 1.933-2.686 3.5-6 3.5s-6-1.567-6-3.5S8.686 13 12 13s6 1.567 6 3.5zM7.122 5c.178 0 .35.017.518.05A4.977 4.977 0 007 7.5c0 .868.221 1.685.61 2.396-.158.03-.32.045-.488.045-1.414 0-2.561-1.106-2.561-2.47C4.561 6.106 5.708 5 7.122 5zM5.447 18.986C4.88 18.307 4.5 17.474 4.5 16.5c0-.944.357-1.756.896-2.423C3.49 14.225 2 15.267 2 16.529c0 1.275 1.517 2.325 3.447 2.457zM17 7.5c0 .868-.222 1.685-.611 2.396.158.03.321.045.488.045 1.415 0 2.561-1.106 2.561-2.47 0-1.365-1.146-2.471-2.56-2.471-.178 0-.351.017-.519.05.408.724.64 1.56.64 2.45zM18.552 18.986c1.93-.132 3.447-1.182 3.447-2.457 0-1.263-1.49-2.304-3.395-2.452.539.667.895 1.479.895 2.423 0 .974-.379 1.807-.947 2.486z"
      ></path>
    </svg>
  );
};
