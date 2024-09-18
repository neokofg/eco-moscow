import { RegisterForm } from "@/src/features/register";
import { IllustrationAsset } from "@/src/shared/assets";
import Link from "next/link";
import { FC } from "react";

export const RegisterPage: FC = () => {
  return (
    <div className="">
      <div className="py-16 mx-auto z-20 w-full px-4 min-w-[343px] max-w-[512px]">
        <div className="flex flex-col gap-4 w-full">
          <RegisterForm />
          <div className="z-10 rounded-3xl bg-background-primary flex gap-1 py-6 justify-center items-center">
            <span>Уже зарегистрированы?</span>
            <Link className="text-content-green" href="/login">
              Войти
            </Link>
          </div>
        </div>
      </div>
      <div className="hidden select-none xl:block z-0 fixed bottom-0 left-[50%] translate-x-[-50%]">
        <IllustrationAsset />
      </div>
    </div>
  );
};
