"use client";
import Link, { LinkProps } from "next/link";
import { usePathname } from "next/navigation";
import { FC, ReactNode } from "react";
import { cn } from "../lib/utils";

interface NavLinkProps extends LinkProps {
  children: ReactNode;
  activeClassName: string;
  className?: string;
  Icon?: FC;
}

export const NavLink: FC<NavLinkProps> = ({
  children,
  activeClassName,
  className,
  Icon,
  ...rest
}) => {
  const pathname = usePathname();
  return (
    <Link
      className={cn(className, pathname === rest.href ? activeClassName : "")}
      {...rest}
    >
      {Icon && <Icon />}
      {children}
    </Link>
  );
};
