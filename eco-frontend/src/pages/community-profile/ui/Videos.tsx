"use client";

import { API_POSTS_URL } from "@/src/shared/api";
import { formatViews } from "@/src/shared/lib/views";
import { VideosCard } from "@/src/shared/ui/videoscard";
import { formatRelativeTime } from "@/src/shared/utils";
import { FC, useEffect, useState } from "react";

interface Video {
  title: string;
  created_at: string;
  views: number;
  preview_url: string;
  user: {
    id: string;
    fio: string;
    avatar_url: string;
  };
}

interface VideosProps {
  user_id: string;
}

export const Videos: FC<VideosProps> = ({ user_id }) => {
  const [videos, setVideos] = useState<Video[]>([]);

  const getVideos = async () => {
    const res = await fetch(
      API_POSTS_URL + "/api/v1/videos?first=15&user_id=" + user_id,
    );

    const json = await res.json();

    setVideos(json["data"]["data"]);
  };

  useEffect(() => {
    getVideos();
  }, []);

  return (
    <div className="grid grid-cols-2 gap-4">
      {videos.map((video: any) => {
        return (
          <VideosCard
            author={video.user.fio}
            time={formatRelativeTime(video.created_at)}
            views={formatViews(video.views)}
            image={video.preview_url}
            name={video.title}
          />
        );
      })}
    </div>
  );
};
