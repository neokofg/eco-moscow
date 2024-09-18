"use client";

import { API_URL, publicAPI } from "@/src/shared/api";
import { useToast } from "@/src/shared/ui/use-toast";
import { zodResolver } from "@hookform/resolvers/zod";
import {
  Dispatch,
  FC,
  PropsWithChildren,
  SetStateAction,
  createContext,
  useState,
} from "react";
import { useForm, UseFormReturn } from "react-hook-form";
import { z } from "zod";
import { useUser } from ".";

// ====FORMS====
const loginFormSchema = z.object({
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
  remember: z.boolean().default(false),
});

const registerSchema = z.object({
  name: z.string().min(1, {
    message: "Введите имя",
  }),
  surname: z.string().min(1, {
    message: "Введите фамилию",
  }),
  email: z
    .string()
    .min(1, {
      message: "Введите email",
    })
    .email({
      message: "Неправильный email",
    }),
  password: z
    .string()
    .min(8, {
      message: "Пароль должен содержать больше 8 символов",
    })
    .regex(
      /^[a-zA-Z0-9]+$/,
      "Пароль должен содержать только латинские буквы и цифры",
    )
    .refine((password) => /[a-z]/.test(password), {
      message: "Пароль должен содержать хотя бы одну прописную букву",
    })
    .refine((password) => /[A-Z]/.test(password), {
      message: "Пароль должен содержать хотя бы одну заглавную букву",
    })
    .refine((password) => /[0-9]/.test(password), {
      message: "Пароль должен содержать хотя бы одну цифру",
    }),
  confirm_password: z.string(),
});

const registerFormSchema = registerSchema.superRefine((data, ctx) => {
  if (data.password !== data.confirm_password) {
    ctx.addIssue({
      code: z.ZodIssueCode.custom,
      message: "Пароли не совпадают",
      path: ["confirm_password"],
    });
  }
});

type STEP = "login" | "register" | "email";

interface SignInContext {
  step: STEP;
  setStep: Dispatch<SetStateAction<STEP>>;
  onLoginSubmit: (values: z.infer<typeof loginFormSchema>) => void;
  onRegisterSubmit: (values: z.infer<typeof registerFormSchema>) => void;
  loginForm?: UseFormReturn<
    {
      email: string;
      password: string;
      remember: boolean;
    },
    any,
    undefined
  >;
  registerForm?: UseFormReturn<
    {
      name: string;
      surname: string;
      email: string;
      password: string;
      confirm_password: string;
    },
    any,
    undefined
  >;
}

const defaultValues: SignInContext = {
  step: "login",
  setStep: () => null,
  onLoginSubmit: () => null,
  onRegisterSubmit: () => null,
  loginForm: undefined,
  registerForm: undefined,
};

export const SignInContext = createContext(defaultValues);

export const SignInProvider: FC<PropsWithChildren> = ({ children }) => {
  const [step, setStep] = useState(defaultValues.step);
  const { toast } = useToast();
  const { setToken } = useUser();

  const loginForm = useForm<z.infer<typeof loginFormSchema>>({
    resolver: zodResolver(loginFormSchema),
    defaultValues: {
      email: "",
      password: "",
      remember: false,
    },
  });

  const registerForm = useForm<z.infer<typeof registerFormSchema>>({
    resolver: zodResolver(registerFormSchema),
    defaultValues: {
      name: "",
      surname: "",
      email: "",
      password: "",
      confirm_password: "",
    },
    mode: "onChange",
  });

  const onLoginSubmit = async (values: z.infer<typeof loginFormSchema>) => {
    const res = await fetch("/api/auth/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(values),
    });

    const json = await res.json();

    console.log(json);

    //return publicAPI
    //  .post("/api/v1/client/auth/login", values)
    //  .then((res) => {
    //    setToken(res.data.data.token);
    //    toast({
    //      title: res.data.message,
    //      variant: "success",
    //    });
    //  })
    //  .catch((err) => {
    //    toast({
    //      title: err,
    //      variant: "destructive",
    //    });
    //  });
  };

  const onRegisterSubmit = async (
    values: z.infer<typeof registerFormSchema>,
  ) => {
    const res = await fetch(API_URL + "/api/v1/client/auth/register/", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(values),
    });
    const json = await res.json();

    if (json["data"])
      toast({
        title: json["message"],
      });
  };

  const values = {
    step,
    setStep,
    onLoginSubmit,
    onRegisterSubmit,
    loginForm,
    registerForm,
  };

  return (
    <SignInContext.Provider value={values}>{children}</SignInContext.Provider>
  );
};
