"use client";

import { ru } from "date-fns/locale";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/src/shared/ui/form";
import { zodResolver } from "@hookform/resolvers/zod";
import { FC, useState } from "react";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { AvatarIcon, CalendarIcon, CameraIcon } from "@/src/shared/icons";
import { Avatar, AvatarFallback, AvatarImage } from "@/src/shared/ui/avatar";
import { Button } from "@/src/shared/ui/button";
import { useMobile, useUser } from "@/src/app/providers";
import { sofiaSansCondensed } from "@/src/app/fonts";
import { Textarea } from "@/src/shared/ui/textarea";
import { Input, MaskInput } from "@/src/shared/ui/input";
import { Popover, PopoverContent } from "@/src/shared/ui/popover";
import { format, isValid, parse } from "date-fns";
import { Calendar } from "@/src/shared/ui/calendar";
import { RadioGroup, RadioGroupItem } from "@/src/shared/ui/radio-group";
import { Dialog, DialogContent, DialogTrigger } from "@/src/shared/ui/dialog";
import { API_S3_URL, privateAPI } from "@/src/shared/api";
import { toast } from "@/src/shared/ui/use-toast";
import { ChangeEmail } from "./changeEmail";
import { ChangePassword } from "./changePassword";

const formSchema = z.object({
  name: z.string(),
  surname: z.string(),
  gender: z.string(),
  birthdate: z.string(),
  about: z.string().optional(),
  address: z.string(),
  avatar_url: z.string().optional(),
});

function convertDateFormatAgain(dateString: string): string {
  if (!dateString || dateString.length != 10) return "";
  const [year, month, day] = dateString.split("-");
  return `${day.padStart(2, "0")}.${month.padStart(2, "0")}.${year}`;
}

function convertDateFormat(dateString: string) {
  const [day, month, year] = dateString.split(".");
  return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
}

export const EditProfile: FC = () => {
  const { user } = useUser();
  const isMobile = useMobile();

  if (user == undefined) return;
  const [month, setMonth] = useState(new Date());
  const [selectedDate, setSelectedDate] = useState<Date | undefined>(undefined);

  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      name: user.name as string,
      surname: user.surname as string,
      gender: user.gender as string,
      birthdate: convertDateFormatAgain(user.birthdate),
      about: user.about as string,
      address: user.address as string,
      avatar_url: user.avatar_url as string,
    },
  });

  const onSubmit = async (values: z.infer<typeof formSchema>) => {
    const body = values;
    body.birthdate = convertDateFormat(body.birthdate);

    return privateAPI
      .put("/api/v1/client/user", body)
      .then((res) => {
        toast({ title: res.data["message"], variant: "success" });
      })
      .catch((err) => {
        toast({ title: err.data["message"], variant: "success" });
      });
  };

  const handleDayPickerSelect = (date: Date | undefined) => {
    if (!date) {
      form.setValue("birthdate", "");
      setSelectedDate(undefined);
    } else {
      setSelectedDate(date);
      setMonth(date);
      form.setValue("birthdate", format(date, "dd.MM.y"));
    }
  };

  const handleInputChange = (value: string) => {
    form.setValue("birthdate", value);

    const parsedDate = parse(value, "dd.MM.y", new Date());

    if (parsedDate.getTime() > new Date().getTime()) {
      form.setError(
        "birthdate",
        {
          message: "Дата не может быть больше текущей",
        },
        { shouldFocus: true },
      );
    } else {
      form.clearErrors("birthdate");
    }

    if (isValid(parsedDate)) {
      setSelectedDate(parsedDate);
      setMonth(parsedDate);
    } else {
      setSelectedDate(undefined);
    }
  };
  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    if (e.target.files) {
      setFile(e.target.files[0]);
    }
  };
  const [file, setFile] = useState<File | null>(null);

  const handleUpload = async () => {
    if (file) {
      const formData = new FormData();
      formData.append("files", file);

      try {
        const result = await fetch(API_S3_URL as string, {
          method: "POST",
          body: formData,
        });

        const data = await result.json();

        form.setValue("avatar_url", data[0]);

        console.log(form.getValues());
      } catch (error) {
        console.error(error);
      }
    }
  };

  return (
    <Form {...form}>
      <form
        className="flex flex-col gap-8"
        onSubmit={form.handleSubmit(onSubmit)}
      >
        <div className="relative">
          <Dialog>
            <Avatar className="h-[100px] w-[100px]">
              <DialogTrigger asChild>
                <Button
                  variant="ghost"
                  className="h-[100px] w-[100px] p-0"
                  size="icon-lg"
                >
                  <AvatarImage
                    src={form.getValues("avatar_url")}
                    alt="avatar"
                  />
                  <AvatarFallback className="h-[100px] w-[100px]">
                    <AvatarIcon width={100} height={100} />
                  </AvatarFallback>

                  <div className="transition duration-200 hover:opacity-100 opacity-0 flex justify-center items-center h-[100px] w-[100px] bg-border-hover-overlay rounded-full absolute top-0 left-0">
                    <CameraIcon />
                  </div>
                </Button>
              </DialogTrigger>
            </Avatar>
            <DialogContent>
              <input type="file" onChange={handleFileChange} />
              <Button onClick={handleUpload}>отправить</Button>
            </DialogContent>
          </Dialog>
        </div>
        <div className="flex flex-col gap-4">
          <h3
            style={sofiaSansCondensed.style}
            className="font-bold text-[30px] leading-9 text-content-primary uppercase"
          >
            личная информация
          </h3>
          <div className="flex gap-4 w-full">
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
                      placeholder="Фамилия"
                      withAsterisk
                      {...field}
                    />
                  </FormControl>
                  <FormMessage className="px-3 pt-2 text-border-error text-sm" />
                </FormItem>
              )}
            />
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
                      placeholder="Имя"
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
            control={form.control}
            name="gender"
            render={({ field }) => (
              <FormItem className="space-y-3">
                <FormControl>
                  <RadioGroup
                    onValueChange={field.onChange}
                    defaultValue={field.value}
                    className="flex gap-6"
                  >
                    <FormItem className="flex items-center space-x-3 space-y-0">
                      <FormControl>
                        <RadioGroupItem value="male" />
                      </FormControl>
                      <FormLabel className="font-normal">Муж.</FormLabel>
                    </FormItem>
                    <FormItem className="flex items-center space-x-3 space-y-0">
                      <FormControl>
                        <RadioGroupItem value="female" />
                      </FormControl>
                      <FormLabel className="font-normal">Жен.</FormLabel>
                    </FormItem>
                  </RadioGroup>
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <div className="flex gap-4 w-full">
            <FormField
              name="birthdate"
              control={form.control}
              render={({ field }) => (
                <FormItem className="flex flex-col w-full">
                  <Popover>
                    <FormControl>
                      <MaskInput
                        placeholder="Дата рождения"
                        className={
                          form.getFieldState(field.name).invalid
                            ? "outline-border-error"
                            : ""
                        }
                        withAsterisk
                        Icon={isMobile ? undefined : CalendarIcon}
                        onAccept={handleInputChange}
                        value={field.value}
                        type="text"
                      />
                    </FormControl>
                    <PopoverContent
                      align="end"
                      sideOffset={24}
                      className="w-auto p-0"
                    >
                      <Calendar
                        mode="single"
                        locale={ru}
                        month={month}
                        onMonthChange={setMonth}
                        selected={selectedDate}
                        onSelect={handleDayPickerSelect}
                        disabled={(date) =>
                          date > new Date() || date < new Date("1900-01-01")
                        }
                        initialFocus
                      />
                    </PopoverContent>
                  </Popover>
                  <FormMessage className="px-3 pt-2 text-border-error text-sm" />
                </FormItem>
              )}
            />
            <FormField
              name="address"
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
                      placeholder="Место проживания"
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
            name="about"
            control={form.control}
            render={({ field }) => (
              <FormItem>
                <FormControl>
                  <Textarea
                    className="min-h-[104px] resize-none"
                    placeholder="О себе"
                    {...field}
                  />
                </FormControl>
              </FormItem>
            )}
          />
        </div>
        <div>
          <h3
            className="font-bold text-[30px] leading-9 text-content-primary uppercase"
            style={sofiaSansCondensed.style}
          >
            пароль учетной записи
          </h3>
          <p className="mt-2 font-medium text-base text-content-secondary">
            Вы можете установить новый пароль для входа в личный кабинет
          </p>
          <ChangePassword />
        </div>
        <div>
          <h3
            className="font-bold text-[30px] mb-4 leading-9 text-content-primary uppercase"
            style={sofiaSansCondensed.style}
          >
            контакты
          </h3>
          <div className="w-full flex gap-4">
            <div className="relative w-full">
              <Input
                className="w-full"
                value={user.email}
                placeholder="Почта"
                disabled
                withAsterisk
              />
              <ChangeEmail />
            </div>
            <div className="w-full" />
          </div>
        </div>

        <div className="flex gap-4 items-start w-[272px]">
          <Button type="submit">Сохранить</Button>
          <Button
            onClick={() => {
              form.setValue("name", user.name as string);
              form.setValue("surname", user.surname as string);
              form.setValue("gender", user.gender as string);
              form.setValue("about", user.about as string);
              form.setValue(
                "birthdate",
                convertDateFormatAgain(user.birthdate),
              );
              form.setValue("address", user.address as string);
              form.setValue("avatar_url", user.avatar_url as string);
            }}
            variant="secondary"
          >
            Отменить
          </Button>
        </div>
      </form>
    </Form>
  );
};
