"use client";
import { useEffect } from "react";
import { load } from "@2gis/mapgl";
import { useMap } from "@/src/app/providers";
import { MapWrapper } from "./wrapper";

export const Map = () => {
  const { setMapInstance } = useMap();

  const start = async () => {
    const mapglAPI = await load();

    const map = new mapglAPI.Map("map-container", {
      center: [37.580391, 55.763894],
      zoom: 13,
      key: process.env.NEXT_PUBLIC_2GIS_KEY as string,
    });

    setMapInstance(map);

    //const marker = new mapglAPI.Marker(map, {
    //  coordinates: [55.31878, 25.23584],
    //});
    //
    //const popup = new mapglAPI.HtmlMarker(map, {
    //  coordinates: marker.getCoordinates(),
    //  html: `<div class="p-4 absolute rounded-lg bg-background-primary translate-x-[-50%] translate-y-[-150%] flex min-w-[280px]">
    //                <div class="flex flex-col gap-4">
    //                  <div class="flex flex-col">
    //                    <span class="label-small text-background-hover">${"Фамилия Имя"}</span>
    //                    <span class="label-tiny text-content-tertiary">${"Категория"}</span>
    //                  </div>
    //                  <p class="label-small text-content-tertiary">${"Улица Варварка домовладение 6, строение 1, Москва, 109012"}</p>
    //                </div>
    //                <img src="" alt="avatar" />
    //            </div>`,
    //});
    //const popupHtml = popup.getContent();
    //hidePopup();
    //
    //marker.on("mouseover", () => (popupHtml.style.display = "block"));
    //
    //map.on("mouseout", hidePopup);
    //
    //function hidePopup() {
    //  popupHtml.style.display = "none";
    //}
  };

  useEffect(() => {
    start();
  }, []);

  return (
    <div className="w-full h-[824px]">
      <MapWrapper />
    </div>
  );
};
