import { FC } from "react";
import { AssetType } from ".";

export const IllustrationAsset: FC<AssetType> = (props) => {
  const { width = 986, height = 620, color = "#F4F4F5" } = props;
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width={width}
      height={height}
      fill="none"
      viewBox="0 0 986 620"
    >
      <path
        fill={color}
        d="M618.244 184.441c-22.139 2.326-41.34 19.9-57.275 33.847-7.994 6.997-14.944 14.618-21.959 22.577-7.825 8.874-16.845 17.358-22.798 27.661-.624 1.079.606 2.466 1.679 1.563 8.175-6.898 14.968-15.3 23.335-22.035 8.816-7.096 18.921-13.393 28.629-19.206 17.545-10.513 39.492-16.519 55.031-30.052 6.39-5.568 1.346-15.189-6.642-14.35v-.005zM471.881 317.603c-15.032.449-26.402 18.804-33.136 30.617-8.892 15.592-13.364 32.565-19.597 49.258-.111.304.332.467.46.175 7.452-16.396 19.802-29.643 32.367-42.436 8.315-8.472 23.475-19.393 24.751-31.772.269-2.623-1.947-5.929-4.839-5.848l-.006.006zM536.188 339.871c-72.773 37.124-139.378 101.455-163.494 181.318-24.086 79.783-12.711 181.564 49.976 241.667 17.474 16.752 39.118 29.113 63.491 31.819 12.069 1.341 20.419-2.268 30.908-7.516 4.595-2.297 10.315-4.28 14.42-7.446 4.355-3.359 6.005-8.309 8.839-12.88 1.026-1.656-.542-3.504-2.344-2.828-4.414 1.65-9.171 1.306-13.644 2.6-4.746 1.382-8.291 3.499-13.556 3.073-8.356-.676-17.032-2.227-25.481-3.148-18.6-2.029-35.404-12.21-48.704-24.991-27.521-26.454-44.704-64.027-51.934-101.111-14.548-74.581 8.664-154.281 54.593-213.994 26.507-34.465 60.121-63.497 97.07-86.272.175-.11.053-.396-.14-.297v.006zM387.936 281.604c-3.102 9.219 6.373 21.795 8.361 30.868 2.834 12.921 4.315 27.055 3.942 40.261-.98 34.915-4.362 68.873-9.096 103.426-.298 2.187 3.166 3.044 3.825.886 6.484-21.142 9.002-43.812 13.037-65.502 3.225-17.306 4.706-35.41 6.496-52.949 1.516-14.839.793-29.959-5.749-43.661-1.184-2.478-17.265-23.912-20.822-13.341l.006.012zM329.943 324.314c.904 13.225 3.965 26.256 7.714 38.95 3.948 13.358 12.216 24.448 16.274 37.736 4.099 13.423 8.128 26.495 8.361 40.582.239 14.122-1.976 28.052-2.075 42.104-.006 1.026 1.626 1.609 1.912.443 3.335-13.539 3.265-28.343 3.533-42.232.28-14.682 2.834-28.874 3.184-43.567.344-14.268 3.959-28.699.863-42.909-3.207-14.711-9.58-28.961-18.822-40.797-7.982-10.227-21.69-1.301-20.944 9.696v-.006zM343.978 568.92c-.951-5.102-2.385-10.181-4.07-15.213.385-7.37-1.05-14.722-1.679-22.18-1.067-12.623-1.062-25.358-1.93-37.987-1.563-22.746-8.28-45.76-17.837-66.447-8.74-18.915-22.221-35.906-39.34-47.859-14.087-9.836-30.057-12.209-45.794-16.501-10.14-7.247-21.148-13.078-32.717-16.244-17.795-4.875-45.199-10.822-59.537 4.863-.099.11.035.279.163.256 11.644-2.087 21.836-5.778 33.947-3.93 13.463 2.058 24.308 9.102 33.719 18.723 16.495 16.862 22.711 42.716 32.599 63.549 11.878 25.031 25.382 51.118 44.11 71.491 19.784 21.521 32.122 49.73 53.427 69.753 1.895 1.784 5.487.74 4.927-2.28l.012.006zM626.553 543.025c-13.62 3.417-18.553 22.297-9.545 32.833 12.105 14.157 36.075 7.277 44.594-7.183 9.405-15.959 2.577-37.469-11.195-48.605-17.183-13.889-41.638-8.542-56.483 6.169-16.594 16.448-19.62 42.01-9.906 62.913 11.207 24.111 35.929 38.215 61.485 41.982 58.098 8.559 110.545-30.262 138.317-78.4 14.798-25.656 22.693-55.643 19.999-85.31-2.402-26.425-13.737-56.949-35.876-73.03-.939-.682-1.994.548-1.341 1.44 11.58 15.679 21.772 30.74 26.565 49.935 4.268 17.084 4.874 34.972 1.667 52.284-7.072 38.203-32.588 71.356-62.978 94.499-32.197 24.518-81.869 37.567-117.786 12.606-14.916-10.367-26.594-29.708-25.003-48.366 1.715-20.157 20.256-38.267 41.125-36.384 19.533 1.761 35.276 26.279 24.943 44.273-5.69 9.918-19.643 16.303-30.261 9.999-11.837-7.026-11.09-25.917 1.778-31.34.169-.07.088-.355-.099-.315zM817.563 147.794c35.567-6.88 74.091.064 102.428 23.632 26.484 22.023 41.498 60.395 32.011 94.312-7.376 26.355-34.349 47.422-62.144 44.448-18.851-2.017-38.436-13.44-37.253-34.833.496-8.991 4.525-18.215 13.125-22.139 12.321-5.627 25.632 6.082 20.052 18.903-1.918 4.403 5.021 6.991 6.951 2.636 4.932-11.114-.519-24.291-11.586-29.352-12.775-5.843-27.889 2.116-33.918 13.976-16.46 32.355 15.679 60.366 46.483 60.407 27.912.035 54.255-17.504 64.611-43.929 13.346-34.069.478-73.351-23.936-98.983-29.97-31.463-75.811-39.427-116.97-29.888-.513.116-.385.915.146.81z"
      ></path>
      <path
        fill="#F4F4F5"
        d="M714.423 580.185a207.28 207.28 0 0020.798-18.425c6.589-6.694 13.656-11.545 20.915-17.417 12.443-10.064 21.072-27.416 25.725-42.518 5.37-17.439-1.265-31.591-6.39-47.998-4.723-15.119-12.309-29.877-22.326-42.221-.7-.863-2.181.035-1.662 1.05 6.979 13.667 17.375 26.337 20.343 41.818 2.799 14.606-8.775 31.445-14.273 44.716-5.61 13.539-13.289 25.574-17.178 39.766-4.332 15.813-16.291 28.308-26.786 40.459-.443.513.338 1.166.839.781l-.005-.011zM766.38 381.409c12.775 7.446 25.656 16.722 34.961 28.361 9.254 11.574 14.192 27.812 19.306 41.526 5.493 14.734 7.213 30.705 12.898 45.258 3.76 9.633 7.358 14.426 7.446 25.469.064 8.519-.426 17.137-.793 25.65-.018.443.641.798.897.332 4.094-7.44 6.922-14.845 8.793-23.16 1.172-5.189 1.563-10.641 3.05-15.737 1.189-4.064 3.463-7.732 4.53-11.836 4.566-17.574-4.128-40.145-13.049-55.083-9.137-15.295-21.451-25.014-35.515-35.434-13.568-10.052-26.588-19.241-42.366-25.638-.169-.07-.321.193-.158.292zM795.831 143.556c19.51 3.48 39.119 7.807 58.296 12.746 16.594 4.273 33.335 6.483 48.827 14.116 14.32 7.055 26.705 17.282 41.777 22.565 16.443 5.766 28.909 14.338 37.457 29.952 1.032 1.884 4.256 1.131 3.761-1.183-3.219-15.096-12.408-26.239-21.463-38.308-11.697-15.592-26.507-26.169-44.676-33.685-17.9-7.405-40.57-8.518-59.73-8.845-21.55-.367-42.786.752-64.254 2.297-.205.018-.164.31.011.345h-.006zM801.621 112.355c10.793 1.265 21.592 2.07 32.349 3.528 11.388 1.539 22.647 4.274 33.994 5.725 10.244 1.312 21.008.374 31.252-.548 10.851-.979 21.061-.828 29.201-8.88 4.367-4.326 3.3-10.612-2.204-13.294-9.808-4.781-18.618-1.936-28.938-.46-10 1.428-20.227 2.32-30.064 4.67-9.994 2.385-19.177 5.527-29.474 6.728-12.023 1.406-23.883 1.289-35.952.875-1.067-.035-1.231 1.534-.158 1.656h-.006zM812.344 92.472c8.163 1.277 16.548-1.073 24.833-.77 7.866.286 15.749.654 23.615.088 13.55-.974 34.366-5.312 39.252-19.848 1.015-3.026.28-7.44-2.769-9.19-12.933-7.398-29.399.07-41.55 6.543-6.939 3.697-13.498 8.099-20.355 11.936-7.475 4.18-16.035 5.311-23.323 9.521-.782.45-.624 1.586.297 1.726v-.006zM812.134 71.732c17.854-7.09 37.888-7.912 51.328-23.154 2.268-2.571 2.163-6.723.91-9.667-.694-1.633-1.703-2.711-3.114-3.76-2.688-1.995-6.653-2.42-9.667-.91-16.682 8.372-24.944 26.045-40.256 36.22-.746.496.047 1.569.805 1.271h-.006zM175.148 206.806c-17.168 5.161-26.902 23.262-21.742 40.43 5.161 17.168 23.262 26.903 40.43 21.742 17.168-5.16 26.902-23.261 21.742-40.43-5.161-17.168-23.262-26.902-40.43-21.742zM234.466 152.095c-12.676 12.676-12.676 33.228 0 45.904 12.677 12.677 33.229 12.677 45.905.001 12.677-12.677 12.677-33.229 0-45.906-12.676-12.676-33.228-12.676-45.905.001zM336.644 87.875c-17.453 17.454-17.453 45.751 0 63.205 17.454 17.454 45.752 17.453 63.205 0 17.454-17.454 17.454-45.751 0-63.205-17.453-17.454-45.751-17.454-63.205 0zM531.471 373.016c-15.65 15.651-15.65 41.025 0 56.675 15.65 15.65 41.024 15.65 56.674 0 15.65-15.651 15.65-41.024 0-56.675-15.65-15.65-41.024-15.65-56.674 0zM653.944 177.975c-15.65 15.65-15.65 41.024 0 56.674 15.65 15.65 41.024 15.65 56.674 0 15.65-15.65 15.65-41.024 0-56.674-15.65-15.65-41.024-15.65-56.674 0zM589.64 110.978c-9.671 19.908-1.372 43.886 18.535 53.557 19.908 9.671 43.887 1.373 53.558-18.535s1.372-43.887-18.536-53.558c-19.907-9.67-43.886-1.372-53.557 18.536zM651.927 28.749c-15.65 15.65-15.65 41.024 0 56.674 15.65 15.65 41.024 15.65 56.674 0 15.65-15.65 15.65-41.024 0-56.674-15.65-15.65-41.024-15.65-56.674 0zM719.952 88.35c-2.682 21.969 12.954 41.953 34.923 44.635 21.97 2.682 41.954-12.954 44.636-34.924 2.682-21.97-12.954-41.953-34.923-44.635-21.97-2.682-41.954 12.954-44.636 34.923zM728.867 168.675c-7.334 20.883 3.65 43.756 24.532 51.089 20.883 7.334 43.756-3.65 51.09-24.532 7.333-20.883-3.651-43.756-24.533-51.09-20.882-7.333-43.756 3.651-51.089 24.533zM487.819 141.744c-15.65 15.65-15.65 41.024 0 56.674 15.65 15.651 41.024 15.651 56.674 0 15.651-15.65 15.651-41.024 0-56.674-15.65-15.65-41.024-15.65-56.674 0zM423.003 81.258c-5.219 21.509 7.986 43.176 29.494 48.395 21.508 5.22 43.176-7.985 48.395-29.494 5.219-21.508-7.986-43.175-29.494-48.395-21.509-5.219-43.176 7.986-48.395 29.494zM435.194 216.849c-15.65 15.651-15.65 41.025 0 56.675 15.65 15.65 41.024 15.65 56.675 0 15.65-15.65 15.65-41.024 0-56.675-15.651-15.65-41.025-15.65-56.675 0zM345.906 189.302c-15.65 15.65-15.65 41.024.001 56.674 15.65 15.651 41.024 15.651 56.674 0 15.65-15.65 15.65-41.024 0-56.674-15.65-15.65-41.024-15.65-56.675 0zM513.074 305.422c-5.219 21.508 7.986 43.175 29.494 48.394 21.509 5.22 43.176-7.985 48.395-29.494 5.22-21.508-7.985-43.175-29.494-48.394-21.508-5.22-43.175 7.985-48.395 29.494zM611.992 260.252c-15.65 15.65-15.65 41.024 0 56.675 15.65 15.65 41.024 15.65 56.674 0 15.65-15.651 15.65-41.025 0-56.675-15.65-15.65-41.024-15.65-56.674 0zM668.176 326.557c-15.65 15.65-15.65 41.024 0 56.674 15.65 15.65 41.024 15.65 56.674 0 15.651-15.65 15.651-41.024 0-56.674-15.65-15.65-41.024-15.65-56.674 0zM620.609 404.511c-15.65 15.65-15.65 41.024 0 56.675 15.651 15.65 41.024 15.65 56.675 0 15.65-15.651 15.65-41.024 0-56.675-15.651-15.65-41.024-15.65-56.675 0zM463.129 712.718c-2.997-8.787-2.35-20.968-3.265-30.431-.863-8.874-1.965-17.65-3.073-26.507-2.128-17.002-3.877-33.771-2.53-50.908 1.282-16.291 5.002-32.057 7.23-48.197 1.213-8.804 1.714-18.472 6.699-26.11 4.105-6.28 9.131-11.014 12.134-18.063.262-.618-.344-1.376-1.009-1.219-8.413 1.982-12.886 6.886-19.072 12.763-6.169 5.86-13.481 10.274-19.527 16.216-15.708 15.44-23.23 35.561-25.807 57.223-2.554 21.451.292 44.786 8.029 64.931 3.638 9.481 8.425 18.687 14.693 26.71 3.435 4.397 7.318 8.852 11.464 12.618 4.367 3.971 9.649 6.706 13.614 11.219.193.221.502 0 .414-.263l.006.018zM490.405 716.443c.269-9.568.531-19.072 1.93-28.559 1.341-9.072 4.986-17.159 6.91-26.051 3.825-17.708 8.32-35.09 14.104-52.273 4.776-14.18 10.63-27.364 13.306-42.185 1.539-8.525 3.085-14.239 8.734-21.172 5.785-7.096 12.432-13.97 18.787-20.565 1.265-1.312.064-3.189-1.662-2.629-17.538 5.661-28.203 18.64-43.2 28.244-15.276 9.784-23.515 24.979-28.465 42.039-5.609 19.341-6.146 38.693-4.688 58.646.787 10.804 4.006 19.527 6.769 29.813 3.061 11.393 4.677 23.159 6.822 34.733.064.356.642.356.653-.029v-.012zM543.827 611.461c-14.362 9.755-20.705 33.544-21.323 49.917-.718 18.973 1.282 38.483 4.583 57.13.14.793 1.486.798 1.469-.059-.292-18.897 3.3-35.777 11.084-53.089 6.297-14.005 16.437-31.62 16.997-47.124.256-7.137-7.16-10.612-12.816-6.775h.006z"
      ></path>
      <path
        fill="#F4F4F5"
        d="M46.831 200.143c-6.717-5.493-12.769-14.449-10.658-23.551 2.962-12.792 20.238-22.664 31.352-26.961 15.982-6.175 35.59-5.422 52.325-3.318 18.804 2.368 36.494 10.198 52.22 20.635 59.036 39.171 96.86 108.79 126.556 171.168 8.735 18.343 17.323 36.967 24.373 56.016 3.749 10.128 8.705 19.189 11.795 29.678 3.079 10.443 5.703 21.02 8.624 31.504.111.402.705.315.653-.117-1.388-10.828-3.656-21.329-6.356-31.906-2.583-10.116-3.784-20.687-6.944-30.541-6.904-21.504-14.752-42.296-24.629-62.628-18.507-38.11-40.722-75.736-66.465-109.42-24.798-32.454-55.386-60.867-93.157-77.415-19.166-8.396-38.851-16.139-60.034-16.658-18.612-.455-40.022.396-56.785 9.428-18.536 9.988-31.498 30.081-29.125 51.526 2.297 20.781 18.874 39.696 40.728 36.903 12.29-1.574 14.011-17.41 5.533-24.343h-.006z"
      ></path>
      <path
        fill="#F4F4F5"
        d="M137.747 120.947c-12.677 12.676-12.676 33.229 0 45.905 12.676 12.676 33.229 12.676 45.905 0 12.676-12.676 12.676-33.229 0-45.905-12.676-12.676-33.229-12.676-45.905 0zM80.767 495.54c-22.807 9.438-33.646 35.578-24.208 58.386 9.438 22.807 35.578 33.645 58.385 24.207 22.808-9.437 33.646-35.577 24.208-58.385-9.438-22.807-35.578-33.646-58.385-24.208z"
      ></path>
      <path
        fill="#F4F4F5"
        d="M47.09 541.664c-4.769 3.951-5.432 11.019-1.481 15.788 3.95 4.768 11.019 5.431 15.787 1.481 4.769-3.951 5.432-11.019 1.482-15.788-3.951-4.768-11.02-5.432-15.788-1.481z"
      ></path>
    </svg>
  );
};
