import { sofiaSansCondensed } from "@/src/app/fonts";
import { FC } from "react";

export const ProfileEducationPage: FC = () => {
  return (
    <div>
      <h1
        className="font-bold text-[30px] leading-9 text-content-primary uppercase"
        style={sofiaSansCondensed.style}
      >
        образование
      </h1>
    </div>
  );
};
