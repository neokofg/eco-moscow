"use client";

import { FC } from "react";
import { Button } from "@/src/shared/ui/button";
import { sofiaSansCondensed } from "@/src/app/fonts";
import { Input } from "@/src/shared/ui/input";
import { useSignIn } from "@/src/app/providers";

export const ConfirmEmailForm: FC = () => {
  const {
    setStep,
    registerForm: form,
    onRegisterSubmit: onSubmit,
  } = useSignIn();

  if (form == undefined) return;

  return (
    <div className="flex flex-col gap-4 w-full">
      <div className="z-10 pt-8 p-6 rounded-3xl bg-background-primary">
        <h3
          className="uppercase text-content-primary font-bold text-4xl pb-2"
          style={sofiaSansCondensed.style}
        >
          ПОДТВЕРДИТЕ ПОЧТУ
        </h3>
        <p className="text-sm font-medium text-content-tertiary pb-4">
          На почту {form.getValues("email")} отправлено письмо ссылкой для
          подтверждения регистрации. Если вы не можете найти письмо, проверьте,
          пожалуйста, папку спам
        </p>
        <div className="py-4">
          <Input
            disabled
            type="text"
            placeholder="Почта"
            value={form.getValues("email")}
            withAsterisk
          />
        </div>
        <Button
          onClick={() => onSubmit(form.getValues())}
          className="mt-6"
          variant="default"
        >
          Отправить письмо повторно
        </Button>
      </div>

      <div className="z-10 rounded-3xl bg-background-primary flex gap-1 py-6 justify-center items-center">
        <span>Я ошибся,</span>
        <span
          className="cursor-pointer text-content-green"
          onClick={() => setStep("register")}
        >
          хочу поменять e-mail
        </span>
      </div>
    </div>
  );
};
