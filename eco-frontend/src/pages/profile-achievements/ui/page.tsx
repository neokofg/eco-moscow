import { sofiaSansCondensed } from "@/src/app/fonts";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/src/shared/ui/tabs";
import { AchievementCard } from "@/src/widgets/achievement-card";
import { FC } from "react";

export const ProfileAchievementsPage: FC = () => {
  return (
    <div>
      <h1
        className="font-bold text-[30px] leading-9 text-content-primary uppercase"
        style={sofiaSansCondensed.style}
      >
        достижения
      </h1>
      <Tabs defaultValue="all" className="mt-6">
        <TabsList>
          <TabsTrigger value="all">Все</TabsTrigger>
          <TabsTrigger value="my">Полученные</TabsTrigger>
        </TabsList>
        <TabsContent className="flex gap-4" value="my">
          <AchievementCard
            img="/active_achievement_bg.png"
            title="Свой человек"
            description="Вы заполнили профиль на 100%"
            procent={4}
          />
        </TabsContent>
        <TabsContent className="flex gap-4" value="all">
          <AchievementCard
            img="/noactive_achievement_bg.png"
            title="Свой человек"
            description="Вы заполнили профиль на 100%"
            procent={4}
          />
          <AchievementCard
            img="/noactive_achievement_bg.png"
            title="Свой человек"
            description="Вы заполнили профиль на 100%"
            procent={4}
          />
          <AchievementCard
            img="/noactive_achievement_bg.png"
            title="Свой человек"
            description="Вы заполнили профиль на 100%"
            procent={4}
          />
          <AchievementCard
            img="/active_achievement_bg.png"
            title="Свой человек"
            description="Вы заполнили профиль на 100%"
            procent={4}
          />
        </TabsContent>
      </Tabs>
    </div>
  );
};
