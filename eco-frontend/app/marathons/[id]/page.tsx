import { EventPage } from "@/src/pages/event";
export default function Page({ params }: { params: { id: string } }) {
  return <EventPage type="marathons" id={params.id} />;
}
