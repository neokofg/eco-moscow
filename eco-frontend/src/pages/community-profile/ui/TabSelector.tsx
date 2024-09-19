import { useRef } from "react";

export const Selector = ({
	selected = "notes",
	setSelect = () => {},
}: {
	selected: "notes" | "news" | "videos";
	setSelect: (selected: "notes" | "news" | "videos") => void;
}) => {
	const notesRef = useRef<HTMLDivElement>(null);
	const newsRef = useRef<HTMLDivElement>(null);
	const videosRef = useRef<HTMLDivElement>(null);

	const selectedRef = (
		selected === "notes" ? notesRef : selected === "news" ? newsRef : videosRef
	).current;

	return (
		<div className="flex flex-col">
			<div className="flex gap-6 relative pb-2 font-medium paragraph-base">
				<div ref={notesRef} onClick={() => setSelect('notes')} className="cursor-pointer">Записи</div>
				<div ref={newsRef} onClick={() => setSelect('news')} className="cursor-pointer">Статьи</div>
				<div ref={videosRef} onClick={() => setSelect('videos')} className="cursor-pointer">Видео</div>
			</div>
			<div className="flex flex-row">
				<div 
            className="transition-all"
            style={{
               width: selectedRef?.offsetLeft || 0 
            }}/>
				<div
					className={`bg-content-green h-[3px] rounded-full transition-all`}
               style={{
                  width: selectedRef?.clientWidth || 56
               }}
				/>
			</div>
		</div>
	);
};
