import { EventPage } from "@/src/pages/event";
export default function Page({ params }: { params: { id: string } }) {
  return <EventPage type="promotions" id={params.id} />;
}
