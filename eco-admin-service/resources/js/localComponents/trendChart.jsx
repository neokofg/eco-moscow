// resources/js/Pages/TrendChart.jsx
import React from 'react';
import Chart from 'react-apexcharts';

const TrendChart = ({ title, labels, data }) => {
    const options = {
        chart: {
            id: 'trend-chart'
        },
        xaxis: {
            categories: labels
        },
        title: {
            text: title
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                xaxis: {
                    labels: {
                        rotate: -45
                    }
                }
            }
        }]
    };

    const series = [{
        name: title,
        data: data
    }];

    return (
        <div className="chart-container">
            <Chart
                options={options}
                series={series}
                type="line"
                width="500"
            />
        </div>
    );
};

export default TrendChart;
