
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
</head>
<body>
    <div id="mapid" style="height: 90vh;"></div>
    <script>
        var greenIcon = L.icon({
            iconUrl: "https://cdn1.iconfinder.com/data/icons/space-butterscotch-vol-2/256/Orbital_Station-512.png",
            iconSize:     [50, 32], // size of the icon
            iconAnchor:   [25, 16], // point of the icon which will correspond to marker's location
            popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
        });
        var mymap = L.map('mapid').setView([51.505, -0.09], 1);
        const maker = L.marker([0,0], {icon: greenIcon}).addTo(mymap);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiY29tYW5jIiwiYSI6ImNrZHNsNjAyYzFwY28ycm1xdzBqZ2g4cGgifQ.0dR2fqAii3QYwzwGo17i7A'
        }).addTo(mymap);

        getISS();
        setInterval(getISS, 1000)
        var firstTime = true;
        async function getISS(){
            var response = await fetch('http://api.open-notify.org/iss-now.json');
            var ISSJSON = await response.json();
            console.log(ISSJSON);
            if(firstTime){
                mymap.setView([ISSJSON['iss_position']['latitude'],ISSJSON['iss_position']['longitude']], 5);
                firstTime = false;
            }
            maker.setLatLng([ISSJSON['iss_position']['latitude'],ISSJSON['iss_position']['longitude']]);
        }
    </script>
</body>
</html>
<script type="text/javascript">
    function placeDot(lat, long){
        console.log('Lat:', lat,' Long:', long);
        var circle = L.circle([lat, long], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 50
        }).addTo(mymap);
    }
</script>

<?php
    require_once 'pdo.php';
    $_POST['lat'] = 0;
    $_POST['lng'] = 0;

    
    $sql = 'SELECT * FROM iss_data';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $_POST['lat'] = $row['lat'];
        $_POST['lng'] = $row['lng'];
        echo("<script>placeDot('$_POST[lat]', '$_POST[lng]')</script>");
    }
?>

