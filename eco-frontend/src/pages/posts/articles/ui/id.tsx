import { AvatarIcon } from "@/src/shared/icons";
import { Avatar } from "@/src/shared/ui/avatar";
import Image from "next/image";

const ArticleId = ({
  name = "фамилия имя",
  subs = "",
  article = "",
  cat = "Категория",
  eye = "",
  time = "3 часа назад",
  timer = "",
  views = "12689 просмотров",
  
}) => {
  return (
    <div className="py-4 flex flex-row justify-center">
      <div className="w-[712px] rounded-3xl p-6 bg-background-primary">
        <div className="flex flex-row justify-between">
          <div className="flex flex-row">
            <AvatarIcon />
            <div className="flex flex-col items-center">
              <p className="text-content-primary font-medium text-base">
                {name}
              </p>
              <p className="text-content-primary font-medium text-sm">{subs}</p>
            </div>
          </div>
          <div className="bg-background-tertiary rounded-2xl py-6 px-3 ">
            Вы подписаны
          </div>
        </div>
        <div className="flex flex-col gap-4">
          <h1 className="font-bold text-5xl leading-[-2.5%]">{name}</h1>
          <div className="flex flex-row gap-6">
            <div className="px-3 py-1 bg-background-tertiary rounded-full">
              {cat}
            </div>
            <div className="flex flex-row gap-1 items-center">
              <Image
                alt=";"
                width={24}
                height={24}
                className="bg-background-tertiary"
                src={timer}
              />
              <p className="text-base text-content-tertiary font-medium ">
                {time}
              </p>
            </div>
            <div className="flex flex-row gap-1 items-center">
              <Image
                alt=";"
                width={24}
                height={24}
                className="bg-background-tertiary"
                src={eye}
              />
              <p className="text-base text-content-tertiary font-medium ">
                {views}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div>{article}</div>
    </div>
  );
};
export { ArticleId };
