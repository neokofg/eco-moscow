"use client";
import { useUser } from "@/src/app/providers";
import { formatViews } from "@/src/shared/lib/views";
import { Button } from "@/src/shared/ui/button";
import { UserAvatar } from "@/src/shared/ui/useravatar";
import Image from "next/image";
import { FC, useEffect, useState } from "react";

interface EventPage {
  id: string;
  type: string;
}

interface Data {
  id: string;
  title: string;
  content: string;
  views: number;
  address: string;
  image_url: string;
  location: string;
  participating: boolean | null;
  created_at: string;
  participators: number;
  user: {
    id: string;
    fio: string;
    avatar_url: string;
  };
  category: {
    id: string;
    title: string;
  };
}

function getTimeAgo(utcTime: string) {
  const now = new Date();
  const publishedDate = new Date(utcTime);
  const diffInSeconds = Math.floor(
    (now.getTime() - publishedDate.getTime()) / 1000,
  );
  const intervals = [
    { label: "год", seconds: 31536000 },
    { label: "месяц", seconds: 2592000 },
    { label: "день", seconds: 86400 },
    { label: "час", seconds: 3600 },
    { label: "минута", seconds: 60 },
    { label: "секунда", seconds: 1 },
  ];

  for (let i = 0; i < intervals.length; i++) {
    const interval = intervals[i];
    const count = Math.floor(diffInSeconds / interval.seconds);

    if (count >= 1) {
      if (count === 1) {
        return `1 ${interval.label} назад`;
      } else {
        let label = interval.label;
        if (interval.label === "месяц" && count >= 2 && count <= 4) {
          label = "месяца";
        } else if (interval.label === "месяц") {
          label = "месяцев";
        } else if (count >= 2 && count <= 4) {
          if (label == "минута") label = "минуты";
          else if (label == "секунда") label = "секунды";
          else label += "а";
        } else {
          if (label == "минута") label = "минут";
          else if (label == "секунда") label = "секунд";
          else label += "ов";
        }
        return `${count} ${label} назад`;
      }
    }
  }

  return "только что";
}

export const EventPage: FC<EventPage> = ({ id, type }) => {
  const [data, setData] = useState<Data>();
  const { token } = useUser();
  const getPage = async () => {
    const res = await fetch(
      "https://events.eco-mos.ru/api/v1/" + type + "/" + id,
    );
    const json = await res.json();

    setData(json["data"]);
  };

  const participate = async () => {
    const res = await fetch(
      "https://events.eco-mos.ru/api/v1/" +
      type +
      "/" +
      data?.id +
      "/participate",
      {
        method: "POST",
        headers: {
          Authorization: "Bearer " + token,
        },
        body: JSON.stringify({}),
      },
    );

    const json = await res.json();

    console.log(json);
  };

  const promote = async () => {
    const res = await fetch(
      "https://events.eco-mos.ru/api/v1/" +
      type +
      "/" +
      data?.id +
      "/participate",
      {
        method: "POST",
        headers: {
          Authorization: "Bearer " + token,
        },
        body: JSON.stringify({}),
      },
    );

    const json = await res.json();

    console.log(json);
  };

  useEffect(() => {
    getPage();
  }, []);

  if (!data) return;

  return (
    <section className="container flex justify-end gap-8 mt-6">
      <div className="w-[736px] bg-background-primary rounded-3xl p-6 flex gap-6 flex-col">
        <div className="flex gap-3 items-center">
          <UserAvatar src={data.user.avatar_url} />
          <div className="flex flex-col">
            <span>{data.user.fio}</span>
            <span className="label-small text-content-tertiary">
              0 подписчиков
            </span>
          </div>
        </div>

        <div>
          <h4 className="mb-4">{data.title}</h4>
          <div className="flex gap-6">
            <span className="label-tiny bg-background-tertiary py-1 px-3 rounded-full">
              {data.category.title}
            </span>
            <span className="flex gap-2 text-content-tertiary">
              <Image
                width={24}
                height={24}
                alt="clock"
                src="/clock_square.svg"
              />{" "}
              {getTimeAgo(data.created_at)}
            </span>
            <span className="flex gap-2 text-content-tertiary">
              <Image width={24} height={24} alt="eye" src="/eye.svg" />{" "}
              {formatViews(data.views)}
            </span>
          </div>
        </div>
        <Image
          className="w-full"
          src={"/mock_image.png"}
          alt={data.title}
          width={688}
          height={458}
        />
        {type == "events" ? (
          <div className="bg-background-secondary p-6 flex gap-4 rounded-3xl items-center">
            <div className="bg-background-primary rounded-full p-4">
              <Image width={24} height={24} alt="point" src="/map_point.svg" />
            </div>
            <span className="text-content-tertiary">{data.address}</span>
          </div>
        ) : (
          type == "promotions" && <></>
        )}
        <Button
          onClick={() => {
            if (type == "promotions") promote();
            else participate();
          }}
        >
          {type == "promotions" ? "Пожертвовать" : "Участвовать"}
        </Button>
        <p>{data.content}</p>
      </div>
      <div className="w-[352px] h-[172px] rounded-3xl p-6 bg-background-primary">
        <h5 className="text-[30px]">участники</h5>
        <div className="flex gap-3 mt-6 items-center">
          <Image src="/avatar.svg" alt="avatar" width={64} height={64} />
          <div className="flex flex-col">
            <span>Участников: {data.participators}</span>
            <span className="label-small text-content-tertiary">
              Посмотреть всех
            </span>
          </div>
        </div>
      </div>
    </section>
  );
};
