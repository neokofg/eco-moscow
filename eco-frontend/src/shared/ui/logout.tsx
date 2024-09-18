"use client";

import { useUser } from "@/src/app/providers";
import { Button } from "@/src/shared/ui/button";
import { LogoutIcon } from "@/src/shared/icons";
import { FC } from "react";
import { cn } from "../lib/utils";
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from "@/src/shared/ui/alert-dialog";

interface LogoutButtonProps {
  className?: string;
}

export const LogoutButton: FC<LogoutButtonProps> = ({ className }) => {
  const { logout } = useUser();

  return (
    <AlertDialog>
      <AlertDialogTrigger asChild>
        <Button
          variant="ghost"
          className={cn("justify-start p-4 items-center", className)}
        >
          <div className="flex gap-4 items-center">
            <LogoutIcon />
            <span className="text-border-error font-medium">Выйти</span>
          </div>
        </Button>
      </AlertDialogTrigger>
      <AlertDialogContent>
        <AlertDialogHeader>
          <AlertDialogTitle>Вы уверены?</AlertDialogTitle>
        </AlertDialogHeader>
        <AlertDialogFooter>
          <AlertDialogCancel>Отмена</AlertDialogCancel>
          <AlertDialogAction onClick={logout}>Выйти</AlertDialogAction>
        </AlertDialogFooter>
      </AlertDialogContent>
    </AlertDialog>
  );
};
