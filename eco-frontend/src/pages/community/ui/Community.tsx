"use client";

import { useUser } from "@/src/app/providers";
import { API_POSTS_URL } from "@/src/shared/api";
import { formatViews } from "@/src/shared/lib/views";
import { CommunitySidebar } from "@/src/widgets/community-sidebar";
import { RecordCard } from "@/src/shared/ui/recordCard";
import { useEffect, useState } from "react";

interface Note {
  id: string;
  title: string;
  content: string;
  image_url: string;
  created_at: string;
  views: number;
  user: {
    id: string;
    fio: string;
    avatar_url: string;
  };
}

const Community = () => {
  const [notes, setNotes] = useState<Note[]>([]);
  const { token } = useUser();

  const getNotes = async () => {
    const res = await fetch(API_POSTS_URL + "/api/v1/notes?first=15&page=1", {
      headers: {
        Authorization: "Bearer " + token,
      },
    });
    const json = await res.json();

    setNotes(json["data"]["data"]);
  };

  useEffect(() => {
    getNotes();
  }, []);

  return (
    <div className="container py-6 flex flex-row justify-end gap-8">
      <div className="flex flex-col gap-4">
        {notes.map((note) => (
          <RecordCard
            key={note.id}
            image={note.image_url}
            title={note.title}
            views={formatViews(note.views)}
            content={note.content}
            name={note.user.fio}
          />
        ))}
      </div>
      <CommunitySidebar />
    </div>
  );
};
export { Community };
