import { Badge } from "@/src/shared/ui/badge";
import { NewsCard } from "@/src/shared/ui/newscard";
import Link from "next/link";

const News = () => {
  return (
    <div className="flex flex-col gap-6">
      <div className="flex flex-row justify-between items-center">
        <h1 className="font-bold text-5xl leading-[-2.5%]">НОВОСТИ</h1>
        <Link href={"/posts"}>
          <p className="font-semibold text-base px-6 py-3 rounded-2xl bg-background-tertiary">
            Ещё
          </p>
        </Link>
      </div>
      <div className="grid grid-cols-3 gap-4">
        <NewsCard isBig />
        <NewsCard isBig />
        <NewsCard isBig />
      </div>
    </div>
  );
};
export { News };
