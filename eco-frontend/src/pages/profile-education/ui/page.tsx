import { sofiaSansCondensed } from "@/src/app/fonts";
import { EditEducation } from "@/src/features/edit-education";
import { FC } from "react";

export const ProfileEducationPage: FC = () => {
  return (
    <div>
      <h1
        className="mb-6 font-bold text-[30px] leading-9 text-content-primary uppercase"
        style={sofiaSansCondensed.style}
      >
        образование
      </h1>
      <EditEducation />
    </div>
  );
};
