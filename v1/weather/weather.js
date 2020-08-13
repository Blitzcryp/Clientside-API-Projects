var cityData = {};
function setup(cityName){
    var url = 'http://api.openweathermap.org/data/2.5/weather?q=';
    var appId =  '&appId=1d99f25a96f83b0a6f45e9b886f0c7ea';
    var units = '&units=metric';
    $.getJSON(url+cityName+appId+units, getData);
}

function getData(data){
    /*
    cityData[data['name']] = { 
        temp: data['main']['temp'], 
        pressure: data['main']['pressure'],
        humidity: data['main']['humidity']
    };
    */
    var tr = document.createElement('tr');
    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');

    td4.innerHTML = data['main']['pressure'] + ' P';
    td3.innerHTML = data['main']['humidity'];
    td2.innerHTML = data['main']['temp'] + ' C';
    td1.innerHTML = data['name'];
    
    
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    $('#weather').append(tr);
}

function goThroughCities(){
    var cities = ['Bacau', 'Constanta', 'Bucharest', 'Cluj-Napoca', 'Timisoara', 'Iasi', 'Craiova', 'Brasov', 'Galati', 'Ploiesti', 'Oradea', 'Arad', 'Pitesti', 'Baia Mare', 'Buzau', 'Botosani', 'Satu Mare', 'Suceava', 'Tulcea'];
    cities.forEach(element => setup(element));
    console.log(Object.keys(cityData));
    console.log(cityData);
}

$(document).ready(function(){

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    $("#time").append(today);
});