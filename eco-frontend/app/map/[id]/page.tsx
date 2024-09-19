import { MapPage } from "@/src/pages/map";
export default function Page({ params }: { params: { id: string } }) {
  return <MapPage category_id={params.id} />;
}
