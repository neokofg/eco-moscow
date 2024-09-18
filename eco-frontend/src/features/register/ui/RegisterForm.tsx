"use client";

import { FC } from "react";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormMessage,
} from "@/src/shared/ui/form";
import { Button } from "@/src/shared/ui/button";
import { sofiaSansCondensed } from "@/src/app/fonts";
import { Input, PasswordInput } from "@/src/shared/ui/input";
import { cn } from "@/src/shared/lib/utils";
import Link from "next/link";
import { useSignIn } from "@/src/app/providers";
import { API_URL } from "@/src/shared/api";

type QualityPassword = "weak" | "none" | "error" | "strong" | "mismatched";

const texts: Record<QualityPassword, string> = {
  weak: "text-border-warning",
  none: "text-content-tertiary",
  strong: "text-border-success",
  error: "text-border-error",
  mismatched: "text-border-error",
};

const bgs: Record<QualityPassword, string> = {
  weak: "bg-border-warning",
  none: "bg-background-tertiary",
  strong: "bg-border-success",
  error: "bg-border-error",
  mismatched: "bg-border-error",
};
const titles: Record<QualityPassword, string> = {
  weak: "Слабый пароль",
  none: "Не менее 8 символов, используя A-Z, a-z, 0-9",
  strong: "Сильный пароль",
  mismatched: "Пароли не совпадают",
  error:
    "Должен содержать латинские буквы верхнего и нижнего регистра, а также цифры",
};

function getStylePassword(
  p: string,
  cp: string,
  pi: boolean,
  cpi: boolean,
): QualityPassword {
  if (p.length == 0 && cp.length == 0 && !pi && !cpi) return "none";
  if (!pi && p != cp) return "mismatched";
  if (pi || cpi) return "error";
  if (!pi && !cpi && p.length >= 8 && p.length <= 11) return "weak";
  if (!pi && !cpi && p.length >= 12) return "strong";
  return "none";
}

export const RegisterForm: FC = () => {
  const {
    setStep,
    registerForm: form,
    onRegisterSubmit: onSubmit,
  } = useSignIn();

  if (form == undefined) return;

  const password = form.watch("password");
  const cpassword = form.watch("confirm_password");

  return (
    <div className="flex flex-col gap-4 w-full">
      <Form {...form}>
        <form
          className="z-10 pt-8 p-6 rounded-3xl bg-background-primary"
          onSubmit={form.handleSubmit(onSubmit)}
        >
          <h3
            className="uppercase text-content-primary font-bold text-4xl pb-4 mb-4"
            style={sofiaSansCondensed.style}
          >
            РЕГИСТРАЦИЯ
          </h3>
          <div className="flex flex-col gap-4 w-full pb-4">
            <div className="flex sm:gap-2 sm:flex-nowrap flex-wrap gap-4 w-full">
              <FormField
                name="name"
                control={form.control}
                render={({ field }) => (
                  <FormItem className="w-full">
                    <FormControl>
                      <Input
                        className={
                          form.getFieldState(field.name).invalid
                            ? "outline-border-error"
                            : ""
                        }
                        type="text"
                        placeholder="Имя"
                        withAsterisk
                        {...field}
                      />
                    </FormControl>
                    <FormMessage className="px-3 pt-2 text-border-error text-sm" />
                  </FormItem>
                )}
              />
              <FormField
                name="surname"
                control={form.control}
                render={({ field }) => (
                  <FormItem className="w-full">
                    <FormControl>
                      <Input
                        className={
                          form.getFieldState(field.name).invalid
                            ? "outline-border-error"
                            : ""
                        }
                        type="text"
                        placeholder="Фамилия"
                        withAsterisk
                        {...field}
                      />
                    </FormControl>
                    <FormMessage className="px-3 pt-2 text-border-error text-sm" />
                  </FormItem>
                )}
              />
            </div>
            <FormField
              name="email"
              control={form.control}
              render={({ field }) => (
                <FormItem>
                  <FormControl>
                    <Input
                      className={
                        form.getFieldState(field.name).invalid
                          ? "outline-border-error"
                          : ""
                      }
                      type="text"
                      placeholder="Почта"
                      withAsterisk
                      {...field}
                    />
                  </FormControl>
                  <FormMessage className="px-3 pt-2 text-border-error text-sm" />
                </FormItem>
              )}
            />
            <FormField
              name="password"
              control={form.control}
              render={({ field }) => (
                <FormItem>
                  <FormControl>
                    <PasswordInput
                      className={
                        form.getFieldState(field.name).invalid
                          ? "outline-border-error"
                          : ""
                      }
                      placeholder="Пароль"
                      withAsterisk
                      {...field}
                    />
                  </FormControl>
                </FormItem>
              )}
            />
            <FormField
              name="confirm_password"
              control={form.control}
              render={({ field }) => (
                <FormItem>
                  <FormControl>
                    <PasswordInput
                      className={
                        form.getFieldState(field.name).invalid
                          ? "outline-border-error"
                          : ""
                      }
                      placeholder="Повторите пароль"
                      withAsterisk
                      {...field}
                    />
                  </FormControl>
                </FormItem>
              )}
            />
            <div className="flex gap-2 flex-col">
              <div className="w-full h-1 px-3">
                <div
                  className={cn(
                    "w-full h-full rounded-full bg-background-tertiary",
                    bgs[
                    getStylePassword(
                      password,
                      cpassword,
                      form.getFieldState("password").invalid,
                      form.getFieldState("confirm_password").invalid,
                    )
                    ],
                  )}
                />
              </div>
              <span
                className={cn(
                  "px-3 text-xs font-medium text-content-tertiary",
                  texts[
                  getStylePassword(
                    password,
                    cpassword,
                    form.getFieldState("password").invalid,
                    form.getFieldState("confirm_password").invalid,
                  )
                  ],
                )}
              >
                {
                  titles[
                  getStylePassword(
                    password,
                    cpassword,
                    form.getFieldState("password").invalid,
                    form.getFieldState("confirm_password").invalid,
                  )
                  ]
                }
              </span>
            </div>
          </div>

          <div className="my-4 flex flex-col gap-2">
            <Button variant="secondary" type="submit">
              Зарегистрироваться
            </Button>
            <span className="text-sm font-medium text-content-tertiary">
              Нажимая кнопку, соглашаюсь с
              <Link className="pl-1 text-content-green" href="/">
                условиями обработки данных
              </Link>
            </span>
          </div>
          <div className="relative">
            <div
              aria-hidden="true"
              className="absolute inset-0 flex items-center"
            >
              <div className="w-full border-t border-border-primary" />
            </div>
            <div className="relative flex justify-center text-sm font-medium leading-6">
              <span className="bg-white text-content-tertiary px-4">или</span>
            </div>
          </div>
          <Button
            onClick={() => (window.location.href = API_URL + "/oauth/yandex")}
            className="mt-6 bg-background-inverse-secondary text-content-inverse-primary"
          >
            <object type="image/svg+xml" data="/yandex_id.svg"></object>
            Войти с Яндекс ID
          </Button>
        </form>
      </Form>

      <div className="z-10 rounded-3xl bg-background-primary flex gap-1 py-6 justify-center items-center">
        <span>Уже зарегистрированы?</span>
        <span
          className="cursor-pointer text-content-green"
          onClick={() => setStep("login")}
        >
          Войти
        </span>
      </div>
    </div>
  );
};
