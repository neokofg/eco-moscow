import { PenIcon } from "@/src/shared/icons";
import { Button } from "@/src/shared/ui/button";
import {
  Dialog,
  DialogClose,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "@/src/shared/ui/dialog";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormMessage,
} from "@/src/shared/ui/form";
import { Input, PasswordInput } from "@/src/shared/ui/input";
import { useToast } from "@/src/shared/ui/use-toast";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";

const formSchema = z.object({
  email: z.string().email(),
  password: z.string().min(8),
});

export const ChangeEmail = () => {
  const { toast } = useToast();
  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      email: "",
      password: "",
    },
  });

  const onSubmit = (values: z.infer<typeof formSchema>) => {
    toast({
      title: "Код отправлен",
    });
  };

  return (
    <Dialog>
      <DialogTrigger className="absolute top-4 right-4">
        <PenIcon />
      </DialogTrigger>
      <DialogContent>
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)}>
            <DialogHeader>
              <DialogTitle>Изменить E-mail учетной записи</DialogTitle>
            </DialogHeader>
            <div className="mt-6 flex flex-col gap-4 mb-6">
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
                    <FormMessage className="px-3 pt-2 text-border-error text-sm" />
                  </FormItem>
                )}
              />
            </div>
            <div className="flex gap-2">
              <DialogClose asChild>
                <Button variant="secondary">Отменить</Button>
              </DialogClose>
              <Button type="submit">Сохранить</Button>
            </div>
          </form>
        </Form>
      </DialogContent>
    </Dialog>
  );
};
