import TeaMan from "@/src/shared/assets/tea_man.svg";
import SadMan from "@/src/shared/assets/sad_man.svg";
import Image from "next/image";

export const PageSearch = () => (

  <div className="text-center">
  <Image src={TeaMan} width={309} height={300} alt="teaman"  className="mx-auto  mb-4"/>
  <h1 className="text-2xl font-bold mb-2">
    ПРИВЕТ! ДАВАЙ ВМЕСТЕ ИСКАТЬ
  </h1>
  <p className="text-gray-600">
    Поиск осуществляется по всему эко-сайту
  </p>
</div>
);

export const PageSearchNotFound = () => (

  <div className="text-center">
  <Image src={SadMan} width={309} height={300} alt="sadman"  className="mx-auto  mb-4"/>
  <h1 className="text-2xl font-bold mb-2">
  ЭХ, НИЧЕГО НЕТУ
  </h1>
  <p className="text-gray-600">
  К сожалению, мы не нашли подходящих вариантов.<br/>
  Пожалуйста, попробуйте написать запрос по-другому.
  </p>
</div>
);