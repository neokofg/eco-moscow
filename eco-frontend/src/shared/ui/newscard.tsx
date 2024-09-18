import Image from "next/image";
import { Badge } from "./badge";

const NewsCard = ({
  category = "Категория",
  image = "",
  time = "3 часа назад",
  name = "Обновления Leader-ID в мае 2024",
  desc = "Привет! Это команда Leader-ID с майскими обновлениями. Добавили переговорные комнаты и фильтр прошедших мероприятий, исправили сортировку в кабинете организатора и еще кое-что.",
}) => {
  return (
    <div className="p-2 bg-background-primary rounded-3xl flex flex-col gap-2 w-[490px] h-[388px] items-center justify-center">
      <Image
        alt="cardImage"
        src={image}
        width={474}
        height={216}
        className="rounded-xl bg-background-secondary mt-2"
      />
      <div className="flex flex-col gap-2 p-2">
        <div className="flex flex-row gap-2 items-center justify-start w-full">
          <Badge text={category} />
          <p className="text-content-tertiary text-xs font-medium">{time}</p>
        </div>
        <div className="flex flex-col gap-2">
          <h1 className="text-content-primary text-lg font-semibold">{name}</h1>
          <p className="text-content-secondary text-sm font-medium h-16 overflow-hidden">
            {desc}
          </p>
        </div>
      </div>
    </div>
  );
};
export { NewsCard };
