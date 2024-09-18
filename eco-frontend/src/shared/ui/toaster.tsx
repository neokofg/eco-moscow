"use client";
import {
  Toast,
  ToastDescription,
  ToastProvider,
  ToastTitle,
  ToastViewport,
} from "@/src/shared/ui/toast";
import { useToast } from "@/src/shared/ui/use-toast";
import { CheckCircleIcon, CloseCircleIcon, DangerCircleIcon } from "../icons";
import { ToastClose } from "@radix-ui/react-toast";

export function Toaster() {
  const { toasts } = useToast();

  return (
    <ToastProvider>
      {toasts.map(function({ id, title, description, action, ...props }) {
        return (
          <Toast key={id} {...props}>
            <ToastClose className="py-[14px] px-4 w-full cursor-auto">
              <div className="grid gap-1">
                {title && (
                  <div className="flex gap-2 items-center">
                    {props.variant == "destructive" && <CloseCircleIcon />}
                    {props.variant == "warning" && <DangerCircleIcon />}
                    {props.variant == "success" && <CheckCircleIcon />}
                    <ToastTitle>{title}</ToastTitle>
                  </div>
                )}
                {description && (
                  <ToastDescription>{description}</ToastDescription>
                )}
              </div>
            </ToastClose>
          </Toast>
        );
      })}
      <ToastViewport />
    </ToastProvider>
  );
}
