"use client";
import Image from "next/image";
import { sofiaSansCondensed } from "@/src/app/fonts";
import { useUser } from "@/src/app/providers";
import Link from "next/link";
import { UserAvatar } from "@/src/shared/ui/useravatar";
import { FC, useEffect, useState } from "react";
import { Button } from "@/src/shared/ui/button";
import { API_SOCIAL_URL } from "@/src/shared/api";
import { AvatarIcon } from "@/src/shared/icons";

interface RecommendCardProps {
  name: string;
  subs: number;
  src: string;
}

const RecommendCard: FC<RecommendCardProps> = ({ name, subs, src }) => (
  <div className="flex flex-row justify-between items-center">
    <div className="flex flex-row gap-3 items-center">
      <UserAvatar src={src} />
      <div className="flex flex-col">
        <p className="text-base text-content-primary">{name}</p>
        <p className="text-content-tertiary text-sm">{subs}</p>
      </div>
    </div>
    <Button className="text-center" color="white" size="icon-sm">
      <Image src="/plus.svg" width={16} height={16} alt=">" />
    </Button>
  </div>
);

interface Recommendation {
  id: string;
  avatar_url: string;
  fio: string;
  subscribers: number;
}

const CommunitySidebar = ({ }) => {
  const { user } = useUser();
  const [recommendations, setRecommendations] = useState<Recommendation[]>([]);

  const getRecommendations = async () => {
    const res = await fetch(API_SOCIAL_URL + "/api/v1/recommendations");
    const json = await res.json();

    setRecommendations(json["data"]["data"]);
  };

  useEffect(() => {
    getRecommendations();
  }, []);

  return (
    <div className="flex flex-col gap-4">
      <Link
        className="flex flex-row gap-3 bg-background-primary rounded-3xl w-[352px] justify-between p-6 items-center"
        href={`/community/profile/${user?.id}`}
      >
        <div className="flex flex-row gap-3 items-center">
          <AvatarIcon />
          <div className="flex flex-col">
            <p className="text-base text-content-primary">
              {user?.name} {user?.surname}
            </p>
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
      </Link>
      <div className="w-[352px] bg-background-primary rounded-3xl  gap-4 p-6 flex flex-col">
        <p
          className="text-3xl leading-[-2.5%] font-bold"
          style={sofiaSansCondensed.style}
        >
          РЕКОМЕНДАЦИИ
        </p>
        {recommendations.map((r) => (
          <RecommendCard
            key={r.id}
            name={r.fio}
            subs={r.subscribers}
            src={r.avatar_url}
          />
        ))}
      </div>
    </div>
  );
};
export { CommunitySidebar };
