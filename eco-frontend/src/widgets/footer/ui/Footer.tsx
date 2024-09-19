"use client";
import Image from "next/image";
import Apple from "@/src/shared/assets/apple.png";
import Google from "@/src/shared/assets/google-play.png";
import Mir from "@/src/shared/assets/mir.png";
import SBP from "@/src/shared/assets/sbp.png";
import Visa from "@/src/shared/assets/visa.png";
import Dolyame from "@/src/shared/assets/Dolyame logo.png";
import MasterCard from "@/src/shared/assets/mastercard.png";
import { usePathname } from "next/navigation";

export const Footer = () => {
  const pathname = usePathname();

  if (pathname == "/sign-in") return;

  return (
    <footer className="mt-8 bg-background-primary py-12">
      <div className="container flex flex-col gap-16">
        <div className="grid grid-cols-5">
          <div className="flex flex-col gap-2">
            <p className="font-semibold text-lg text-content-primary">
              +7 (964) 425-40-55
            </p>
            <p className="font-semibold text-lg text-content-primary">
              info@eco.ru
            </p>
          </div>
          <div className="flex flex-col gap-4">
            <p className="font-semibold text-lg text-content-primary">
              Активность
            </p>
            <div className="flex flex-col gap-3">
              <p className="font-medium text-sm text-content-secondary">
                Мероприятия
              </p>
              <p className="font-medium text-sm text-content-secondary">
                Публикации
              </p>
              <p className="font-medium text-sm text-content-secondary">
                Конкурсы
              </p>
              <p className="font-medium text-sm text-content-secondary">
                Обучение
              </p>
            </div>
          </div>
          <div className="flex flex-col gap-4">
            <p className="font-semibold text-lg text-content-primary">Помощь</p>
            <div className="flex flex-col gap-3">
              <p className="font-medium text-sm text-content-secondary">
                Инструкции
              </p>
              <p className="font-medium text-sm text-content-secondary">
                Нужна помощь
              </p>
              <p className="font-medium text-sm text-content-secondary">
                Истории успеха
              </p>
            </div>
          </div>
          <div className="flex flex-col gap-4">
            <p className="font-semibold text-lg text-content-primary">О нас</p>
            <div className="flex flex-col gap-3">
              <p className="font-medium text-sm text-content-secondary">
                О проекте
              </p>
              <p className="font-medium text-sm text-content-secondary">
                Контакты
              </p>
            </div>
          </div>
          <div className="flex flex-col gap-4"> </div>
        </div>
        <div className="flex flex-row justify-between items-center">
          <div className="flex flex-row items-center justify-start text-sm text-content-tertiary font-medium gap-8">
            <p>© 2024 Эко</p>
            <p>Политика конфиденциальности</p>
            <p>Политика обработки персональных данных</p>
          </div>
          <div className="flex flex-row gap-[14px] items-center"></div>
        </div>
      </div>
    </footer>
  );
};
