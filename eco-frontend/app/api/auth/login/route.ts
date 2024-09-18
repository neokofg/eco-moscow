import { API_URL } from "@/src/shared/api";
import { NextRequest, NextResponse } from "next/server";
import { cookies } from "next/headers";

export async function POST(request: NextRequest) {
  try {
    const body = await request.json();

    const res = await fetch(API_URL + "/api/v1/client/auth/login", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      credentials: "include",
      body: JSON.stringify(body),
    });

    const json = await res.json();

    if (res.status != 200)
      return NextResponse.json(json, { status: res.status });

    const token = json["data"]["token"];

    if (token == undefined)
      return NextResponse.json(
        { message: "token is undefined" },
        { status: 500 },
      );

    cookies().set("token", token);

    return NextResponse.json({
      data: json["data"],
      message: json["message"],
    });
  } catch (error) {
    return NextResponse.json(
      {
        message: error,
      },
      { status: 500 },
    );
  }
}
