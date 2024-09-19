"use client";

import { Button } from "@/src/shared/ui/button";
import { CommunitySidebar } from "@/src/widgets/community-sidebar";
import { useState } from "react";
import ProfileTabs from "./ProfileTabs";
import { Selector } from "./TabSelector";
import Modal from "./Modal";
import { useUser } from "@/src/app/providers";
import { UserAvatar } from "@/src/shared/ui/useravatar";

export const ProfileId = () => {
  const [selected, setSelect] = useState<"notes" | "news" | "videos">("notes");
  const [isOpen, setOpen] = useState(false);

  const { user } = useUser();

  const isMe = true;

  if (!user) return;

  return (
    <div className="container py-6 flex flex-row gap-8">
      {isOpen && <Modal onClose={() => setOpen(false)} />}
      <div className="w-[352px]" />
      <div className="flex flex-col gap-4 flex-1">
        <div className="flex bg-white px-6 pt-6 gap-6 rounded-3xl">
          <UserAvatar className="h-[100px] w-[100px]" src={user.avatar_url} />
          <div className="flex flex-col flex-1 gap-4">
            <div className="label-large font-semibold">
              {user.surname} {user.name}
            </div>
            <div className="flex gap-1">
              <div className="label-base font-semibold">{user.subscribers}</div>
              <div className="paragraph-base font-medium text-content-tertiary">
                подписчиков
              </div>
              <div />
              <div className="label-base font-semibold">
                {user.subscriptions}
              </div>
              <div className="paragraph-base font-medium text-content-tertiary">
                подписок
              </div>
            </div>
            <div>Описание</div>
            <div className={`self-start ${isMe ? "block" : "hidden"}`}>
              <Button onClick={() => setOpen(!isOpen)}>
                Создать публикацию
              </Button>
            </div>
            <Selector selected={selected} setSelect={setSelect} />
          </div>
        </div>
        <ProfileTabs user_id={user.id} selected={selected} />
      </div>
      <CommunitySidebar />
    </div>
  );
};
