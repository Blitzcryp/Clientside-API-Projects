async function generate_chart(country, growth_type) {
    const api_data = await get_covid_api_data(country, growth_type);
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: api_data.ys,
            datasets: [{
                label: '# of Confirmed Cases in ' + document.getElementById('cty').value,
                data: api_data.xs,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 0.5
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}