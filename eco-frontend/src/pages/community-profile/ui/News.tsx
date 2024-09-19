import { API_POSTS_URL, fetcher } from "@/src/shared/api";
import { NewsCard } from "@/src/shared/ui/newscard";
import { formatRelativeTime } from "@/src/shared/utils";
import { FC, useEffect, useState } from "react";

interface News {
  id: string;
  category: {
    title: string;
  };
  image_url: string;
  header: string;
  content: string;
  created_at: string;
}

interface NewsProps {
  user_id: string;
}

export const News: FC<NewsProps> = ({ user_id }) => {
  const [news, setNews] = useState<News[]>([]);

  const getNews = async () => {
    const res = await fetch(
      API_POSTS_URL + "/api/v1/newses?first=15&user_id=" + user_id,
    );

    const json = await res.json();

    setNews(json["data"]["data"]);
  };

  useEffect(() => {
    getNews();
  }, []);

  return (
    <div className="grid grid-cols-2 gap-4">
      {news.map((n) => {
        return (
          <NewsCard
            category={n.category.title}
            image={n.image_url}
            name={n.header}
            desc={n.content}
            time={formatRelativeTime(n.created_at)}
          />
        );
      })}
    </div>
  );
};
