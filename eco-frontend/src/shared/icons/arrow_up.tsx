import { FC } from "react";
import { IconType } from ".";

export const ArrowUp: FC<IconType> = (props) => {
  const { width = 15, height = 8, color = "#F4F4F5" } = props;
  return (
<svg width={width} height={height} viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path   fill={color} fill-rule="evenodd" clip-rule="evenodd" d="M7.51192 0.430558C7.79279 0.189814 8.20724 0.189814 8.48811 0.430558L15.4881 6.43056C15.8026 6.70012 15.839 7.1736 15.5695 7.48809C15.2999 7.80259 14.8264 7.83901 14.5119 7.56944L8.00001 1.98781L1.48811 7.56944C1.17361 7.83901 0.700138 7.80259 0.430571 7.48809C0.161005 7.1736 0.197426 6.70012 0.51192 6.43056L7.51192 0.430558Z"/>
</svg>

  );
};
