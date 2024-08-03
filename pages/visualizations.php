<!DOCTYPE html>
<html>
<head>
    <title>Pesticide Effectiveness</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Fetch data from MySQL using PHP
            <?php include_once "index.php"; ?>

            // Create a DataTable and populate with fetched data
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Date');
            data.addColumn('number', 'Effectiveness');

            <?php
            $sql = "SELECT date, pestcideName, pestReduction FROM pests";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Convert date string to JavaScript Date object
                    $date = date('Y, n, j', strtotime($row['date']));
                    echo "data.addRow([new Date($date), " . $row["pestReduction"] . "]);";
                }
            }
            ?>

            // Set options for the chart
            var options = {
                title: 'Pesticide Effectiveness Over Time',
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: { format: 'MMM yyyy' } // Format the date axis
            };

            // Create and draw the chart
            var chart = new google.visualization.LineChart(document.getElementById('linechart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="linechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
