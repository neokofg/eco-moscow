import axios from "axios";

export const API_URL = process.env.NEXT_PUBLIC_API_URL;
export const API_S3_URL = process.env.NEXT_PUBLIC_API_S3_URL;

export const publicAPI = axios.create({
  baseURL: API_URL,
});

export const privateAPI = axios.create({
  baseURL: API_URL,
});
