"use client";
import { Map } from "@2gis/mapgl/types";
import {
  createContext,
  Dispatch,
  FC,
  PropsWithChildren,
  SetStateAction,
  useState,
} from "react";

interface MapContext {
  mapInstance: Map | undefined;
  setMapInstance: Dispatch<SetStateAction<Map | undefined>>;
}

const defaultValues: MapContext = {
  mapInstance: undefined,
  setMapInstance: () => null,
};

export const MapContext = createContext(defaultValues);
export const MapProvider: FC<PropsWithChildren> = (props) => {
  const [mapInstance, setMapInstance] = useState<Map | undefined>(undefined);

  return (
    <MapContext.Provider value={{ mapInstance, setMapInstance }}>
      {props.children}
    </MapContext.Provider>
  );
};
