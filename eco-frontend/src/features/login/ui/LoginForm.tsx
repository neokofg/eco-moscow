"use client";

import { FC } from "react";
import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import { z } from "zod";
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
import { Checkbox } from "@/src/shared/ui/checkbox";
import Link from "next/link";

const formSchema = z.object({
  email: z
    .string()
    .min(1, {
      message: "Введите email",
    })
    .email({
      message: "Неправильный email",
    }),
  password: z.string().min(8, {
    message: "Пароль должен содержать больше 8 символов",
  }),
  remember: z.boolean().default(false).optional(),
});

export const LoginForm: FC = () => {
  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      email: "",
      password: "",
      remember: false,
    },
  });

  const onSubmit = (values: z.infer<typeof formSchema>) => {
    console.log(values);
  };

  return (
    <Form {...form}>
      <form
        className="z-10 pt-8 p-6 rounded-3xl bg-background-primary"
        onSubmit={form.handleSubmit(onSubmit)}
      >
        <h3
          className="uppercase text-content-primary font-bold text-4xl pb-4 mb-4"
          style={sofiaSansCondensed.style}
        >
          ВХОД
        </h3>
        <div className="flex flex-col gap-4 w-full pb-4">
          <FormField
            name="email"
            control={form.control}
            render={({ field }) => (
              <FormItem>
                <FormControl>
                  <Input
                    className={
                      form.getFieldState("email").invalid
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
                      form.getFieldState("password").invalid
                        ? "outline-border-error"
                        : ""
                    }
                    placeholder="Пароль"
                    withAsterisk
                    {...field}
                  />
                </FormControl>
                <FormMessage className="px-3 pt-2 text-border-error text-sm" />
              </FormItem>
            )}
          />
          <div className="flex justify-between gap-4 flex-wrap">
            <FormField
              name="remember"
              control={form.control}
              render={({ field }) => (
                <FormItem className="flex gap-2 items-center">
                  <FormControl>
                    <>
                      <Checkbox
                        name="remember"
                        checked={field.value}
                        onChange={field.onChange}
                      />
                      <label htmlFor="remember">Запомнить пароль</label>
                    </>
                  </FormControl>
                </FormItem>
              )}
            />
            <Link className="text-content-green" href="/">
              Забыли пароль?
            </Link>
          </div>
        </div>

        <Button className="my-4" variant="secondary" type="submit">
          Войти
        </Button>
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
        <Button className="mt-6 bg-background-inverse-secondary text-content-inverse-primary">
          <object type="image/svg+xml" data="/yandex_id.svg"></object>
          Войти с Яндекс ID
        </Button>
      </form>
    </Form>
  );
};
