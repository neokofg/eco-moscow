"use client";

import { sofiaSansCondensed } from "@/src/app/fonts";
import { useMobile } from "@/src/app/providers";
import {
  BurgerIcon,
  LogoIcon,
  SearchIcon,
  ShieldStarIcon,
} from "@/src/shared/icons";
import { Button } from "@/src/shared/ui/button";
import { NavLink } from "@/src/shared/ui/navlink";
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

  return (
    <header className="bg-white">
      <div className="container flex py-5 xl:py-4 justify-between items-center">
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
                : navLinks.find((link) => link.href === pathname) == undefined
                  ? "Москва"
                  : navLinks.find((link) => link.href === pathname)?.label}
            </span>
          </div>
        </Link>
        <ul className="hidden xl:flex p-1 bg-background-secondary border border-border-secondary rounded-2xl">
          {navLinks.map((link) => (
            <li key={link.href}>
              <NavLink Icon={link.icon} href={link.href}>
                {link.title}
              </NavLink>
            </li>
          ))}
        </ul>
        <div className="flex gap-4">
          <Button variant="ghost" className="text-content-secondary">
            <SearchIcon />
            Поиск
          </Button>
          {isMobile ? (
            <Button variant="secondary" size="icon-md">
              <BurgerIcon />
            </Button>
          ) : (
            <Link href="/login">
              <Button variant="secondary">Войти</Button>
            </Link>
          )}
        </div>
      </div>
    </header>
  );
};
