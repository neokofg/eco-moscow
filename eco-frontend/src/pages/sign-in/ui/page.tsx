"use client";

import { useSignIn } from "@/src/app/providers";
import { ConfirmEmailForm } from "@/src/features/confirm-email";
import { LoginForm } from "@/src/features/login";
import { RegisterForm } from "@/src/features/register";
import { IllustrationAsset } from "@/src/shared/assets";
import { FC } from "react";

export const SignInPage: FC = () => {
  const { step } = useSignIn();

  return (
    <div className="min-h-[calc(100vh-88px)]">
      <div className="py-16 mx-auto z-20 w-full px-4 min-w-[343px] max-w-[512px]">
        {step == "login" && <LoginForm />}
        {step == "register" && <RegisterForm />}
        {step == "email" && <ConfirmEmailForm />}
      </div>
      <div className="hidden select-none xl:block z-0 fixed bottom-0 left-[50%] translate-x-[-50%]">
        <IllustrationAsset />
      </div>
    </div>
  );
};
