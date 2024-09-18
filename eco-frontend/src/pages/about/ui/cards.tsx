import { TextBase } from "./formatting";

type IconTextCardProps = {
	icon: React.ReactNode;
	text: String;
};

export const IconTextCard = ({ icon, text }: IconTextCardProps) => {
	return (
		<div className="bg-white rounded-3xl p-8 flex flex-col gap-4">
			<div className="bg-background-green rounded-2xl p-4 self-start">{icon}</div>
			<TextBase>{text}</TextBase>
		</div>
	);
};
