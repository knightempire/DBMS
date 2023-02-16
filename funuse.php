<!-- <iframe src="view.php" height=100% width=20%> </iframe>
<iframe src="view_orders.php" height=100% width=40%></iframe>
<iframe src="view_ser.php" height=100% width=40%></iframe> -->


<?php
session_start();
require_once('db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/statistics.css">
    <title>statistics</title>
</head>

<body>
   

         

            <?php
            $id = $_SESSION['id'];
            $sql = "SELECT product_id, PRICE FROM product ";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $revenue = $row["PRICE"];
                    $month = $row["product_idr"];
                }
            }

            $revenue_value = array();
            $month_value = array();
            foreach ($result as $row) {
                $revenue_value[] = $row["PRICE"];
                $month_value[] = $row["product_id"];
            }


            ?>


            <div class="diagram_div">
                <canvas id="myChart"></canvas>
            </div>
            <!--todo=============== script ===============-->

            <script>
                const data = {
                    labels: [<?php echo json_encode($month_value) ?>],
                    datasets: [{
                        label: 'Revenue value:',
                        backgroundColor: '#20e0307a',
                        borderColor: '#04aa1a',
                        data: [<?php echo json_encode($revenue_value) ?>],
                        borderWidth: 1,
                    }]
                };

                var chartEl = document.getElementById("myChart");
                chartEl.height = 250;
                const config = {
                    type: 'line',
                    data: data,
                    options: {
                        plugins: {

                            title: {
                                display: true,
                                text: 'Revenues'
                            },
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        }
                    }
                };
            </script>
           

 <script>
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            </script>


  
</body>

</html>













