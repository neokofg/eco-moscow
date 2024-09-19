import { API_POSTS_URL } from "@/src/shared/api";
import axios from "axios";

export async function getNews(options: string) {
  try {
    const response = await axios.get(
      API_POSTS_URL + "api/v1/newses?" + options,
    );
    // console.log(response.data);
    return response.data.data;
  } catch (error: any) {
    console.error(error.code);
  }
}

export async function getArticles(options: string) {
  try {
    const response = await axios.get(API_POSTS_URL + "api/v1/posts?" + options);
    // console.log(response.data.data.data)
    return response.data.data;
  } catch (error: any) {
    console.error(error.code);
  }
}
export async function getVideos(options: string) {
  try {
    const response = await axios.get(
      API_POSTS_URL + "api/v1/videos?" + options,
    );
    return response.data.data;
  } catch (error: any) {
    console.error(error.code);
  }
}
