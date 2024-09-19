import { EventPage } from "@/src/pages/event";
export default function Page({ params }: { params: { id: string } }) {
  return <EventPage type="competitions" id={params.id} />;
}
