"use client";
import { useUser } from "@/src/app/providers";
import { publicAPI } from "@/src/shared/api";
import { ArticlesCard } from "@/src/shared/ui/articlecard";
import { Button } from "@/src/shared/ui/button";
import { CategoryBadge } from "@/src/shared/ui/category-badge";
import { Dialog, DialogContent, DialogTrigger } from "@/src/shared/ui/dialog";
import { Input } from "@/src/shared/ui/input";
import { NavLink } from "@/src/shared/ui/navlink";
import Link from "next/link";
import { FC, useEffect, useState } from "react";

interface Categoriy {
  id: string;
  title: string;
  thumb_url: string;
}

interface Event {
  id: string;
  title: string;
  content: string;
  views: number;
  address: string;
  image_url: string;
  location: string;
  created_at: string;
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

const eventsLinks = [
  {
    href: "/events",
    title: "Мероприятия",
  },
  {
    href: "/promotions",
    title: "Акции",
  },
  {
    href: "/competitions",
    title: "Конкурсы",
  },
  {
    href: "/volunteerings",
    title: "Волонтёрство",
  },
  {
    href: "/marathons",
    title: "Марафон",
  },
];

function findTitleByHref(href: string) {
  const foundObject = eventsLinks.find((item) => item.href === href);
  return foundObject;
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

interface EventsPageProps {
  type: string;
}

export const EventsPage: FC<EventsPageProps> = ({ type }) => {
  const [categories, setCategories] = useState<Categoriy[]>([]);
  const [search, setSearch] = useState<string>("");
  const [events, setEvents] = useState<Event[]>([]);
  const { user } = useUser();

  const getEvents = async () => {
    let url =
      "https://events.eco-mos.ru/api/v1" +
      findTitleByHref(type)?.href +
      "?first=30&page=1";
    if (search.length > 0) url += `&search=${search}`;

    const res = await fetch(url, {
      method: "GET",
    });
    const json = await res.json();

    setEvents(json["data"]["data"]);
  };

  const getCategories = async () => {
    return publicAPI.get("/api/v1/categories?first=8&page=1").then((res) => {
      setCategories(res.data.data.data);
    });
  };

  useEffect(() => {
    getCategories();
    getEvents();
  }, []);

  return (
    <div className="min-h-[calc(100vh-88px)] mt-6 container flex flex-col">
      <div className="flex flex-row items-center justify-start w-full gap-4">
        <div className="bg-content-primary px-4 py-3 text-content-inverse-primary rounded-2xl">
          Главное
        </div>
        <div className="flex gap-4 w-full overflow-scroll">
          {categories.map((c) => (
            <CategoryBadge src={c.thumb_url} title={c.title} />
          ))}
        </div>
      </div>
      <h3 className="mt-12">{findTitleByHref(type)?.title}</h3>
      <div className="mb-[32px] rounded-3xl mt-6 bg-background-primary">
        <div className="flex gap-4 p-6 w-full">
          <Input
            FullWidth
            value={search}
            onChange={(e) => setSearch(e.target.value)}
            placeholder="Поиск по мероприятиям"
          />

          <Button
            className="w-[96px] flex justify-center items-center"
            onClick={() => getEvents()}
          >
            Найти
          </Button>
        </div>
        <div className="flex gap-6 px-6">
          {eventsLinks.map((c) => (
            <NavLink
              className="p-0  p b-1 label-base text-content-tertiary"
              activeClassName="text-content-primary border-b-[3px] border-border-success"
              href={c.href}
            >
              {c.title}
            </NavLink>
          ))}
        </div>
      </div>

      {user?.is_organizer && (
        <div className="p-6 bg-content-green rounded-3xl flex justify-between items-center text-content-inverse-primary">
          <div className="flex gap-1 flex-col w-[50%]">
            <h5 className="text-content-inverse-primary">
              создайте мероприятия
            </h5>
            <span className="text-content-inverse-primary">
              Действуйте, основываясь на мнении вашей аудитории, и создавайте
              простые мероприятия для сбора быстрой обратной связи!
            </span>
          </div>
          <Link
            href="/events/create"
            className="py-3 px-6 bg-background-primary rounded-2xl text-content-primary font-semibold"
          >
            Создайте мероприятия
          </Link>
          {/*
             *
             *
             *
          <Dialog>
            <DialogTrigger asChild>
              <Button
                className="bg-background-primary w-[250px] text-content-primary"
                onClick={() => { }}
              >
                Создайте мероприятия
              </Button>
            </DialogTrigger>
            <DialogContent></DialogContent>
          </Dialog>
             */}
        </div>
      )}
      <div className="grid grid-cols-4 gap-4">
        {events.map((e) => (
          <Link key={e.id} href={type + "/" + e.id}>
            <ArticlesCard
              key={e.id}
              time={getTimeAgo(e.created_at)}
              avatar_url={e.user.avatar_url}
              author={e.user.fio}
              views={e.views}
              image={"/mock_image.png"}
              description={e.content}
              name={e.title}
            />
          </Link>
        ))}
      </div>
      <div>{}</div>
    </div>
  );
};
