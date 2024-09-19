"use client";
import { Avatar, AvatarFallback, AvatarImage } from "@/src/shared/ui/avatar";
import { Button } from "@/src/shared/ui/button";
import { FC } from "react";
import { AvatarIcon } from "../icons";
import { cn } from "../lib/utils";
interface UserAvatarProps {
  src: string;
  className?: string;
}
export const UserAvatar: FC<UserAvatarProps> = ({ src, className }) => {
  return (
    <Avatar className={cn("h-12 w-12", className)}>
      <AvatarImage src={src} alt="avatar" />
      <AvatarFallback className={cn("h-12 w-12", className)}>
        <Button
          variant="ghost"
          className={cn("h-12 w-12 p-0", className)}
          size="icon-lg"
        >
          <AvatarIcon />
        </Button>
      </AvatarFallback>
    </Avatar>
  );
};
