import { CategoryBadge } from "@/src/shared/ui/category-badge";
import { News, Articles, Videos } from "@/src/widgets/posts";
import Image from "next/image";

export const Posts = () => {
  return (
    <div className="min-h-[calc(100vh-88px)] container py-6 flex flex-col gap-[72px] items-center justify-center">
      <div className="flex flex-row items-center justify-start w-full gap-4">
        <div className="bg-content-primary px-4 py-3 text-content-inverse-primary rounded-2xl">
          Главное
        </div>
        <div className="flex flex-row gap-4 w-full overflow-scroll ">
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
          <CategoryBadge src="" title="Категория" />
        </div>
      </div>
      <News />
      <Articles />
      <Videos />
    </div>
  );
};
