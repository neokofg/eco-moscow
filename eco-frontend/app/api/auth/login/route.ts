import { API_URL } from "@/src/shared/api";
import { NextRequest } from "next/server";

export async function POST(request: NextRequest) {
  try {
    const body = await request.json();

    const res = await fetch(API_URL + "/api/v1/client/auth/login");
  } catch (error) { }
}
