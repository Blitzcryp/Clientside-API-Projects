
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Grapher</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>
<body>
    <h3>Search for your country of interest for COVID-19 cases</h3>
    <form>
        <p>Country:<input type="text" name="country" id="cty" ></p>

        <input type="radio" id="lin" name="graph_type" value="lin">
        <label for="lin">Linear</label><br>
        <input type="radio" id="log" name="graph_type" value="log">
        <label for="log">Logarithmic</label><br>

        <input type="submit" value="Query" id='submit'>
    </form>
    <canvas id="myChart"></canvas>
    <script>
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var width = $(window).width();
    var height = $(window).height();
    $(ctx).css('width', width);
    $(ctx).css('width', height/2);

    $('form').submit(function(e){
        e.preventDefault();
    })

    
    $('#submit').click(function(){
        generate_chart(document.getElementById('cty').value, $('input[name="graph_type"]:checked'));
    });

    </script>
</body>
</html>