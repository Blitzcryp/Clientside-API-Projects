<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>
<body>
    <a href="newindex.php">GoTo NewOnly</a>
    <canvas id="myChart" width="400" height="400"></canvas>
    <p>&copy; 08/13/2020</p>
    <p id="drate"></p>
    <script>

    chartIt();
    getData();
    async function chartIt(){
        const data = await getData();
        const ctx = document.getElementById('myChart').getContext('2d');
        xlabels = [];
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.xs,
                datasets: [{
                    label: 'Total Covid Cases in Romania',
                    fill: false,
                    data: data.ys,
                    backgroundColor: 
                        'rgba(255, 199, 132, 0.2)'
                    ,
                    borderColor: 
                        'rgba(255, 199, 132, 1)'
                    ,
                    borderWidth: 1
                },{
                    label: 'Total Covid Deaths in Romania',
                    fill: false,
                    data: data.zs,
                    backgroundColor: 
                        'rgba(255, 99, 232, 0.2)'
                    ,
                    borderColor: 
                        'rgba(255, 99, 232, 1)'
                    ,
                    borderWidth: 1
                }]
            },
            options:{
                scales:{
                    yAxes:{
                        ticks:{
                            callback: function(value, index, values){
                                return value + 'C';
                            }
                        }
                    }
                }
            }
        });
        var drate = 100*data.zs[data.zs.length-1]/data.ys[data.ys.length-1];
        $("#drate").html("Mortality: "+Number(drate).toFixed(2) + "%");
    }
    async function getData(){
        const xs = [];
        const ys = [];
        const zs = [];
        const response = await fetch('owid-covid-data.csv');
        const data = await response.text();
        const table = data.split('\n').slice(1);
        table.forEach(elt => {
            const row = elt.split(',');
            const date = row[3];
            xs.push(date);
            const cases = row[4];
            ys.push(cases);
            zs.push(row[6]);
        });
        return {xs, ys, zs};
    }

    
    </script>
</body>
</html>
