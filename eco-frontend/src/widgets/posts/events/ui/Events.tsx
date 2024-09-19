import { EventCard } from "@/src/shared/ui/eventscard"
import Link from "next/link"

const Events =()=>{
    return(
        <div className="flex flex-col gap-6">
      <div className="flex flex-row justify-between items-center">
        <h1 className="font-bold text-5xl leading-[-2.5%]">Мероприятия</h1>
        <Link href={'/posts'}>
        <p className="font-semibold text-base px-6 py-3 rounded-2xl bg-background-tertiary">
            Ещё
        </p>
        </Link>

      </div>
      <div className="grid grid-cols-4 gap-4">
        <EventCard />
        <EventCard />
        <EventCard />
        <EventCard />
      </div>
    </div>
    )
}
export {Events}