"use client";
import { useMap } from "@/src/app/providers";
import { publicAPI } from "@/src/shared/api";
import { ArticlesCard } from "@/src/shared/ui/articlecard";
import { Input } from "@/src/shared/ui/input";
import { Map } from "@/src/widgets/map";
import { load } from "@2gis/mapgl";
import Image from "next/image";
import Link from "next/link";
import { useSearchParams } from "next/navigation";
import { FC, useEffect, useState } from "react";

interface CategoryCardProps {
  src: string;
  title: string;
}

interface Categoriy {
  id: string;
  title: string;
  thumb_url: string;
}
const CategoryCard: FC<CategoryCardProps> = (props) => {
  return (
    <div className="w-full bg-background-secondary rounded-2xl py-4 flex flex-col gap-2 justify-center items-center">
      <Image
        className="h-[64px] w-[64px] rounded-full"
        src={props.src}
        alt={props.title}
        width={64}
        height={64}
      />
      <span className="label-small">{props.title}</span>
    </div>
  );
};

interface Event {
  id: string;
  title: string;
  content: string;
  views: number;
  address: string;
  image_url: string;
  location: string;
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

export const MapPage: FC<{ category_id: string }> = ({ category_id }) => {
  const { mapInstance } = useMap();

  const [categories, setCategories] = useState<Categoriy[]>([]);
  const [events, setEvents] = useState<Event[]>([]);
  const [search, setSearch] = useState<string>("");

  const setMap = async () => {
    if (mapInstance == undefined) return;

    let url = "https://events.eco-mos.ru/api/v1/events?first=30&page=1";
    if (category_id != undefined) url += `&category_id=${category_id}`;
    if (search.length > 0) url += `&search=${search}`;

    const res = await fetch(url, {
      method: "GET",
    });
    const json = await res.json();

    const e: Event[] = json["data"]["data"];

    setEvents(json["data"]["data"]);

    const mapglAPI = await load();

    for (let i = 0; i < e.length; i++) {
      const cords = e[i].location.split(",").map(Number);

      const marker = new mapglAPI.Marker(mapInstance, {
        coordinates: cords,
      });

      const popup = new mapglAPI.HtmlMarker(mapInstance, {
        coordinates: marker.getCoordinates(),
        html: `<div class="p-4 absolute rounded-lg bg-background-primary translate-x-[-50%] translate-y-[-150%] flex justify-between min-w-[280px]">
                    <div class="flex flex-col gap-4">
                      <div class="flex flex-col">
                        <span class="label-small text-background-hover">${e[i].title}</span>
                        <span class="label-tiny text-content-tertiary">${e[i].category.title}</span>
                      </div>
                      <p class="label-small text-content-tertiary">${e[i].address}</p>
                    </div>
                    <img src="${e[i].user.avatar_url}" alt="avatar" />
                </div>`,
      });

      const popupHtml = popup.getContent();
      popupHtml.style.display = "none";

      marker.on("mouseover", () => (popupHtml.style.display = "block"));

      marker.on("mouseout", () => {
        popupHtml.style.display = "none";
      });
    }
  };

  const getCategories = async () => {
    return publicAPI.get("/api/v1/categories?first=8&page=1").then((res) => {
      setCategories(res.data.data.data);
    });
  };

  useEffect(() => {
    if (search.length > 0) setMap();
  }, [search]);

  useEffect(() => {
    getCategories();
    setMap();
  }, [mapInstance]);

  return (
    <div className="relative container rounded-3xl mt-4 mb-12">
      <div className="absolute left-[22px] top-2 z-50 w-[418px]">
        <div className="p-6 rounded-3xl flex flex-col gap-6 bg-background-primary ">
          <h4>ПОИСК</h4>
          <Input
            value={search}
            onChange={(e) => setSearch(e.target.value)}
            placeholder="Поиск по мероприятиям"
          />
        </div>

        {search == "" && category_id == undefined ? (
          <div className="flex max-h-[648px] flex-col gap-4 bg-background-primary overflow-y-scroll rounded-3xl mt-2 p-6">
            <span className="label-large">Категории</span>
            <div className="w-full grid grid-cols-3 gap-2">
              {categories.map((c) => (
                <Link key={c.id} href={"/map/" + c.id}>
                  <CategoryCard src={c.thumb_url} title={c.title} />
                </Link>
              ))}
            </div>
          </div>
        ) : (
          <div className="flex max-h-[632px] flex-col gap-4 bg-background-secondary overflow-y-scroll rounded-3xl mt-2 p-6">
            <div className="h-full flex flex-col gap-2">
              {events.map((e) => (
                <ArticlesCard
                  time="3 часа назад"
                  avatar_url={e.user.avatar_url}
                  author={e.user.fio}
                  views={e.views}
                  image={""}
                  description={e.content}
                  name={e.title}
                />
              ))}
            </div>
          </div>
        )}
      </div>
      <Map />
    </div>
  );
};
