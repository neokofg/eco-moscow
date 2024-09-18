"use client";
import { Button } from "@/src/shared/ui/button";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormMessage,
} from "@/src/shared/ui/form";
import { Input } from "@/src/shared/ui/input";
import { useToast } from "@/src/shared/ui/use-toast";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { Switch } from "@headlessui/react";

const formSchema = z.object({
  university: z.string(),
  speciality: z.string(),
  start_year: z.string(),
  end_year: z.string(),
  for_now: z.boolean(),
});

export const EditEducation = () => {
  const { toast } = useToast();
  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      university: "",
      speciality: "",
      start_year: "",
      end_year: "",
      for_now: false,
    },
  });

  const onSubmit = (values: z.infer<typeof formSchema>) => {
    console.log(values);
    toast({
      title: "Код отправлен",
    });
  };

  return (
    <Form {...form}>
      <form
        className="flex flex-col gap-6"
        onSubmit={form.handleSubmit(onSubmit)}
      >
        <FormField
          name="university"
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
                  placeholder="Университет"
                  {...field}
                />
              </FormControl>
              <FormMessage className="px-3 pt-2 text-border-error text-sm" />
            </FormItem>
          )}
        />
        <FormField
          name="speciality"
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
                  placeholder="Специальность"
                  {...field}
                />
              </FormControl>
              <FormMessage className="px-3 pt-2 text-border-error text-sm" />
            </FormItem>
          )}
        />
        <div className="flex gap-4">
          <FormField
            name="start_year"
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
                    placeholder="Год начала обучения"
                    {...field}
                  />
                </FormControl>
                <FormMessage className="px-3 pt-2 text-border-error text-sm" />
              </FormItem>
            )}
          />
          <FormField
            name="end_year"
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
                    placeholder="Год окончания обучения"
                    {...field}
                  />
                </FormControl>
                <FormMessage className="px-3 pt-2 text-border-error text-sm" />
              </FormItem>
            )}
          />
        </div>
        <FormField
          name="for_now"
          control={form.control}
          render={({ field }) => (
            <FormItem>
              <FormControl>
                <Switch
                  checked={field.value}
                  onChange={field.onChange}
                  className="group inline-flex h-6 w-11 items-center rounded-full bg-gray-200 transition data-[checked]:bg-content-green"
                >
                  <span className="size-4 translate-x-1 rounded-full bg-white transition group-data-[checked]:translate-x-6" />
                </Switch>
              </FormControl>
              <FormMessage className="px-3 pt-2 text-border-error text-sm" />
            </FormItem>
          )}
        />
        <div className="flex gap-2">
          <Button variant="secondary">Отменить</Button>
          <Button type="submit">Сохранить</Button>
        </div>
      </form>
    </Form>
  );
};
