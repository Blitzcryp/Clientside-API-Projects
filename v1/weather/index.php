<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="weather.js">
    </script>
</head>
<body>
<h1><span class="blue">&lt;</span>Weather<span class="blue">&gt;</span> <span class="yellow">App</pan></h1>
    <h2 id="time"></h2>
    <table class="container"id="weather">
        <tr><th>City</th><th>Temperature</th><th>Humidity</th><th>Pressure</th></tr>
        <tbody></tbody>
    </table>

    <p>&copy; Coman Cosmin-Alexandru</p>
    <script>
    goThroughCities();
    </script>
</body>
</html>