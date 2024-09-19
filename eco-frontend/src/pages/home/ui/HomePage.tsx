import { Articles, News, Videos } from "@/src/widgets/posts";
import { Events } from "@/src/widgets/posts/events";
import { Banner } from "@/src/widgets/home";

export const HomePage = () => {
  return (
    <div className="container py-32 flex flex-col gap-[72px]">
      <Banner />
      <Events />
      <News />
      <Articles />
      <Videos />
    </div>
  );
};
