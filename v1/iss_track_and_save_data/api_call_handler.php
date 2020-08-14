<?php
    require_once 'pdo.php';

    if(isset($_POST['iss'])){
        print_r($_POST['iss']);
        $sql = 'INSERT INTO iss_data(lat, lng) VALUES(:lat, :long)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':lat'=> $_POST['iss']['latitude'],
            ':long'=> $_POST['iss']['longitude']
        ]);

        echo('Data sent');
    }
    Header('index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
</body>
</html>
