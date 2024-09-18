import { Badge } from "@/src/shared/ui/badge";
import { NewsCard } from "@/src/shared/ui/newscard";
import { Comment } from "@/src/shared/ui/comment";
import { Input } from "@/src/shared/ui/input";
import { Button } from "@/src/shared/ui/button";
import { ArrowUp } from "@/src/shared/icons";

const Comments = () => {
  return (
    <div className="flex flex-col gap-6 bg-white p-4 rounded-xl">
      <div className="flex flex-row justify-between items-center">
        <h4 className="font-bold text-2xl leading-[-2.5%]">Комментарии <span className="text-gray-400">12</span></h4>
      </div>
      <div className="flex">
      <Input placeholder="Написать комментарий" FullWidth/>
      <Button className={"ml-4 w-[100px]"}><ArrowUp/></Button>
      </div>
      <div className="flex flex-col">
        <Comment author={'sdsd'} time={'1д'} content={'dsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfjdsfdsfsdfsdfdsfdgdfkjgdfjgldfjgljdfklgjkldfj'} likes={'1'}/>
        <Comment author={'sdsd'} time={'1д'} content={'sdasd'} likes={'1'} level={1}/>
        <Comment author={'sdsd'} time={'1д'} content={'sdasd'} likes={'1'} level={2}/>
      </div>
    </div>
  );
};
export { Comments };
