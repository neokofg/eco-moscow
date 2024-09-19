// resources/js/Pages/Dashboard.jsx
import React from 'react';
import { usePage } from '@inertiajs/react';
import MainLayout from '@/layouts/mainLayout.jsx';
import Chart from 'react-apexcharts';

const EventsPage = () => {
    const { stats } = usePage().props;

    const generateCategoryChart = (data, title) => {
        const categories = data.map(item => `Категория ${item.category_id}`);
        const counts = data.map(item => item.total);

        return {
            options: {
                labels: categories,
                title: {
                    text: title
                },
                legend: {
                    position: 'bottom'
                }
            },
            series: counts
        };
    };

    const generateTrendChart = (data, title) => {
        const labels = data.map(item => `${item.year}-${String(item.month).padStart(2, '0')}`);
        const counts = data.map(item => item.total);

        return {
            options: {
                chart: {
                    id: `${title}-trend`,
                    toolbar: {
                        show: false
                    }
                },
                xaxis: {
                    categories: labels,
                    title: {
                        text: 'Дата'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Количество'
                    }
                },
                title: {
                    text: title
                },
                tooltip: {
                    x: {
                        format: 'yyyy-MM'
                    }
                }
            },
            series: [{
                name: title,
                data: counts
            }]
        };
    };

    const eventCategoryChart = generateCategoryChart(stats.events_by_category, 'Мероприятия по категориям');
    const competitionCategoryChart = generateCategoryChart(stats.competitions_by_category, 'Соревнования по категориям');
    const marathonCategoryChart = generateCategoryChart(stats.marathons_by_category, 'Марафоны по категориям');
    const promotionCategoryChart = generateCategoryChart(stats.promotions_by_category, 'Акции по категориям');
    const volunteeringCategoryChart = generateCategoryChart(stats.volunteering_by_category, 'Волонтёрство по категориям');

    const eventTrendChart = generateTrendChart(stats.events_trend, 'Мероприятия');
    const competitionTrendChart = generateTrendChart(stats.competitions_trend, 'Соревнования');
    const marathonTrendChart = generateTrendChart(stats.marathons_trend, 'Марафоны');
    const promotionTrendChart = generateTrendChart(stats.promotions_trend, 'Акции');
    const volunteeringTrendChart = generateTrendChart(stats.volunteering_trend, 'Волонтёрство');

    return (
        <div className="p-4">
            <h1 className="text-2xl font-bold mb-6">Аналитика Мероприятий</h1>

            {/* Общие Метрики */}
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div className="bg-black shadow rounded p-4">
                    <h2 className="text-lg font-semibold">Всего Мероприятий</h2>
                    <p className="text-3xl">{stats.total_events}</p>
                </div>
                <div className="bg-black shadow rounded p-4">
                    <h2 className="text-lg font-semibold">Всего Соревнований</h2>
                    <p className="text-3xl">{stats.total_competitions}</p>
                </div>
                <div className="bg-black shadow rounded p-4">
                    <h2 className="text-lg font-semibold">Всего Марафонов</h2>
                    <p className="text-3xl">{stats.total_marathons}</p>
                </div>
                <div className="bg-black shadow rounded p-4">
                    <h2 className="text-lg font-semibold">Всего Акций</h2>
                    <p className="text-3xl">{stats.total_promotions}</p>
                </div>
                <div className="bg-black shadow rounded p-4">
                    <h2 className="text-lg font-semibold">Всего Волонтёрств</h2>
                    <p className="text-3xl">{stats.total_volunteering}</p>
                </div>
            </div>

            {/* Графики по Категориям */}
            <div className="mb-8">
                <h2 className="text-xl font-semibold mb-4">Распределение по Категориям</h2>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={eventCategoryChart.options}
                            series={eventCategoryChart.series}
                            type="pie"
                            width="100%"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={competitionCategoryChart.options}
                            series={competitionCategoryChart.series}
                            type="pie"
                            width="100%"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={marathonCategoryChart.options}
                            series={marathonCategoryChart.series}
                            type="pie"
                            width="100%"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={promotionCategoryChart.options}
                            series={promotionCategoryChart.series}
                            type="pie"
                            width="100%"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={volunteeringCategoryChart.options}
                            series={volunteeringCategoryChart.series}
                            type="pie"
                            width="100%"
                        />
                    </div>
                </div>
            </div>

            {/* Графики Трендов */}
            <div>
                <h2 className="text-xl font-semibold mb-4">Тренды по Времени</h2>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={eventTrendChart.options}
                            series={eventTrendChart.series}
                            type="line"
                            height="300"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={competitionTrendChart.options}
                            series={competitionTrendChart.series}
                            type="line"
                            height="300"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={marathonTrendChart.options}
                            series={marathonTrendChart.series}
                            type="line"
                            height="300"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={promotionTrendChart.options}
                            series={promotionTrendChart.series}
                            type="line"
                            height="300"
                        />
                    </div>
                    <div className="bg-white shadow rounded p-4">
                        <Chart
                            options={volunteeringTrendChart.options}
                            series={volunteeringTrendChart.series}
                            type="line"
                            height="300"
                        />
                    </div>
                </div>
            </div>
        </div>
    );
};

EventsPage.layout = page => <MainLayout title="Аналитика Дашборда" children={page}/>;

export default EventsPage;
