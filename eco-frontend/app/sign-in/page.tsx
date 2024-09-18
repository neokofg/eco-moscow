import { SignInProvider } from "@/src/app/providers";
import { SignInPage } from "@/src/pages/sign-in";

export default function Page() {
  return (
    <SignInProvider>
      <SignInPage />
    </SignInProvider>
  );
}
