import { NewsCard } from "@/src/shared/ui/newscard";
import Image from "next/image";
const NewsId = () => {
  return(
    <News/>
  )
}
const News = ({
  name = "Шнобелевская премия 2024: плавательные способности мертвой форели",
  cat = "Категория",
  time = "3 часа назад",
  views = "12 689 просмотров",
  content = "В 2024 году в разделе физики победу одержал Джеймс С. Ляо за свою уникальную демонстрацию и объяснение плавательных способностей мертвой форели, сообщает Ars Technica.Planet Today Ботаническая премия была вручена за обнаружение того, что некоторые растения имитируют форму соседних искусственных растений.URA.Ru Результаты показали, что у жителей Южного полушария волосы чаще закручиваются по часовой стрелке, а в Северном — наоборот.Life.ru Награду за теорию вероятности получили исследователи, установившие, что монета при подбрасывании чаще падает на исходную сторону.НТВ Ключевым элементом метода стала тонкая медная проволока.ЭкоправдаГруппа исследователей разработала инновационный метод, позволяющий воссоздать невероятно высокие давления и температуры в лабораторных условиях, используя лазерную установку сравнительно небольшого размера.Planet Today Лазер генерирует сверхкороткие импульсы продолжительностью всего 30 фемтосекунд (0,00000000000003 секунды), что позволяет достичь мощности в 100 тераватт.",
  timer = "",
  eye = "",
  cover = "",
}) => {
  return (
    <div className="container py-12">
      <div className="bg-background-primary flex flex-col gap-6 gap p-6 rounded-3xl">
        <div className="flex flex-col gap-4">
          <h1 className="font-bold text-5xl leading-[-2.5%]">{name}</h1>
          <div className="flex flex-row gap-6">
            <div className="px-3 py-1 bg-background-tertiary rounded-full">
              {cat}
            </div>
            <div className="flex flex-row gap-1 items-center">
              <Image
                alt=";"
                width={24}
                height={24}
                className="bg-background-tertiary"
                src={timer}
              />
              <p className="text-base text-content-tertiary font-medium ">
                {time}
              </p>
            </div>
            <div className="flex flex-row gap-1 items-center">
              <Image
                alt=";"
                width={24}
                height={24}
                className="bg-background-tertiary"
                src={eye}
              />
              <p className="text-base text-content-tertiary font-medium ">
                {views}
              </p>
            </div>
          </div>
        </div>
        <div className="flex flex-row gap-8 w-full">
          <div className="text-lg font-medium w-1/2 text-content-primary">
            {content}
          </div>
          <Image
            width={712}
            height={516}
            alt=";"
            className="bg-background-tertiary rounded-3xl"
            src={cover}
          />
        </div>
      </div>
      <div className="flex flex-col gap-6 mt-14">
        <h1 className="font-bold text-5xl leading-[-2.5%]">Читайте так же</h1>
        <div className="grid grid-cols-4 gap-4">
          <NewsCard />
          <NewsCard />
          <NewsCard />
          <NewsCard />
        </div>
      </div>
    </div>
  );
};
export { NewsId };
