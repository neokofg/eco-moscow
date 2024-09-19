// resources/js/Pages/CategoryChart.jsx
import React from 'react';
import Chart from 'react-apexcharts';

const CategoryChart = ({ title, categories, counts }) => {
    const options = {
        labels: categories.map(cat => `Категория ${cat}`), // Замените на реальные названия категорий, если доступны
        title: {
            text: title
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    const series = counts;

    return (
        <div className="chart-container">
            <Chart
                options={options}
                series={series}
                type="pie"
                width="500"
            />
        </div>
    );
};

export default CategoryChart;
