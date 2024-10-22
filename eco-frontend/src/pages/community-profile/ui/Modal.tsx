import { Button } from "@/src/shared/ui/button";
import { useState } from "react";

const createButtons = [
	{
		text: "Запись",
		icon: (
			<svg
				width="25"
				height="24"
				viewBox="0 0 25 24"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M3.91797 22C3.91797 21.5858 4.25376 21.25 4.66797 21.25H20.668C21.0822 21.25 21.418 21.5858 21.418 22C21.418 22.4142 21.0822 22.75 20.668 22.75H4.66797C4.25376 22.75 3.91797 22.4142 3.91797 22Z"
					fill="#A1A1AA"
				/>
				<path
					d="M12.188 14.929L12.188 14.9289L18.1047 9.01225C17.2995 8.6771 16.3457 8.12656 15.4437 7.22455C14.5415 6.32238 13.991 5.36846 13.6558 4.56312L7.73903 10.4799L7.73898 10.48C7.27729 10.9417 7.04642 11.1725 6.84789 11.4271C6.61368 11.7273 6.41288 12.0522 6.24904 12.396C6.11016 12.6874 6.00691 12.9972 5.80042 13.6167L4.71153 16.8833C4.60991 17.1882 4.68925 17.5243 4.91647 17.7515C5.14369 17.9787 5.47979 18.0581 5.78464 17.9564L9.05131 16.8676C9.67078 16.6611 9.98053 16.5578 10.2719 16.4189C10.6157 16.2551 10.9406 16.0543 11.2409 15.8201C11.4954 15.6215 11.7263 15.3907 12.188 14.929Z"
					fill="#A1A1AA"
				/>
				<path
					d="M19.7465 7.37044C20.9751 6.14188 20.9751 4.14999 19.7465 2.92142C18.518 1.69286 16.5261 1.69286 15.2975 2.92142L14.5879 3.63105C14.5976 3.6604 14.6077 3.69015 14.6181 3.72028C14.8782 4.47 15.369 5.45281 16.2922 6.37602C17.2154 7.29923 18.1982 7.78999 18.948 8.05009C18.978 8.0605 19.0076 8.07054 19.0368 8.08021L19.7465 7.37044Z"
					fill="#A1A1AA"
				/>
			</svg>
		),
		link: "/posts/create",
	},
	{
		text: "Статью",
		icon: (
			<svg
				width="24"
				height="24"
				viewBox="0 0 24 24"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M21 11.0975V16.0909C21 19.1875 21 20.7358 20.2659 21.4123C19.9158 21.735 19.4739 21.9377 19.0031 21.9915C18.016 22.1045 16.8633 21.0849 14.5578 19.0458C13.5388 18.1445 13.0292 17.6938 12.4397 17.5751C12.1494 17.5166 11.8506 17.5166 11.5603 17.5751C10.9708 17.6938 10.4612 18.1445 9.44216 19.0458C7.13673 21.0849 5.98402 22.1045 4.99692 21.9915C4.52615 21.9377 4.08421 21.735 3.73411 21.4123C3 20.7358 3 19.1875 3 16.0909V11.0975C3 6.80891 3 4.6646 4.31802 3.3323C5.63604 2 7.75736 2 12 2C16.2426 2 18.364 2 19.682 3.3323C21 4.6646 21 6.80891 21 11.0975ZM8.25 6C8.25 5.58579 8.58579 5.25 9 5.25H15C15.4142 5.25 15.75 5.58579 15.75 6C15.75 6.41421 15.4142 6.75 15 6.75H9C8.58579 6.75 8.25 6.41421 8.25 6Z"
					fill="#A1A1AA"
				/>
			</svg>
		),
		link: "/news/create",
	},
	{
		text: "Видео",
		icon: (
			<svg
				width="25"
				height="24"
				viewBox="0 0 25 24"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M8.84583 2.00001H15.8259C16.0584 1.99995 16.2367 1.99991 16.3925 2.01515C17.5003 2.12352 18.407 2.78958 18.7915 3.68678H5.88022C6.26473 2.78958 7.17148 2.12352 8.2793 2.01515C8.43511 1.99991 8.61335 1.99995 8.84583 2.00001Z"
					fill="#A1A1AA"
				/>
				<path
					d="M6.64645 4.72312C5.25583 4.72312 4.11557 5.56287 3.73504 6.67691C3.7271 6.70013 3.7195 6.72348 3.71223 6.74693C4.11038 6.62636 4.52474 6.54759 4.94421 6.49382C6.02459 6.35531 7.38993 6.35538 8.97596 6.35547H15.8681C17.4541 6.35538 18.8194 6.35531 19.8998 6.49382C20.3193 6.54759 20.7336 6.62636 21.1318 6.74693C21.1245 6.72348 21.1169 6.70013 21.109 6.67691C20.7284 5.56287 19.5882 4.72312 18.1976 4.72312H6.64645Z"
					fill="#A1A1AA"
				/>
				<path
					fill-rule="evenodd"
					clip-rule="evenodd"
					d="M15.6635 7.54204H9.00833C5.63352 7.54204 3.9461 7.54204 2.99826 8.52887C2.05041 9.5157 2.27342 11.0403 2.71945 14.0896L3.14242 16.9811C3.4922 19.3724 3.66709 20.568 4.56428 21.284C5.46146 22 6.78474 22 9.43128 22H15.2406C17.8871 22 19.2104 22 20.1076 21.284C21.0048 20.568 21.1797 19.3724 21.5295 16.9811L21.9524 14.0896C22.3984 11.0404 22.6215 9.51569 21.6736 8.52887C20.7258 7.54204 19.0384 7.54204 15.6635 7.54204ZM14.9171 15.7942C15.4755 15.4481 15.4755 14.5519 14.9171 14.2058L11.5456 12.1156C11.0029 11.7792 10.3359 12.2171 10.3359 12.9099V17.0901C10.3359 17.7829 11.0029 18.2208 11.5456 17.8844L14.9171 15.7942Z"
					fill="#A1A1AA"
				/>
			</svg>
		),
		link: "/videos/create",
	},
];

const Modal = ({onClose = () => {}}) => {
	const [selected, setSelect] = useState<string | null>(null);

	return (
		<div className="fixed w-full h-full bg-[rgba(0,0,0,.2)] top-0 left-0 z-[99999] flex flex-col justify-center items-center">
			<div className="w-full max-w-[560px] bg-white p-6 rounded-3xl flex flex-col gap-6 z-10">
				<div className="flex items-center">
					<div className="flex-1 heading-medium">Создать публикацию</div>
					<button onClick={onClose} className="bg-background-tertiary p-2.5 rounded-xl">
						<svg
							width="24"
							height="24"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								fill-rule="evenodd"
								clip-rule="evenodd"
								d="M5.46967 5.46967C5.76256 5.17678 6.23744 5.17678 6.53033 5.46967L12 10.9393L17.4697 5.46967C17.7626 5.17678 18.2374 5.17678 18.5303 5.46967C18.8232 5.76256 18.8232 6.23744 18.5303 6.53033L13.0607 12L18.5303 17.4697C18.8232 17.7626 18.8232 18.2374 18.5303 18.5303C18.2374 18.8232 17.7626 18.8232 17.4697 18.5303L12 13.0607L6.53033 18.5303C6.23744 18.8232 5.76256 18.8232 5.46967 18.5303C5.17678 18.2374 5.17678 17.7626 5.46967 17.4697L10.9393 12L5.46967 6.53033C5.17678 6.23744 5.17678 5.76256 5.46967 5.46967Z"
								fill="#09090B"
							/>
						</svg>
					</button>
				</div>
				<div className="flex flex-row gap-2">
					{createButtons.map(({ icon, text, link }) => {
						return (
							<button
								className={`flex-1 py-8 bg-background-tertiary flex flex-col justify-center items-center gap-2 ${
									selected === link ? "border-content-green" : ""
								} border rounded-2xl`}
								onClick={() => setSelect(link)}
							>
								{icon}
								<div className="paragraph-base font-medium">{text}</div>
							</button>
						);
					})}
				</div>
            <div className="flex gap-2">
               <Button onClick={onClose} variant={'secondary'}>Отменить</Button>
               <Button disabled={!selected}>Продолжить</Button>
            </div>
			</div>
			<div onClick={onClose} className="absolute w-full h-full cursor-pointer"></div>
		</div>
	);
};

export default Modal;
