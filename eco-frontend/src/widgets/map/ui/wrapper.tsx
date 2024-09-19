import { memo } from "react";

export const MapWrapper = memo(
  () => {
    return (
      <div
        id="map-container"
        className="map-wrapper"
        style={{ width: "100%", height: "100%" }}
      ></div>
    );
  },
  () => true,
);
