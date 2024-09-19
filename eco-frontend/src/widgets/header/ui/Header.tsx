"use client";

import { sofiaSansCondensed } from "@/src/app/fonts";
import { useMobile, useUser } from "@/src/app/providers";
import {
  AvatarIcon,
  BurgerIcon,
  GalleryIcon,
  LogoIcon,
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
  NavigationMenu,
  NavigationMenuContent,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
} from "@/src/shared/ui/navmenu";
import {
  Popover,
  PopoverContent,
  PopoverTrigger,
} from "@/src/shared/ui/popover";
import { Separator } from "@/src/shared/ui/separator";
import { PopoverClose } from "@radix-ui/react-popover";
import Image from "next/image";
import Link from "next/link";
import { usePathname } from "next/navigation";
import { FC } from "react";

const navLinks = [
  {
    href: "/posts",
    title: "Публикации",
    label: "Публикации",
  },
  {
    href: "/community",
    title: "Сообщество",
    label: "Конкурсы",
  },
  {
    href: "/about",
    title: "О проекте",
    label: "Проект",
    icon: ShieldStarIcon,
  },
];

const eventsLinks = [
  {
    href: "/events",
    title: "Мероприятия",
    icon: ShieldStarIcon,
  },
  {
    href: "/discount",
    title: "Акции",
    icon: ShieldStarIcon,
  },
  {
    href: "/contest",
    title: "Конкурсы",
    icon: ShieldStarIcon,
  },
  {
    href: "/help",
    title: "Волонтёрство",
    icon: ShieldStarIcon,
  },
  {
    href: "/marathon",
    title: "Марафон",
    icon: ShieldStarIcon,
  },
];

export const Header: FC = () => {
  const pathname = usePathname();
  const isMobile = useMobile();
  const { user } = useUser();

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
            <h3 className="text-[32px] leading-6 font-extrabold uppercase text-content-green">
              ЭКО
            </h3>
            <h3 className="text-[32px] leading-6 font-extrabold uppercase hidden sm:inline-block text-content-primary">
              {pathname == "/"
                ? "Москва"
                : pathname?.includes("/profile")
                  ? "ПРОФИЛЬ"
                  : navLinks.find((link) => link.href === pathname) == undefined
                    ? "Москва"
                    : navLinks.find((link) => link.href === pathname)?.label}
            </h3>
          </div>
        </Link>
        <ul className="hidden xl:flex p-1 bg-background-secondary border border-border-secondary rounded-2xl">
          <li>
            <NavigationMenu>
              <NavigationMenuList>
                <NavigationMenuItem className="border-none">
                  <NavigationMenuTrigger>
                    <NavLink
                      className="flex gap-1 px-4 py-3 rounded-xl"
                      activeClassName="bg-background-primary"
                      href="/events"
                    >
                      <span className="text-base font-medium text-content-primary">
                        Мероприятия
                      </span>
                    </NavLink>
                  </NavigationMenuTrigger>
                  <NavigationMenuContent className="border-none p-1 bg-background-primary rounded-3xl">
                    <div className="flex gap-2">
                      <div className="w-[280px]">
                        {eventsLinks.map((link) => (
                          <NavigationMenuLink asChild>
                            <NavLink
                              activeClassName=""
                              className="flex p-4 gap-4 items-center"
                              Icon={link.icon}
                              href={link.href}
                            >
                              <span>{link.title}</span>
                            </NavLink>
                          </NavigationMenuLink>
                        ))}
                      </div>
                      <Link className="w-[280px]" href="/map">
                        <Image
                          width={280}
                          height={280}
                          src="/nav_map.png"
                          alt="map"
                        />
                      </Link>
                    </div>
                  </NavigationMenuContent>
                </NavigationMenuItem>
              </NavigationMenuList>
            </NavigationMenu>
          </li>
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
