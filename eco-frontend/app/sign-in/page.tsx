import { SignInProvider } from "@/src/app/providers";
import { SignInPage } from "@/src/pages/sign-in";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";

export default function Page() {
  const cookieStore = cookies();
  const token = cookieStore.get("token");

  if (token) redirect("/");

  return (
    <SignInProvider>
      <SignInPage />
    </SignInProvider>
  );
}
