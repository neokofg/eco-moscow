"use client";
import { useUser } from "@/src/app/providers";
import {
  AvatarIcon,
  CaseIcon,
  GalleryIcon,
  HeartsIcon,
  LogoutIcon,
  StarIcon,
} from "@/src/shared/icons";
import { Avatar, AvatarFallback, AvatarImage } from "@/src/shared/ui/avatar";
import { Button } from "@/src/shared/ui/button";
import { LogoutButton } from "@/src/shared/ui/logout";
import { NavLink } from "@/src/shared/ui/navlink";
import Link from "next/link";
import { FC } from "react";

export const ProfileMenu: FC = () => {
  const { user, logout } = useUser();

  if (!user) return;

  return (
    <div className="shrink-0 bg-background-primary rounded-3xl p-2 flex flex-col gap-4 w-[290px]">
      <NavLink
        activeClassName="bg-background-secondary"
        className="rounded-2xl p-4"
        href="/profile"
      >
        <div className="flex gap-3 items-center">
          <Avatar className="h-16 w-16">
            <AvatarImage src={user.avatar_url} alt="avatar" />
            <AvatarFallback className="h-16 w-16">
              <Button variant="ghost" className="h-16 w-16 p-0" size="icon-lg">
                <AvatarIcon width={64} height={64} />
              </Button>
            </AvatarFallback>
          </Avatar>
          <div className="flex flex-col justify-start items-start">
            <span className="capitalize font-medium text-base text-content-primary flex gap-1">
              <span>{user.surname}</span>
              <span>{user.name}</span>
            </span>
            <span className="text-sm font-medium text-content-tertiary">
              {user.email}
            </span>
          </div>
        </div>
      </NavLink>
      <NavLink
        activeClassName="bg-background-secondary"
        className="rounded-2xl p-4"
        href="/profile/achievements"
      >
        <div className="flex gap-4 w-full items-start">
          <div className="w-6 h-6">
            <StarIcon />
          </div>
          <div className="flex w-full justify-between">
            <span className="text-content-primary font-medium">Достижения</span>
            <div className="flex gap-0.5">
              <object type="image/svg+xml" data="/achievements-1.svg" />
              <object type="image/svg+xml" data="/achievements-2.svg" />
              <object type="image/svg+xml" data="/achievements-3.svg" />
            </div>
          </div>
        </div>
      </NavLink>
      <div>
        <NavLink
          activeClassName="bg-background-secondary"
          className="flex gap-4 items-start rounded-2xl p-4"
          href="/profile/events"
        >
          <GalleryIcon />
          <span className="font-medium text-content-primary">
            Мои мероприятия
          </span>
        </NavLink>
        <NavLink
          activeClassName="bg-background-secondary"
          className="flex gap-4 items-center rounded-2xl p-4"
          href="/profile/favorite"
        >
          <HeartsIcon />
          <span className="font-medium text-content-primary">Интересы</span>
        </NavLink>
        <NavLink
          activeClassName="bg-background-secondary"
          className="flex gap-4 items-center rounded-2xl p-4"
          href="/profile/education"
        >
          <CaseIcon />
          <span className="font-medium text-content-primary">Образование</span>
        </NavLink>
      </div>
      <LogoutButton />
    </div>
  );
};
