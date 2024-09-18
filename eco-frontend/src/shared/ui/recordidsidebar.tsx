import Image from "next/image";
import { AvatarIcon } from "../icons";
import { Button } from "./button";

const RecordIdSidebar = ({ name = "Фамилия Имя", time = "3 часа назад", views="1 млн просмотров", title='Обновления Leader-ID в мае 2024',content='Привет! Это команда Leader-ID с майскими обновлениями. Добавили переговорные комнаты и фильтр прошедших мероприятий, исправили сортировку в кабинете организатора и еще кое-что.' }) => {
  return (
    <div className="flex flex-col h-fit p-4 w-[352px] items-center bg-background-primary rounded-3xl">
      <div className="flex flex-row gap-3 items-center justify-start w-full">
        <AvatarIcon />
        <div className="flex flex-col">
          <p className="text-base text-content-primary">{name}</p>
          <p className="text-content-tertiary text-xs font-medium">
              {time} &#8226; {views}
            </p>
        </div>
      </div>
      <div className="p-2 flex flex-col gap-2">
        <p className="text-lg font-semibold text-content-primary">{title}</p>
        <p className="text-sm font-medium text-content-secondary h-10 overflow-hidden">{content}</p>
      </div>
    </div>
  );
};
export { RecordIdSidebar };
