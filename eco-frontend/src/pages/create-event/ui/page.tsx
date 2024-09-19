import { Form, FormControl, FormField, FormItem } from "@/src/shared/ui/form";
import { Input } from "@/src/shared/ui/input";
import { zodResolver } from "@hookform/resolvers/zod";
import { FC } from "react";
import { useForm } from "react-hook-form";
import { z } from "zod";

const formSchema = z.object({
  name: z.string(),
  category: z.string(),
  address: z.string(),
  req: z.string(),
  description: z.string(),
});

export const CreateEventPage: FC = () => {
  const form = useForm<z.infer<typeof formSchema>>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      name: "",
      category: "",
      address: "",
      req: "",
      description: "",
    },
  });

  const onSubmit = (values: z.infer<typeof formSchema>) => { };

  return (
    <Form {...form}>
      <form onSubmit={form.handleSubmit(onSubmit)}>
        <h5>создание мероприятия</h5>
        <FormField
          name="name"
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
                  placeholder="Название мероприятия"
                  {...field}
                />
              </FormControl>
            </FormItem>
          )}
        />
      </form>
    </Form>
  );
};
