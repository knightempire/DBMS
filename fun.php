<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <title>Pie-Chart</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome  -->
    <script src="https://kit.fontawesome.com/56329d55eb.js" crossorigin="anonymous"></script>
    <!--   CSS    -->
    <link rel="stylesheet" href="style.css">
    <style> .center-block { display: block;margin-left: auto;margin-right: auto; }</style>
</head>

<style>
    body {

      font-family: "Montserrat";
      margin-top: 100px;
 
    }

    #title {
      background-color: rgb(64, 197, 31);
      color: white;
    }

    h1 {
      font-size: 2.5em;
      line-height: 1.5;
      font-family: "Montserrat", "sans-serif";
      font-weight: bold;
    }

    /* navbar */

    .navbar {
      padding: 0 0 4.5rem;
    }

    .navbar-brand {
      font-family: "Montserrat", "sans-serif";
      font-size: 2.5rem;
      font-weight: bold;
    }


    .nav-link {
      font-size: 1.2rem;
      font-family: "Montserrat-Light";
    }

    .icon {
      color: rgb(43, 145, 17);
      margin-bottom: 1rem;
    }

    .icon:hover {
      color: rgb(64, 197, 31);
      margin-bottom: 1rem;
    }

    #testimonials {
      background-color: rgb(64, 197, 31);
      color: white;
      text-align: center;
      font-size: 3.5em;
      line-height: 1.5;
      font-family: "Montserrat", "sans-serif";
      font-size: 2.5rem;

    }

    #press {
      background-color: rgb(64, 197, 31);
      text-align: center;
      padding-bottom: 3%;
    }

    .press {
      width: 15%;

    }

    #cta {
      background-color: rgb(64, 197, 31);
      color: white;



    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;600;900&family=Ubuntu:wght@300&display=swap');
    </style>
<body style="background-color: rgb(64, 197, 31);">
    <!-- Nav Bar -->
<!-- 
  <nav class="navbar navbar-expand-lg navbar-dark " style="padding: 0 0 4.5rem;">
    <a class="navbar-brand" href="#">FarmerEco.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
      aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" style="padding: 0px 18px;">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item" style="padding: 0px 18px;">
          <a class="nav-link" href="#">Add</a>
        </li>
        <li class="nav-item" style="padding: 0px 18px;">
          <a class="nav-link" href="#">View</a>
        </li>
        <li class="nav-item" style="padding: 0px 18px;">
          <a class="nav-link" href="#footer">Contact</a>
        </li>
      </ul>

    </div> -->

  </nav>
<div class="container">
    <center>
        <div id="container"></div>
    </center>
 </div>
<?php
$con = new mysqli('localhost','root','','tests');
include "db_conn.php"; // connection file with database
$query = "select * from product"; // get the records on which pie chart is to be drawn
$getData = $con->query($query);
?>
<script>
    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'bar'
        },
        title: {
            text: 'Product Name '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        series: [{
            name: 'product',
            
            colorByPoint: true,
            data: [
                <?php
                $data = '';
                $data='';
                if ($getData->num_rows>0){
                    while ($row = $getData->fetch_object()){
                        $data.='{ name:"'.$row->product_id.'",y:'.$row->PRICE.'},';
                        
                    }
                }
                echo $data;
                ?>
            ]
        }]
    });
</script>
</body>
</html>