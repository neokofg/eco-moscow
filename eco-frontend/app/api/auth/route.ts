import { NextRequest, NextResponse } from "next/server";
import { cookies } from "next/headers";

export async function GET(request: NextRequest) {
  const searchParams = request.nextUrl.searchParams;
  const token = searchParams.get("token");
  if (token == undefined)
    return NextResponse.json({ message: "token is undefined" });
  cookies().set("token", token);
  return NextResponse.redirect(new URL("/", request.url));
}
