import { RecordCard } from "@/src/shared/ui/recordCard";
import { RecordIdSidebar } from "@/src/shared/ui/recordidsidebar";

const RecordId = () => {
  return (
    <div className="container py-6 flex flex-row justify-end gap-8">
      <div className="flex flex-col gap-4">
        <RecordCard image="/123" />
      {/* тут компонент комментов вставить  */}
      </div>
      <RecordIdSidebar />
    </div>
  );
};
export { RecordId };
