"use client";
import { sofiaSansCondensed } from "@/src/app/fonts";
import { publicAPI } from "@/src/shared/api";
import { Button } from "@/src/shared/ui/button";
import { CategoryBadge } from "@/src/shared/ui/category-badge";
import { ToggleGroup, ToggleGroupItem } from "@/src/shared/ui/toggle-group";
import { FC, useEffect, useState } from "react";

interface Categoriy {
  id: string;
  title: string;
  thumb_url: string;
}

export const ProfileFavoritePage: FC = () => {
  const [categories, setCategories] = useState<Categoriy[]>([]);
  const [selectedCategories, setSelectedCategories] = useState<string[]>([]);
  const getCategories = async () => {
    return publicAPI.get("/api/v1/categories?first=22&page=1").then((res) => {
      setCategories(res.data.data.data);
    });
  };

  useEffect(() => {
    getCategories();
  }, []);

  return (
    <div>
      <h1
        className="font-bold text-[30px] leading-9 text-content-primary uppercase"
        style={sofiaSansCondensed.style}
      >
        интересы
      </h1>
      <ToggleGroup
        value={selectedCategories}
        onValueChange={(e) => setSelectedCategories(e)}
        className="grid 2xl:grid-cols-6 xl:grid-cols-5 lg:grid-cols-3 md:grid-cols-2 gap-4 mt-6"
        type="multiple"
      >
        {categories.map((c) => (
          <ToggleGroupItem value={c.id}>
            <CategoryBadge
              active={selectedCategories.includes(c.id)}
              src={c.thumb_url}
              title={c.title}
            />
          </ToggleGroupItem>
        ))}
      </ToggleGroup>
      <div className="mt-6 flex gap-4 w-[289px]">
        <Button>
          <>
            <span className="text-content-inverse-primary">Выбрать</span>
            <span className="rounded-full h-6 w-6 bg-content-inverse-primary text-sm text-content-green justify-center items-center leading-6 font-medium">
              {selectedCategories.length}
            </span>
          </>
        </Button>
        <Button
          onClick={() => setSelectedCategories([])}
          className="text-content-primary bg-background-tertiary"
        >
          Отменить
        </Button>
      </div>
    </div>
  );
};
