import { News } from "./News";
import { Notes } from "./Notes";
import { Videos } from "./Videos";

const ProfileTabs = ({
  selected,
  user_id,
}: {
  selected: "notes" | "news" | "videos";
  user_id: string;
}) => {
  if (selected === "notes") return <Notes user_id={user_id} />;
  if (selected === "news") return <News user_id={user_id} />;
  if (selected === "videos") return <Videos user_id={user_id} />;
};

export default ProfileTabs;
