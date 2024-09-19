export function formatViews(views: number): string {
  if (views >= 1000000) return Math.ceil(views / 1000000) + " млн просмотров";
  if (views >= 1000) return Math.ceil(views / 1000) + " тыс. просмотров";
  return views + " просмотров";
}
