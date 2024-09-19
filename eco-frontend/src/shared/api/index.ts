import axios from "axios";

export const API_URL = process.env.NEXT_PUBLIC_API_URL;
export const API_SOCIAL_URL = process.env.NEXT_PUBLIC_SOCIAL_API_URL;
export const API_POSTS_URL = process.env.NEXT_PUBLIC_POSTS_API_URL;
export const API_S3_URL = process.env.NEXT_PUBLIC_API_S3_URL;

export const publicAPI = axios.create({
  baseURL: API_URL,
});

export const privateAPI = axios.create({
  baseURL: API_URL,
});

export const fetcher = (...args: any) =>
  axios.get(args, {}).then((data) => data.data.data);
