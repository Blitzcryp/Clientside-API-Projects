# Clientside-API-Projects

This is an <span style='color: red'>**ongoing**</span> list of my backend and frontend projects using **Javascript**, **MySQL** and **PHP**
Repository contains the code and API links to make the following projects and extend them: 
* <a href="https://github.com/Blitzcryp/Clientside-API-Projects/tree/master/v1/ISS">ISS Tracker 🛰️🛰️</a>
  * Using ISS GeoLocation API
  * Using Leafy
* <a href="https://github.com/Blitzcryp/Clientside-API-Projects/tree/master/v1/catFacts">Button-Press cat fact generator🐈🐈</a>
  * Free CatFact API
* <a href="https://github.com/Blitzcryp/Clientside-API-Projects/tree/master/v1/graph">Custom covid data grapher 📈📈</a>
  * WHO .CSV Data
  * Chart.js
* <a href="https://github.com/Blitzcryp/Clientside-API-Projects/tree/master/v1/weather">Weather data table 🌡️☁️☁️</a>
  * openweather API
* <a href="https://github.com/Blitzcryp/Clientside-API-Projects/tree/master/v1/iss_track_and_save_data">iss_track_and_save_data 🛰️🛰️ ⚙️</a>
  * Does all the things **ISS Tracker** is doing
  * Saves to **iss_data** database table information about latitude and longitude
  * Maps the lat/long data on the map as a 'prediction' path for ISS after hours of data collection 
  * Note: ISS Will sometimes change its course without any notice so it's hard to be accurate about those predictions
* <a href="https://github.com/Blitzcryp/Clientside-API-Projects/tree/master/v1/weather_app_auto_update"> weather_app_auto_update 🌡️☁️☁️</a>
  * Makes use of 2 API's (Open weather data and MZN Geolocation)
  * Every 30s will get your lat/long data (if you allow it) and it will provide weather data for where you are **Now**
  * It provides a link to google maps to check if the location is accurate
  * Note: I am experiencing a bug that if 2 users use the app, the 2nd user will not get his geolocation but the 1st user's geolocation
