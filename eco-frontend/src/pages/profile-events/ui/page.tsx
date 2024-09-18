import { sofiaSansCondensed } from "@/src/app/fonts";
import { FC } from "react";

export const ProfileEventsPage: FC = () => {
  return (
    <div>
      <h1
        className="font-bold text-[30px] leading-9 text-content-primary uppercase"
        style={sofiaSansCondensed.style}
      >
        мои мероприятия
      </h1>
    </div>
  );
};
