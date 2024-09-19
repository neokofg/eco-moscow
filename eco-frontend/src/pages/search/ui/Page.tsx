"use client";

import { SearchIcon } from "@/src/shared/icons";
import { Input } from "@/src/shared/ui/input";
import React from "react";
import { PageSearch, PageSearchNotFound } from "./PageSearch";
import { PageSearchContent } from "./PageContent";

import { Button } from "@/src/shared/ui/button";
import { cn } from "@/src/shared/lib/utils";

const NavItem = ({
  name,
  active = false,
}: {
  name: string;
  active?: boolean;
}) => (
  <li>
    <a href="#" className={cn("border-green-600 pb-1", active && "border-b-2")}>
      {name}
    </a>
  </li>
);

const navs = [
  { name: "Новости", active: true },
  { name: "Записи" },
  { name: "Статьи" },
  { name: "Видео" },
];

export const Page = () => {
  return (
    <div className="container mx-auto px-4 py-8">
      <div className="mx-auto">
        <div className="bg-white pt-8 pr-8 pl-8 rounded-xl">
          <div className="flex mb-6">
            <Input
              IconStart={SearchIcon}
              placeholder="Поиск"
              className="flex-grow"
              FullWidth
            />
            <Button className={"px-6 py-4"}>Найти</Button>
          </div>

          <nav className="mb-8">
            <ul className="flex space-x-4">
              {navs.map((nav) => (
                <NavItem name={nav.name} active={nav.active} />
              ))}
            </ul>
          </nav>
        </div>
        <PageSearchContent />
        <PageSearch />
        <PageSearchNotFound />
      </div>
    </div>
  );
};
