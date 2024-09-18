import React from 'react';
import { PlayCircle, ThumbsUp, ThumbsDown } from 'lucide-react';
import { Badge } from '@/src/shared/ui/badge';
import { Button } from '@/src/shared/ui/button';
import { VideoCard } from '@/src/shared/ui/video-card';
import { Comments } from '@/src/widgets/posts/comments/ui/Comments';



export const VideoId = () => {
  return (
    <div className="flex gap-6 p-4 max-w-screen-xl mx-auto">
      <div>
      <div className="flex-grow  bg-white p-4 rounded-xl  h-[calc(100vh-10rem)] mb-[4rem]">
        <div className="relative aspect-video bg-black mb-4 rounded-xl">
          <img src="/api/placeholder/800/450" alt="Video thumbnail" className="w-full h-full object-cover" />
          <div className="absolute inset-0 flex items-center justify-center">
            <PlayCircle className="w-12 h-12 text-white opacity-75" />
          </div>
        </div>
        <h1 className="text-2xl font-bold mb-2">Китайские автомобили на свалках: кризис, экология и конкуренция</h1>
        <div className="flex flex-row item-center gap-4 mb-2">
            <Badge text='Категория'/>

            <span className="text-gray-500">3 Часа назад</span>
            <span className="text-gray-500">120000 просмотров</span>
        </div>
        <div className='flex justify-between'>
        <div className="flex items-center gap-4 mb-4">
          <div className="flex items-center gap-2">
            <img src="/api/placeholder/40/40" alt="User avatar" className="w-10 h-10 rounded-full" />
            <div className="flex flex-col">
            <span className="font-semibold">Фамилия Имя</span>
            <span className="text-gray-500">8 тыс. подписчиков</span>
            </div>
          </div>

          <Button className={'w-[200px]'}>Вы подписаны</Button>
        </div>

        <div className="flex gap-1 mb-4">
          <div className="flex items-center gap-2 px-2 py-2">
            <ThumbsUp className="w-5 h-5" />
            <span>51</span>
          </div>
          <div className="flex items-center gap-2 px-2 py-2">
            <ThumbsDown className="w-5 h-5" />
            <span>0</span>
          </div>
        </div>
        </div>
        <div className="">
          <p className="text-sm">
            В 2024 году в разделе физики победу одержал Джеймс С. Лао за свою уникальную демонстрацию и объяснение 
            плавательных способностей микробных форм, сообщает ИА Technica Planet Today.
          </p>
          <p className="text-sm mt-2">
            Ботаническая премия была вручена за обнаружение того, что некоторые растения имитируют форму соседних 
            искусственных растений.
          </p>
        </div>
      </div>
      <Comments/>
     </div>

      {/* Sidebar with recommended videos */}
      <div className="w-80 space-y-4">
        {[1, 2, 3, 4, 5, 6, 7, 8].map((index) => (
            <VideoCard key={index}/>
        ))}
      </div>

    </div>
  );
};
