import { IconTextCard } from "./cards";
import { H1, H2, TextBase } from "./formatting";
import { Star } from "./star";

export const AboutPage = () => {
  return (
    <div className="self-center w-full max-w-[992px] py-8 lg:px-0 px-4 flex flex-col gap-24">
      <div className="flex flex-col gap-8">
        <img src="/about_illustration.png" className="self-center" />
        <H1 className="text-center">
          Эко — портал с тысячами полезных материалов от активистов и просто
          неравнодушных людей
        </H1>
        <TextBase className="text-center">
          Цель – помочь любому человеку легко и быстро начать вести экологичный
          образ жизни и вовлекать в него окружающих, объединяться с
          единомышленниками для коллективных действий по сохранению природы и
          улучшению качества окружающей среды. Все материалы просты, понятны и
          красочно оформлены.
        </TextBase>
      </div>
      <div className="flex flex-col gap-8">
        <H1 className="text-center">В чем ЭКО-польза нашего портала</H1>
        <div className="grid gap-4 grid-cols-1 sm:grid-cols-2">
          <IconTextCard
            icon={<img src="/icons/about/user_rounded.svg" />}
            text={
              "Все больше людей обеспокоены экологическими проблемами, но часто не знают, с чего начать, чтобы внести вклад в сохранение природы и создание здоровых условий для жизни нашего и будущих поколений."
            }
          />
          <IconTextCard
            icon={<img src="/icons/about/stars.svg" />}
            text={
              "Для многих экологичные действия ограничиваются уборкой мусора, посадкой деревьев, экономией воды и электроэнергии. Большинство людей не знают о том, какие ещё действия могут помочь в снижении негативного влияния на окружающую среду и сбережении ресурсов планеты."
            }
          />
          <IconTextCard
            icon={<img src="/icons/about/case.svg" />}
            text={
              "Эко предлагает пошаговые инструкции и кейсы, которые может изучить и повторить любой человек. Новые знания и пользу для себя найдут как люди, начинающие свой экологичный путь, так и те, кто уже давно погружен в вопросы сохранения природы."
            }
          />
          <IconTextCard
            icon={<img src="/icons/about/filters.svg" />}
            text={
              "На данный момент на платформе зарегистрированы уже более 100 тысяч человек. Посты участников активностей легко найти по хештегу #эковики в социальной сети ВКонтакте."
            }
          />
        </div>
      </div>
      <div className="bg-content-green rounded-3xl overflow-hidden relative p-6">
        <div className="max-w-[496px] z-10">
          <H2 className="text-white">
            Эко – живая, динамично развивающаяся платформа, непрерывно
            пополняющаяся материалами и инструкциями.
          </H2>
          <TextBase className="text-white">
            Присоединяйтесь! Вместе мы сделаем много полезного для природы и
            человека!
          </TextBase>
        </div>
        <Star className="absolute right-0 bottom-0" />
        <div className="hidden lg:block absolute right-14 -bottom-12">
          <img src="/icons/about/leaf_wave.png" />
        </div>
      </div>
    </div>
  );
};
