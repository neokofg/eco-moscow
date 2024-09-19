import Image from "next/image";
import { AvatarIcon } from "../icons";

const VideosCard = ({
  author = "Фамилия Имя",
  time = "3 часа назад",
  views = "1 млн просмотров",
  image = "",
  name = "Китайские Автомобили на Свалках: кризис, экология и конкуренция",
  isBig = false,
}) => {
  return (
    <div
      className={`flex flex-col p-2 rounded-3xl ${isBig ? "w-[490px]" : "w-[364px]"} gap-2 bg-background-primary`}
    >
      <Image
        className="bg-background-tertiary rounded-2xl"
        width={isBig ? 474 : 348}
        height={isBig ? 256 : 216}
        alt="cardImage"
        src={image}
      />
      <div className="flex flex-row w-full items-center justify-start">
        <AvatarIcon />
        <div className="flex flex-col items-start justify-start">
          <p className="font-medium text-sm text-content-primary">{author}</p>
          <p className="text-content-tertiary text-xs font-medium">
            {time} &#8226; {views}
          </p>
        </div>
      </div>
      <p className="text-content-primary text-lg font-semibold h-14 px-2 overflow-hidden">
        {name}
      </p>
    </div>
  );
};
export { VideosCard };
