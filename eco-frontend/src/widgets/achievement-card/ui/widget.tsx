import Image from "next/image";
import { FC } from "react";

interface AchievementCardProps {
  img: string;
  title: string;
  description: string;
  procent: number;
}
export const AchievementCard: FC<AchievementCardProps> = ({
  img,
  title,
  description,
  procent,
}) => {
  return (
    <div className="bg-background-secondary flex flex-col gap-2 rounded-3xl p-2 max-w-[276px]">
      <Image width={260} height={247} src={img} alt={title} />
      <div className="p-2 flex flex-col gap-1">
        <span className="font-semibold">{title}</span>
        <span className="paragraph-small">{description}</span>
      </div>
      <div className="bg-background-tertiary flex justify-between p-4 rounded-2xl">
        <div className="flex flex-col gap-1">
          <span className="label-tiny">Есть у {procent}% пользователей</span>
          <span className="label-tiny text-content-tertiary">
            Не так просто встретить
          </span>
        </div>
        <div className="p-1.5 bg-background-primary rounded-full">
          <object type="image/svg+xml" data="/gold-star.svg" />
        </div>
      </div>
    </div>
  );
};
