"use client";
import { AvatarIcon } from "../icons";
import { HandThumbUpIcon, HandThumbDownIcon } from '@heroicons/react/24/outline';
import { cn } from "@/src/shared/lib/utils";


export const Comment = ({ 
    author = '', 
    time = '', 
    content = '', 
    likes = '',
    level = 0, 
}) => {
    return (
      <div className={cn(
        "border-gray-200 pb-4",
      )}
      style={{
        'marginLeft': `${level}em`
      }}
      >
        <div className="flex items-start">
          <div className="flex-shrink-0 mr-3">
            <AvatarIcon height={40} width={40}/>
          </div>
          <div className="flex-grow">
          <div className="flex justify-between items-center">
              <div className="flex items-center space-x-2">
                <h3 className="font-semibold">{author}</h3>
                <p className="text-sm text-gray-500">{time}</p>
              </div>
            </div>
            <div className="-ml-12 mt-6">
            <p className="mt-1 whitespace-normal" style={{
                overflowWrap: 'anywhere',
            }}>{content}</p>
            <div className="mt-2 flex items-center">
            <button className="text-gray-500 hover:text-blue-500 mr-4">Ответить</button>
              <button className="flex items-center text-gray-500 hover:text-blue-500">
                <HandThumbUpIcon className="w-4 h-4 mr-1" />
                <span>{likes}</span>
              </button>
              <button className="ml-2 text-gray-500 hover:text-red-500">
                <HandThumbDownIcon className="w-4 h-4" />
              </button>
            </div>
          </div>
         </div>
        </div>
      </div>
    );
  };