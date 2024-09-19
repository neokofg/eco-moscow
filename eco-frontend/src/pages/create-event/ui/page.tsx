"use client";

import { Button } from "@/src/shared/ui/button";
import { Form, FormControl, FormField, FormItem } from "@/src/shared/ui/form";
import { Input } from "@/src/shared/ui/input";
import { Textarea } from "@/src/shared/ui/textarea";
import {
  Combobox,
  ComboboxInput,
  ComboboxOption,
  ComboboxOptions,
} from "@headlessui/react";
import { zodResolver } from "@hookform/resolvers/zod";
import { FC, useState } from "react";
import { useForm } from "react-hook-form";
import { z } from "zod";

const formSchema = z.object({
  title: z.string(),
  category_id: z.string(),
  address: z.string(),
  image_url: z.string(),
  content: z.string(),
});

export const CreateEventPage: FC = () => {
  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      title: "",
      category_id: "",
      address: "",
      image_url: "",
      content: "",
    },
  });

  const onSubmit = (values: z.infer<typeof formSchema>) => { };

  return (
    <div className="container mt-6 flex justify-center">
      <Form {...form}>
        <form
          className="bg-background-primary rounded-3xl w-[943px] p-6 flex flex-col gap-6"
          onSubmit={form.handleSubmit(onSubmit)}
        >
          <h5>создание мероприятия</h5>
          <div className="flex w-full gap-4">
            <FormField
              name="title"
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
                      placeholder="Название мероприятия"
                      withAsterisk
                      {...field}
                    />
                  </FormControl>
                </FormItem>
              )}
            />
            <FormField
              name="category_id"
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
                      withAsterisk
                      placeholder="Категория"
                      {...field}
                    />
                  </FormControl>
                </FormItem>
              )}
            />
          </div>
          <FormField
            name="address"
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
                    withAsterisk
                    placeholder="Адрес мероприятия"
                    {...field}
                  />
                </FormControl>
              </FormItem>
            )}
          />
          <FormField
            name="content"
            control={form.control}
            render={({ field }) => (
              <FormItem>
                <FormControl>
                  <Textarea
                    className={
                      form.getFieldState(field.name).invalid
                        ? "outline-border-error"
                        : ""
                    }
                    placeholder="Описание"
                    {...field}
                  />
                </FormControl>
              </FormItem>
            )}
          />
          <div className="flex gap-4 items-start w-full">
            <Button variant="secondary">Отменить</Button>
            <Button type="submit">Опубликовть</Button>
          </div>
        </form>
      </Form>
    </div>
  );
};
