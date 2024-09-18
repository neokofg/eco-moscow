import { ArticlesCard } from "@/src/shared/ui/articlecard";
import Link from "next/link";

const Articles = () => {
  return (
    <div className="flex flex-col gap-6">
      <div className="flex flex-row justify-between items-center">
        <h1 className="font-bold text-5xl leading-[-2.5%]">Статьи</h1>
        <Link href={"/posts"}>
          <p className="font-semibold text-base px-6 py-3 rounded-2xl bg-background-tertiary">
            Больше статей
          </p>
        </Link>
      </div>
      <div className="grid grid-cols-4 gap-4">
        <ArticlesCard />
        <ArticlesCard />
        <ArticlesCard />
        <ArticlesCard />
      </div>
      <div className="grid grid-cols-3 gap-4">
        <ArticlesCard isBig />
        <ArticlesCard isBig />
        <ArticlesCard isBig />
      </div>
    </div>
  );
};
export { Articles };
