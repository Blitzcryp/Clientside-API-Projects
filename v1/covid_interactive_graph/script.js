async function get_covid_api_data(country, x_growth_type) {
    // x_growth_type can be Linear (lin) or Logarithmic (log)
    x_growth_type = x_growth_type.val();
    var first_date = '';
    var second_date = '';

    var url1 = 'https://api.covid19api.com/country/';
    var url2 = '/status/confirmed?';

    const apiData = await fetch(url1 + country + url2);
    const jsonData = await apiData.json();

    var xs = [];
    var ys = [];
    switch (x_growth_type) {
        case 'log':
            jsonData.forEach(function(element) {
                xs.push(Math.log(element['Cases']));
                ys.push(element['Date'].substr(0, 10));
            });
            break;

        default:
            jsonData.forEach(function(element) {
                xs.push(element['Cases']);
                ys.push(element['Date'].substr(0, 10));
            });
    }

    return { ys, xs };
}