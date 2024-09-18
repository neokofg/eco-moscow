import { inter } from "@/src/app/fonts";
import { AvatarIcon } from "../icons";
import Image from "next/image";

const RecordCard = ({
  name = "Фамилия Имя",
  subs = "8 тыс. подписчиков",
  title = "10 леденящих душу триллеров про маньяков",
  time = "3 часа назад",
  content = "Привет! Это команда Leader-ID с майскими обновлениями. Добавили переговорные комнаты и фильтр прошедших мероприятий, исправили сортировку в кабинете организатора и еще кое-что.",
  views = "12 689 просмотров",
  image = "",
  likes='1',
  dislikes='1',
comments='1'
}) => {
  return (
    <div className="flex flex-col gap-6 bg-background-primary rounded-3xl w-[736px] p-6">
      <div className="flex flex-row justify-between items-center">
        <div className="flex flex-row gap-2">
          <AvatarIcon />
          <div className="flex flex-col items-start justify-start text-start">
            <p className="text-content-primary font-medium text-base">{name}</p>
            <p className="text-content-primary font-medium text-sm">{subs}</p>
          </div>
        </div>
        <div className="bg-background-tertiary rounded-2xl px-6 py-3 ">
          Вы подписаны
        </div>
      </div>
      <div className="flex flex-col gap-2">
        <p className="text-lg font-semibold" style={inter.style}>
          {title}
        </p>
        <p className="text-sm text-content-secondary font-medium h-10 overflow-hidden">
          {content}
        </p>
      </div>
      <Image
        alt=""
        width={720}
        height={440}
        className={`bg-background-tertiary rounded-2xl border-none ${image.length === 0 ? 'hidden':''}`}
        src={image}

      />
      <div className="flex flex-row justify-between items-center">
        <div className="flex flex-row gap-6">
          <div className="flex flex-row gap-1">
            <Image src="/Like.svg" width={24} height={24} alt="like" />
            <p className="text-base text-content-tertiary font-medium">{likes}</p>
          </div>
          <div className="flex flex-row gap-1">
            <Image src="/Dislike.svg" width={24} height={24} alt="dislike" />
            <p className="text-base text-content-tertiary font-medium">{dislikes}</p>
          </div>
          <div className="flex flex-row gap-1">
            <Image src="/comments.svg" width={24} height={24} alt="comments" />
            <p className="text-base text-content-tertiary font-medium">{comments}</p>
          </div>
        </div>

        <div className="flex flex-row gap-6">
          <div className="flex flex-row gap-1">
            <Image src="/clock.svg" className="fill-content-tertiary stroke-content-tertiary"  width={24} height={24} alt="clock" />
            <p className="text-base text-content-tertiary font-medium">{time}</p>

          </div>
          <div className="flex flex-row gap-1">
            <Image src="/Eye.png" width={24} height={24} alt="eye" />
            <p className="text-base text-content-tertiary font-medium">{views}</p>

          </div>
        </div>
      </div>
    </div>
  );
};
export { RecordCard };
