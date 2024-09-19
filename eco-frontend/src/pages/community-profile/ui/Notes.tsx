"use_client";
import { useUser } from "@/src/app/providers";
import { API_POSTS_URL } from "@/src/shared/api";
import { truncateContent } from "@/src/shared/utils";
import { FC, useEffect, useState } from "react";

interface NotesProps {
  user_id: string;
}

interface Note {
  id: string;
  title: string;
  content: string;
  image_url: string;
}

export const Notes: FC<NotesProps> = ({ user_id }) => {
  const [notes, setNotes] = useState<Note[]>([]);
  const { token } = useUser();

  const getNotes = async () => {
    const res = await fetch(
      API_POSTS_URL + "/api/v1/notes?first=15&user_id=" + user_id,
      {
        headers: {
          Authorization: "Bearer " + token,
        },
      },
    );
    const json = await res.json();

    setNotes(json["data"]["data"]);
  };

  useEffect(() => {
    getNotes();
  }, []);

  return notes.map((note) => {
    return (
      <NoteCard
        id={note.id}
        title={note.title}
        image={note.image_url}
        shortDesc={truncateContent(note.content)}
      />
    );
  });
};

const NoteCard = ({
  id = "postId",
  title = "Загрузка",
  shortDesc = "",
  image = "",
}) => {
  return (
    <div className="flex flex-col bg-white p-2 rounded-3xl">
      <div className="flex flex-col p-4 gap-2">
        <a
          className="label-large font-semibold self-start"
          href={`/posts/${id}`}
        >
          {title}
        </a>
        <div className="paragraph-small font-medium text-content-secondary">
          {shortDesc}
        </div>
        <a
          href={`/posts/${id}`}
          className="paragraph-tiny font-medium text-content-green self-start"
        >
          Читать полностью
        </a>
      </div>
      {!!image && (
        <img
          src={image}
          className="h-[440px] bg-background-tertiary rounded-2xl"
        />
      )}
    </div>
  );
};
