import { LoginForm } from "@/src/features/login";
import { IllustrationAsset } from "@/src/shared/assets";
import { LoginCard } from "@/src/widgets/loginCard";
import Link from "next/link";
import { FC } from "react";

export const LoginPage: FC = () => {
  return (
    <div className="h-[calc(100vh-88px)]">
      <div className="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] z-20 w-full px-4 min-w-[343px] max-w-[512px]">
        <div className="flex flex-col gap-4 w-full">
          <LoginForm />
          <div className="z-10 rounded-3xl bg-background-primary flex gap-1 py-6 justify-center items-center">
            <span>Нет аккаунта?</span>
            <Link className="text-content-green z-20" href="/register">
              Зарегистрироваться
            </Link>
          </div>
        </div>
      </div>
      <div className="hidden select-none xl:block z-0 absolute bottom-0 left-[50%] translate-x-[-50%]">
        <IllustrationAsset />
      </div>
    </div>
  );
};
