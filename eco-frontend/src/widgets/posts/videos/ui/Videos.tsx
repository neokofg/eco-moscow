import { VideosCard } from "@/src/shared/ui/videoscard";
import Link from "next/link";

const Videos = () => {
  return (
    <div className="flex flex-col gap-6">
      <div className="flex flex-row justify-between items-center">
        <h1 className="font-bold text-5xl leading-[-2.5%]">Видео</h1>
        <Link href={"/posts"}>
          <p className="font-semibold text-base px-6 py-3 rounded-2xl bg-background-tertiary">
            Больше видео
          </p>
        </Link>
      </div>
      <div className="grid grid-cols-4 gap-4">
        <VideosCard />
        <VideosCard />
        <VideosCard />
        <VideosCard />
      </div>
      <div className="grid grid-cols-3 gap-4">
        <VideosCard isBig />
        <VideosCard isBig />
        <VideosCard isBig />
      </div>
    </div>
  );
};
export { Videos };
