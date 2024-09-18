import { sofiaSansCondensed } from "@/src/app/fonts";
import { AchievementCard } from "@/src/widgets/achievement-card";
import { FC } from "react";

export const ProfileAchievementsPage: FC = () => {
  return (
    <div>
      <h1
        className="font-bold text-[30px] leading-9 text-content-primary uppercase"
        style={sofiaSansCondensed.style}
      >
        достижения
      </h1>
      <AchievementCard />
    </div>
  );
};
