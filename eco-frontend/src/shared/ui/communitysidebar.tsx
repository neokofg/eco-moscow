import Image from "next/image";
import { AvatarIcon } from "../icons";
import { Button } from "./button";
import { sofiaSansCondensed } from "@/src/app/fonts";

const CommunitySidebar = ({
  name = "Фамилия Имя",
  subs = "8 тыс подписчиков",
}) => {
  return (
    <div className="flex flex-col gap-4">
      <div className="flex flex-row gap-3 bg-background-primary rounded-3xl w-[352px] justify-between p-6 items-center">
        <div className="flex flex-row gap-3 items-center">
          <AvatarIcon />
          <div className="flex flex-col">
            <p className="text-base text-content-primary">{name}</p>
            <p className="text-content-tertiary text-sm">
              Ваш публичный профиль
            </p>
          </div>
        </div>
        <Button
          className="text-center"
          color="white"
          variant={"secondary"}
          size={"icon-sm"}
        >
          <Image src={"/ChevronLeft.svg"} width={16} height={16} alt=">" />
        </Button>
      </div>
      <div className="w-[352px] bg-background-primary rounded-3xl  gap-4 p-6 flex flex-col">
        <p className="text-3xl leading-[-2.5%] font-bold" style={sofiaSansCondensed.style}>РЕКОМЕНДАЦИИ</p>
        <div className="flex flex-row justify-between items-center">
          <div className="flex flex-row gap-3 items-center">
            <AvatarIcon />
            <div className="flex flex-col">
              <p className="text-base text-content-primary">{name}</p>
              <p className="text-content-tertiary text-sm">{subs}</p>
            </div>
          </div>
          <Button className="text-center" color="white" size={"icon-sm"}>
            <Image src={"/plus.svg"} width={16} height={16} alt=">" />
          </Button>
        </div>
        <div className="flex flex-row justify-between items-center">
          <div className="flex flex-row gap-3 items-center">
            <AvatarIcon />
            <div className="flex flex-col">
              <p className="text-base text-content-primary">{name}</p>
              <p className="text-content-tertiary text-sm">{subs}</p>
            </div>
          </div>
          <Button className="text-center" color="white" size={"icon-sm"}>
            <Image src={"/plus.svg"} width={16} height={16} alt=">" />
          </Button>
        </div>
        <div className="flex flex-row justify-between items-center">
          <div className="flex flex-row gap-3 items-center">
            <AvatarIcon />
            <div className="flex flex-col">
              <p className="text-base text-content-primary">{name}</p>
              <p className="text-content-tertiary text-sm">{subs}</p>
            </div>
          </div>
          <Button className="text-center" color="white" size={"icon-sm"}>
            <Image src={"/plus.svg"} width={16} height={16} alt=">" />
          </Button>
        </div>
        <div className="flex flex-row justify-between items-center">
          <div className="flex flex-row gap-3 items-center">
            <AvatarIcon />
            <div className="flex flex-col">
              <p className="text-base text-content-primary">{name}</p>
              <p className="text-content-tertiary text-sm">{subs}</p>
            </div>
          </div>
          <Button className="text-center" color="white" size={"icon-sm"}>
            <Image src={"/plus.svg"} width={16} height={16} alt=">" />
          </Button>
        </div>
        <div className="flex flex-row justify-between items-center">
          <div className="flex flex-row gap-3 items-center">
            <AvatarIcon />
            <div className="flex flex-col">
              <p className="text-base text-content-primary">{name}</p>
              <p className="text-content-tertiary text-sm">{subs}</p>
            </div>
          </div>
          <Button className="text-center" color="white" size={"icon-sm"}>
            <Image src={"/plus.svg"} width={16} height={16} alt=">" />
          </Button>
        </div>
      </div>
    </div>
  );
};
export { CommunitySidebar };
