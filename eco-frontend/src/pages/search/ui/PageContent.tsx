import { NewsCard } from "@/src/shared/ui/newscard";

export const PageSearchContent = () => {
    return (
        <>
            <h1 className="text-2xl font-bold mb-6">НАЙДЕНО <span className={'text-green-600'}>128</span> НОВОСТЕЙ</h1>
            <div className="grid grid-cols-3 gap-4">
                <NewsCard />
                <NewsCard />
                <NewsCard />
        </div>
        </>
    )
};