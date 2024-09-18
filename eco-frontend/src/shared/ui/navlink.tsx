"use client";
import Link, { LinkProps } from "next/link";
import { usePathname } from "next/navigation";
import { FC, ReactNode } from "react";
import { cn } from "../lib/utils";

interface NavLinkProps extends LinkProps {
  children: ReactNode;
  Icon?: FC;
}

export const NavLink: FC<NavLinkProps> = ({ children, Icon, ...rest }) => {
  const pathname = usePathname();
  return (
    <Link
      className={cn(
        "flex gap-1 px-4 py-3 rounded-xl",
        pathname === rest.href ? "bg-background-primary" : "",
      )}
      {...rest}
    >
      {Icon && <Icon />}
      <span className="text-base font-medium text-content-primary">
        {children}
      </span>
    </Link>
  );
};
