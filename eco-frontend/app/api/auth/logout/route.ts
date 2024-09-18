import { NextRequest, NextResponse } from "next/server";
import { cookies } from "next/headers";

export async function GET(request: NextRequest) {
  const token = cookies().get("token");
  if (token == undefined)
    return NextResponse.json({ message: "token is undefined" });
  cookies().delete("token");
  return NextResponse.json({ message: "Вы успешно вышли" }, { status: 200 });
}
