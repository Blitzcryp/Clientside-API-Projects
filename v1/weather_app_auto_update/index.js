var alink = true;
async function get_api_weather_data(lat, lng) {
    var weather_to_display_data = [];

    var api_url = 'https://api.openweathermap.org/data/2.5/weather?';
    var appid = '&appid=1d99f25a96f83b0a6f45e9b886f0c7ea';
    var units = '&units=metric';
    var data = await fetch(api_url + 'lat=' + lat + '&lon=' + lng + units + appid);
    var jsondata = await data.json();

    const names = ['feels like', 'humidity', 'pressure', 'temp', 'max temp', 'min temp'];
    weather_to_display_data.push(jsondata['main']['feels_like']);
    weather_to_display_data.push(jsondata['main']['humidity']);
    weather_to_display_data.push(jsondata['main']['pressure']);
    weather_to_display_data.push(jsondata['main']['temp']);
    weather_to_display_data.push(jsondata['main']['temp_max']);
    weather_to_display_data.push(jsondata['main']['temp_min']);

    if (alink) {
        $('body').append("<h2><a href='https://www.google.com/maps/@" + jsondata['coord']['lon'] + "," + jsondata['coord']['lat'] + ",12z'>Is this your location</a></h2>");
        alink = false;
    }
    create_and_append_row(weather_to_display_data, names);
}

get_api_geolocation_data();
setInterval(get_api_geolocation_data, 1000 * 10);

function get_api_geolocation_data() {
    var geo = navigator.geolocation;


    geo.getCurrentPosition(function(position) {
        get_api_weather_data(position['coords']['latitude'], position['coords']['longitude']);
    });
}

function create_and_append_row(data, names) { //! array data
    // feels like - humidity - pressure - temp - temp_max - temp_min
    console.log('Data updated');
    var i = 0;
    data[0] += ' C';
    data[1] += ' %';
    data[2] += ' P';
    data[3] += ' C';
    data[4] += ' C';
    data[5] += ' C';
    for (var i = 0; i < data.length; i++) {
        $('#' + i).html(data[i]);
    }
}