import { PlayCircle, ThumbsUp, ThumbsDown } from 'lucide-react';
import {Badge} from './badge';

export const VideoCard = ({
    time = '02:24',
    text = 'Обновления Leader-ID в мае 2024',
    date = '3 часа назад'
}) => (
    <div className="w-80 h-72 rounded-lg overflow-hidden shadow-lg bg-white">
    <div className="relative h-48">
      <img className="w-full h-full object-cover" src="/api/placeholder/320/192" alt="Video thumbnail" />
      <div className="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <PlayCircle className="text-white" size={48} />
      </div>
      <div className="absolute bottom-2 right-2 bg-black bg-opacity-60 text-white px-1 py-0.5 text-xs rounded">
        {time}
      </div>
    </div>
    <div className="px-3 py-2 flex flex-col justify-between">
     <div className="flex flex-row items-center">
     <Badge text='Категория'/>
     <div className="text-gray-500 text-xs ml-2">{date}</div>
    </div>
      <p className=" mt-1">
        {text}
      </p>
    </div>
  </div>
)