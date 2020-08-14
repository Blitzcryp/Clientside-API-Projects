# Clientside-API-Projects

This is an <span style='color: red'>**ongoing**</span> list of my backend and frontend projects using **Javascript**, **MySQL** and **PHP**
Repository contains the code and API links to make the following projects and extend them: 
* ISS Tracker 
  * Using ISS GeoLocation API
  * Using Leafy
* Button-Press cat fact generator
  * Free CatFact API
* Custom covid data grapher
  * WHO .CSV Data
  * Chart.js
* Weather data table
  * openweather API
* iss_track_and_save_data
  * Does all the things **ISS Tracker** is doing
  * Saves to **iss_data** database table information about latitude and longitude
  * Maps the lat/long data on the map as a 'prediction' path for ISS after hours of data collection 
  * Note: ISS Will sometimes change its course without any notice so it's hard to be accurate about those predictions
* weather_app_auto_update
  * Makes use of 2 API's (Open weather data and MZN Geolocation)
  * Every 30s will get your lat/long data (if you allow it) and it will provide weather data for where you are **Now**
  * It provides a link to google maps to check if the location is accurate
  * Note: I am experiencing a bug that if 2 users use the app, the 2nd user will not get his geolocation but the 1st user's geolocation
