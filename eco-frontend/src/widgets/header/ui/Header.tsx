"use client";

import { sofiaSansCondensed } from "@/src/app/fonts";
import { useMobile, useUser } from "@/src/app/providers";
import {
  AvatarIcon,
  BurgerIcon,
  GalleryIcon,
  LogoIcon,
  LogoutIcon,
  SearchIcon,
  ShieldStarIcon,
  StarIcon,
  UserIdIcon,
  XIcon,
} from "@/src/shared/icons";
import { Avatar, AvatarFallback, AvatarImage } from "@/src/shared/ui/avatar";
import { Button } from "@/src/shared/ui/button";
import { LogoutButton } from "@/src/shared/ui/logout";
import { NavLink } from "@/src/shared/ui/navlink";
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from "@/src/shared/ui/popover";
import { Separator } from "@/src/shared/ui/separator";
import { PopoverClose } from "@radix-ui/react-popover";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { FC } from "react";

const navLinks = [
  {
    href: "/events",
    title: "Мероприятия",
    label: "Мероприятия",
  },
  {
    href: "/posts",
    title: "Публикации",
    label: "Публикации",
  },
  {
    href: "/contest",
    title: "Конкурсы",
    label: "Конкурсы",
  },
  {
    href: "/learn",
    title: "Обучение",
    label: "Обучение",
  },
  {
    href: "/about",
    title: "О проекте",
    label: "Проект",
    icon: ShieldStarIcon,
  },
];

export const Header: FC = () => {
  const pathname = usePathname();
  const isMobile = useMobile();
  const { user, logout } = useUser();

  return (
    <header className="bg-white z-30">
      <div className="container h-[88px] flex py-5 xl:py-4 justify-between items-center">
        <Link href="/" className="flex gap-2 items-center w-[250px]">
          <div className="w-8 h-8">
            <LogoIcon />
          </div>
          <div
            style={sofiaSansCondensed.style}
            className="flex gap-1 text-[32px] leading-6 font-extrabold"
          >
            <span className="uppercase text-content-green">ЭКО</span>
            <span className="uppercase hidden sm:inline-block text-content-primary">
              {pathname == "/"
                ? "Москва"
                : pathname?.includes("/profile")
                  ? "ПРОФИЛЬ"
                  : navLinks.find((link) => link.href === pathname) == undefined
                    ? "Москва"
                    : navLinks.find((link) => link.href === pathname)?.label}
            </span>
          </div>
        </Link>
        <ul className="hidden xl:flex p-1 bg-background-secondary border border-border-secondary rounded-2xl">
          {navLinks.map((link) => (
            <li key={link.href}>
              <NavLink
                className="flex gap-1 px-4 py-3 rounded-xl"
                activeClassName="bg-background-primary"
                Icon={link.icon}
                href={link.href}
              >
                <span className="text-base font-medium text-content-primary">
                  {link.title}
                </span>
              </NavLink>
            </li>
          ))}
        </ul>
        <div className="flex items-center gap-4">
          <Button variant="ghost" className="text-content-secondary">
            <SearchIcon />
            Поиск
          </Button>
          {isMobile && (
            <Button variant="secondary" size="icon-md">
              <BurgerIcon />
            </Button>
          )}
          {!isMobile && user && (
            <Popover>
              <PopoverTrigger>
                <Avatar className="h-12 w-12">
                  <AvatarImage src={user.avatar_url} alt="avatar" />
                  <AvatarFallback className="h-12 w-12">
                    <Button
                      variant="ghost"
                      className="h-12 w-12 p-0"
                      size="icon-lg"
                    >
                      <AvatarIcon />
                    </Button>
                  </AvatarFallback>
                </Avatar>
              </PopoverTrigger>
              <PopoverContent align="end" sideOffset={28} className="w-[290px]">
                <div className="relative">
                  <div className="pt-4 flex flex-col justify-center items-center gap-3">
                    <Avatar className="h-16 w-16">
                      <AvatarImage src={user.avatar_url} alt="avatar" />
                      <AvatarFallback className="h-16 w-16">
                        <Button
                          variant="ghost"
                          className="h-16 w-16 p-0"
                          size="icon-lg"
                        >
                          <AvatarIcon width={64} height={64} />
                        </Button>
                      </AvatarFallback>
                    </Avatar>
                    <div className="flex flex-col justify-center items-center">
                      <span className="capitalize font-medium text-base text-content-primary flex gap-1">
                        <span>{user.surname}</span>
                        <span>{user.name}</span>
                      </span>
                      <span className="text-sm font-medium text-content-tertiary">
                        {user.email}
                      </span>
                    </div>
                  </div>

                  <PopoverClose asChild>
                    <Button
                      className="flex justify-center items-center w-[44px] h-[44px] p-0 absolute right-0 top-0"
                      variant="ghost"
                      size="icon-xs"
                    >
                      <XIcon />
                    </Button>
                  </PopoverClose>
                </div>
                <div className="py-2 px-6">
                  <Separator />
                </div>
                <nav>
                  <ul>
                    <li className="py-4 px-6">
                      <PopoverClose asChild>
                        <Link className="p-0" href="/profile">
                          <div className="flex gap-4 items-start">
                            <UserIdIcon />
                            <div className="flex flex-col">
                              <span className="font-medium text-content-primary">
                                Личные данные
                              </span>
                              <span className="text-xs text-content-tertiary font-medium">
                                ФИО, день рождения, пол
                              </span>
                            </div>
                          </div>
                        </Link>
                      </PopoverClose>
                    </li>
                    <li className="py-4 px-6">
                      <PopoverClose asChild>
                        <Link className="p-0" href="/profile/achievements">
                          <div className="flex gap-4 w-full items-start">
                            <div className="w-6 h-6">
                              <StarIcon />
                            </div>
                            <div className="flex w-full justify-between">
                              <span className="text-content-primary font-medium">
                                Достижения
                              </span>
                              <div className="flex gap-0.5">
                                <object
                                  type="image/svg+xml"
                                  data="/achievements-1.svg"
                                />
                                <object
                                  type="image/svg+xml"
                                  data="/achievements-2.svg"
                                />
                                <object
                                  type="image/svg+xml"
                                  data="/achievements-3.svg"
                                />
                              </div>
                            </div>
                          </div>
                        </Link>
                      </PopoverClose>
                    </li>
                    <li className="py-4 px-6">
                      <PopoverClose asChild>
                        <Link className="p-0" href="/profile/events">
                          <div className="flex gap-4 items-start">
                            <GalleryIcon />
                            <span className="font-medium text-content-primary">
                              Мои мероприятия
                            </span>
                          </div>
                        </Link>
                      </PopoverClose>
                    </li>
                  </ul>
                </nav>
                <div className="py-2 px-6">
                  <Separator />
                </div>
                <LogoutButton className="justify-start py-4 px-6 items-start" />
              </PopoverContent>
            </Popover>
          )}
          {!isMobile && !user && (
            <Link href="/sign-in">
              <Button variant="secondary">Войти</Button>
            </Link>
          )}
        </div>
      </div>
    </header>
  );
};
