export const AboutPage = () => {
  return (
    <div className="self-center w-full max-w-[992px] py-8 lg:px-0 px-4 flex flex-col gap-24">
      <div className="flex flex-col gap-8">
        <img src="/about_illustration.png" className="self-center" />
        <h3 className="text-center">
          Эко — портал с тысячами полезных материалов от активистов и просто
          неравнодушных людей
        </h3>
        <p className="text-center">
          Цель – помочь любому человеку легко и быстро начать вести экологичный
          образ жизни и вовлекать в него окружающих, объединяться с
          единомышленниками для коллективных действий по сохранению природы и
          улучшению качества окружающей среды. Все материалы просты, понятны и
          красочно оформлены.
        </p>
      </div>
      <div className="flex flex-col gap-8">
        <h3 className="text-center">В чем ЭКО-польза нашего портала</h3>
        <div className="grid gap-4 grid-cols-1 sm:grid-cols-2">
          <div className="bg-white rounded-3xl p-8 flex flex-col gap-4">
            <div className="bg-background-green rounded-2xl p-4 self-start">
              <img src="/icons/about/user_rounded.svg" />
            </div>
            <p>
              Все больше людей обеспокоены экологическими проблемами, но часто
              не знают, с чего начать, чтобы внести вклад в сохранение природы и
              создание здоровых условий для жизни нашего и будущих поколений.
            </p>
          </div>
          <div className="bg-white rounded-3xl p-8 flex flex-col gap-4">
            <div className="bg-background-green rounded-2xl p-4 self-start">
              <img src="/icons/about/stars.svg" />
            </div>
            <p>
              Для многих экологичные действия ограничиваются уборкой мусора,
              посадкой деревьев, экономией воды и электроэнергии. Большинство
              людей не знают о том, какие ещё действия могут помочь в снижении
              негативного влияния на окружающую среду и сбережении ресурсов
              планеты.
            </p>
          </div>
          <div className="bg-white rounded-3xl p-8 flex flex-col gap-4">
            <div className="bg-background-green rounded-2xl p-4 self-start">
              <img src="/icons/about/case.svg" />
            </div>
            <p>
              Эко предлагает пошаговые инструкции и кейсы, которые может изучить
              и повторить любой человек. Новые знания и пользу для себя найдут
              как люди, начинающие свой экологичный путь, так и те, кто уже
              давно погружен в вопросы сохранения природы.
            </p>
          </div>
          <div className="bg-white rounded-3xl p-8 flex flex-col gap-4">
            <div className="bg-background-green rounded-2xl p-4 self-start">
              <img src="/icons/about/filters.svg" />
            </div>
            <p>
              На данный момент на платформе зарегистрированы уже более 100 тысяч
              человек. Посты участников активностей легко найти по хештегу
              #эковики в социальной сети ВКонтакте.
            </p>
          </div>
        </div>
      </div>
      <div className="bg-content-green rounded-3xl overflow-hidden relative p-6">
        <div className="max-w-[497px] z-10">
          <h5 className="w-full text-white">
            Эко – живая, динамично развивающаяся платформа, непрерывно
            пополняющаяся материалами и инструкциями.
          </h5>
          <p className="text-white">
            Присоединяйтесь! Вместе мы сделаем много полезного для природы и
            человека!
          </p>
        </div>
        <svg
          width="285"
          height="184"
          viewBox="0 0 285 184"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          className="absolute right-0 bottom-0"
        >
          <path
            opacity="0.24"
            d="M181 0C185.253 35.6942 232.677 45.1273 250.266 13.7778C240.536 48.3826 280.739 75.2458 308.986 53.0137C286.754 81.2608 313.617 121.464 348.222 111.734C316.873 129.323 326.306 176.747 362 181C326.306 185.253 316.873 232.677 348.222 250.266C313.617 240.536 286.754 280.739 308.986 308.986C280.739 286.754 240.536 313.617 250.266 348.222C232.677 316.873 185.253 326.306 181 362C176.747 326.306 129.323 316.873 111.734 348.222C121.464 313.617 81.2608 286.754 53.0137 308.986C75.2458 280.739 48.3826 240.536 13.7778 250.266C45.1273 232.677 35.6942 185.253 0 181C35.6942 176.747 45.1273 129.323 13.7778 111.734C48.3826 121.464 75.2458 81.2608 53.0137 53.0137C81.2608 75.2458 121.464 48.3826 111.734 13.7778C129.323 45.1273 176.747 35.6942 181 0Z"
            fill="white"
          />
        </svg>
        <div className="hidden lg:block absolute right-14 -bottom-12">
          <img src="/icons/about/leaf_wave.png" />
        </div>
      </div>
    </div>
  );
};
