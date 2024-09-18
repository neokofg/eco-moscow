import { ProfileMenu } from "@/src/widgets/profile-menu";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";
import { FC, PropsWithChildren } from "react";

export const ProfileLayout: FC<PropsWithChildren> = ({ children }) => {
  const cookieStore = cookies();
  const token = cookieStore.get("token");

  if (token?.value)
    return (
      <section className="container mt-6 flex gap-4">
        <ProfileMenu />
        <div className="p-6 w-full bg-background-primary rounded-3xl">
          {children}
        </div>
      </section>
    );

  redirect("/");
};
