import { FC } from "react";

interface AchievementCardProps {
  k;
}
export const AchievementCard: FC = () => {
  return (
    <div className="bg-background-secondary rounded-3xl p-2">
      <img />
      <div>
        <div>
          <span>{}</span>
          <p>{}</p>
        </div>
        <div>
          <div>
            <span>{}</span>
            <span>{}</span>
          </div>
          <div className="p-1.5 bg-background-primary rounded-full">
            <object type="image/svg+xml" data="/gold-star.svg" />
          </div>
        </div>
      </div>
    </div>
  );
};
