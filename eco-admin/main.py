import streamlit as st
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from datetime import datetime, timedelta

def generate_extended_test_data(num_organizations=50, months=12):
    np.random.seed(42)
    start_date = datetime.now() - timedelta(days=30*months)
    
    event_types = ['Конференция', 'Семинар', 'Воркшоп', 'Вебинар', 'Мастер-класс']
    satisfaction_criteria = ['Содержание', 'Организация', 'Спикеры', 'Место проведения', 'Networking']
    locations = ['Москва', 'Санкт-Петербург', 'Казань', 'Новосибирск', 'Екатеринбург', 'Онлайн']
    
    organizations = []
    for i in range(num_organizations):
        org_name = f"Организация {i+1}"
        prev_satisfaction = {criteria: np.random.uniform(3.5, 4.5) for criteria in satisfaction_criteria}
        for month in range(months):
            date = start_date + timedelta(days=30*month)
            num_events = np.random.randint(1, 10)
            
            for _ in range(num_events):
                event_type = np.random.choice(event_types)
                event_name = f"{event_type} по {np.random.choice(['маркетингу', 'продажам', 'IT', 'финансам', 'HR'])}"
                location = np.random.choice(locations)
                participants = np.random.randint(10, 100)
                positive_reviews = np.random.randint(0, participants)
                negative_reviews = np.random.randint(0, participants - positive_reviews)
                neutral_reviews = participants - positive_reviews - negative_reviews
                
                satisfaction = {criteria: min(5, max(1, prev_satisfaction[criteria] + np.random.normal(0, 0.2))) 
                                for criteria in satisfaction_criteria}
                
                avg_rating = (positive_reviews * 5 + neutral_reviews * 3 + negative_reviews * 1) / participants
                
                reviews = [
                    "Отличное мероприятие!",
                    "Было очень познавательно.",
                    "Хотелось бы больше практических примеров.",
                    "Спикеры были на высоте.",
                    "Организация могла быть лучше.",
                    "Обязательно приду еще раз!"
                ]
                
                organizations.append({
                    "name": org_name,
                    "event_name": event_name,
                    "date": date,
                    "location": location,
                    "avg_rating": avg_rating,
                    "reviews": np.random.choice(reviews, size=3, replace=False),
                    "event_type": event_type,
                    "participants": participants,
                    "positive_reviews": positive_reviews,
                    "negative_reviews": negative_reviews,
                    "neutral_reviews": neutral_reviews,
                    "num_events": num_events,
                    **{f"satisfaction_{criteria}": satisfaction[criteria] for criteria in satisfaction_criteria},
                    **{f"prev_satisfaction_{criteria}": prev_satisfaction[criteria] for criteria in satisfaction_criteria}
                })
                
                prev_satisfaction = satisfaction
    
    return pd.DataFrame(organizations)
if __name__ == "__main__":
 df = generate_extended_test_data()

 st.set_page_config(page_title="Статистика организаций и мероприятий", layout="wide")

 page = st.sidebar.radio("Выберите страницу", ["Общая статистика", "Детализация по организациям", "Сравнительный дашборд", "Таблица мероприятий"])

 if page == "Общая статистика":
    st.title("Дашборд статистики организаций и мероприятий")

    st.header("1. Количество организаций")
    num_organizations = df['name'].nunique()
    st.metric("Общее количество зарегистрированных организаций", num_organizations)

    st.header("2. Количество мероприятий")
    total_events = df.groupby('name')['num_events'].first().sum()
    st.metric("Общее количество проведенных мероприятий", total_events)

    st.header("3. Средний рейтинг мероприятий")
    df['avg_rating'] = (df['positive_reviews'] * 5 + df['neutral_reviews'] * 3) / (df['positive_reviews'] + df['negative_reviews'] + df['neutral_reviews'])
    avg_rating = round(df['avg_rating'].mean(), 2)
    st.metric("Средняя оценка мероприятий", avg_rating)

    st.header("4. Лидеры по количеству мероприятий")
    top_events = df.groupby('name')['num_events'].sum().nlargest(5)
    st.bar_chart(top_events)

    st.header("5. Лидеры по вовлечённости")
    top_engagement = df.groupby('name')['participants'].sum().nlargest(5)
    st.bar_chart(top_engagement)

    st.header("6. Лидеры по качеству мероприятий")
    top_quality = df.groupby('name')['avg_rating'].mean().nlargest(5)
    st.bar_chart(top_quality)

 elif page == "Детализация по организациям":
    st.title("Детализация по организациям")

    organizations = sorted(df['name'].unique())
    selected_org = st.selectbox("Выберите организацию", organizations)

    org_data = df[df['name'] == selected_org]

    st.header("1. Динамика роста числа мероприятий")
    events_over_time = org_data.groupby('date')['num_events'].first().cumsum()
    st.line_chart(events_over_time)

    st.header("2. Прирост участников по времени")
    participants_over_time = org_data.set_index('date')['participants'].resample('M').sum()
    st.line_chart(participants_over_time)

    total_reviews = org_data['positive_reviews'].sum() + org_data['negative_reviews'].sum() + org_data['neutral_reviews'].sum()
    st.header("3. Количество всех отзывов")
    st.metric("Всего отзывов", total_reviews)

    positive_percentage = (org_data['positive_reviews'].sum() / total_reviews) * 100
    st.header("4. Процент всех положительных отзывов")
    st.metric("Положительные отзывы", f"{positive_percentage:.2f}%")

    negative_percentage = (org_data['negative_reviews'].sum() / total_reviews) * 100
    st.header("5. Процент всех негативных отзывов")
    st.metric("Негативные отзывы", f"{negative_percentage:.2f}%")

    st.header("Распределение отзывов")
    reviews_data = [
        org_data['positive_reviews'].sum(),
        org_data['neutral_reviews'].sum(),
        org_data['negative_reviews'].sum()
    ]
    reviews_labels = ['Положительные', 'Нейтральные', 'Негативные']
    fig, ax = plt.subplots()
    ax.pie(reviews_data, labels=reviews_labels, autopct='%1.1f%%', startangle=90)
    ax.axis('equal')
    st.pyplot(fig)
 elif page == "Сравнительный дашборд":
    st.title("Сравнительный дашборд")

    organizations = sorted(df['name'].unique())
    selected_org = st.selectbox("Выберите организацию", organizations)

    org_data = df[df['name'] == selected_org]

    st.header("1. Сравнение мероприятий")
    event_type = st.selectbox("Выберите тип мероприятия", df['event_type'].unique())
    
    org_events = org_data[org_data['event_type'] == event_type]
    all_events = df[df['event_type'] == event_type]
    
    col1, col2, col3 = st.columns(3)
    with col1:
        st.metric("Среднее кол-во участников (организация)", int(org_events['participants'].mean()))
    with col2:
        st.metric("Среднее кол-во участников (все)", int(all_events['participants'].mean()))
    with col3:
        avg_rating_org = ((org_events['positive_reviews'] * 5 + org_events['neutral_reviews'] * 3) / 
                          (org_events['positive_reviews'] + org_events['negative_reviews'] + org_events['neutral_reviews'])).mean()
        avg_rating_all = ((all_events['positive_reviews'] * 5 + all_events['neutral_reviews'] * 3) / 
                          (all_events['positive_reviews'] + all_events['negative_reviews'] + all_events['neutral_reviews'])).mean()
        st.metric("Средний рейтинг (организация / все)", f"{avg_rating_org:.2f} / {avg_rating_all:.2f}")

    st.header("2. Эффективность привлечения участников")
    avg_participants_org = org_data['participants'].mean()
    avg_participants_all = df['participants'].mean()
    efficiency = (avg_participants_org - avg_participants_all) / avg_participants_all * 100
    st.metric("Эффективность привлечения участников", f"{efficiency:.2f}%", 
              delta=f"{efficiency:.2f}%" if efficiency > 0 else f"{efficiency:.2f}%")

    st.header("3. Ухудшившиеся показатели обратной связи")
    satisfaction_criteria = [col for col in org_data.columns if col.startswith("satisfaction_")]
    prev_satisfaction_criteria = [col for col in org_data.columns if col.startswith("prev_satisfaction_")]
    
    worsened_criteria = []
    for curr, prev in zip(satisfaction_criteria, prev_satisfaction_criteria):
        if org_data[curr].iloc[-1] < org_data[prev].iloc[-1]:
            worsened_criteria.append(curr.replace("satisfaction_", ""))
    
    if worsened_criteria:
        st.write("Критерии, требующие внимания:")
        for criteria in worsened_criteria:
            st.write(f"- {criteria}")
    else:
        st.write("Нет ухудшившихся показателей")

    st.header("4. Положительные изменения")
    improved_criteria = []
    for curr, prev in zip(satisfaction_criteria, prev_satisfaction_criteria):
        if org_data[curr].iloc[-1] > org_data[prev].iloc[-1]:
            improved_criteria.append(curr.replace("satisfaction_", ""))
    
    if improved_criteria:
        st.write("Улучшенные критерии:")
        for criteria in improved_criteria:
            st.write(f"- {criteria}")
    else:
        st.write("Нет значительных улучшений")

    st.header("5. Удовлетворенность по ключевым критериям")
    satisfaction_data = org_data[[col for col in org_data.columns if col.startswith("satisfaction_")]].mean()
    satisfaction_data = satisfaction_data.rename(index=lambda x: x.replace("satisfaction_", ""))
    
    fig, ax = plt.subplots(figsize=(10, 6))
    sns.barplot(x=satisfaction_data.index, y=satisfaction_data.values, ax=ax)
    ax.set_ylim(0, 5)
    ax.set_title("Средняя удовлетворенность по критериям")
    ax.set_xlabel("Критерии")
    ax.set_ylabel("Оценка")
    plt.xticks(rotation=45)
    st.pyplot(fig)
 elif page == "Таблица мероприятий":
    st.title("Таблица мероприятий")

    organizations = sorted(df['name'].unique())
    selected_org = st.selectbox("Выберите организацию", organizations)

    org_data = df[df['name'] == selected_org]

    table_data = org_data[['event_name', 'date', 'location', 'avg_rating', 'reviews', 'num_events']]
    
    table_data['date'] = pd.to_datetime(table_data['date']).dt.date
    table_data['avg_rating'] = table_data['avg_rating'].round(2)
    table_data['reviews'] = table_data['reviews'].apply(lambda x: '\n'.join(x))

    st.dataframe(table_data, height=400)

    st.subheader("Фильтры")
    
    min_date = table_data['date'].min()
    max_date = table_data['date'].max()
    date_range = st.date_input("Выберите диапазон дат", 
                               [min_date, max_date],
                               min_value=min_date,
                               max_value=max_date)
    
    locations = ['Все'] + sorted(table_data['location'].unique())
    selected_location = st.selectbox("Выберите местоположение", locations)

    min_rating, max_rating = st.slider("Выберите диапазон средней оценки", 
                                       float(table_data['avg_rating'].min()), 
                                       float(table_data['avg_rating'].max()), 
                                       (float(table_data['avg_rating'].min()), float(table_data['avg_rating'].max())))

    filtered_data = table_data[
        (table_data['date'] >= date_range[0]) &
        (table_data['date'] <= date_range[1]) &
        (table_data['avg_rating'] >= min_rating) &
        (table_data['avg_rating'] <= max_rating)
    ]

    if selected_location != 'Все':
        filtered_data = filtered_data[filtered_data['location'] == selected_location]

    st.subheader("Отфильтрованные результаты")
    st.dataframe(filtered_data, height=400)
 st.header("Сырые данные")
 st.dataframe(df)

