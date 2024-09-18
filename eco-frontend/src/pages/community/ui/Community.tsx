import { CommunitySidebar } from "@/src/shared/ui/communitysidebar"
import { RecordCard } from "@/src/shared/ui/recordCard"

const Community = ()=>{
    return(
<div className="container py-6 flex flex-row justify-end gap-8">
    <div className="flex flex-col gap-4">

    <RecordCard image="/123" />
    <RecordCard image="/123" />
    </div>
    <CommunitySidebar />
</div>
    )
}
export {Community}