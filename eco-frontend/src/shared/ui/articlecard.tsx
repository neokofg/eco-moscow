import Image from "next/image";
import { UserAvatar } from "./useravatar";
import { FC } from "react";
import { formatViews } from "../lib/views";

interface ArticlesCardProps {
  author?: string;
  time?: string;
  views?: number;
  image?: string;
  name?: string;
  isBig?: boolean;
  description?: string;
  avatar_url?: string;
}

export const ArticlesCard: FC<ArticlesCardProps> = ({
  author = "Фамилия Имя",
  time = "3 часа назад",
  views = 1000000,
  image = "",
  name = "Китайские Автомобили на Свалках: кризис, экология и конкуренция",
  avatar_url = "",
  description,
  isBig = false,
}) => {
  return (
    <div
      className={`flex flex-col p-2 rounded-3xl ${isBig ? "w-[490px]" : "w-[364px]"} gap-2 bg-background-primary`}
    >
      <div className="flex flex-row gap-3 p-2 w-full items-center justify-start">
        <UserAvatar src={avatar_url} className="h-10 w-10" />
        <div className="flex flex-col items-start justify-start">
          <p className="font-medium text-sm text-content-primary">{author}</p>
          <p className="text-content-tertiary text-xs font-medium">
            {time} &#8226; {formatViews(views)}
          </p>
        </div>
      </div>
      <Image
        className="bg-background-tertiary rounded-2xl"
        width={isBig ? 474 : 348}
        height={isBig ? 256 : 216}
        alt="cardImage"
        src={image}
      />
      <div className="p-2 flex flex-col gap-2">
        <p className="text-content-primary text-lg font-semibold overflow-hidden">
          {name}
        </p>
        <p className="paragraph-small text-content-secondary">{description}</p>
      </div>
    </div>
  );
};
