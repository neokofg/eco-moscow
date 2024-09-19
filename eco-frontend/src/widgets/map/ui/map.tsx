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
