<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> VIGRO - ADMIN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   <body> 
<!-- 
    <div class="top"> 
    
        <a href="C:\xampp\htdocs\DBMS CASE STUDY\home.html"><img height="80px" width="100px" style="margin-left:30px; margin-top: 10px;" src="image\logo-removebg-preview (1).png"></a>
          <h1 style="margin-left: 4s00px; margin-top:-60px ;">  HELLO ADMIN !</h1>
          <div class="a" style="margin-top: -60px;">        <a style="margin-left: 1580px" href="admin_login.php"> LOG OUT </a>
        
    </div>
 <br><br>
 <br><br>  -->
    <div class="chart" style="width: 40%; height: 100%;">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<br>
<h2  style="margin-left: 20px; margin-top:20px;"> PROFIT </h2>
<br><br>
<canvas id="myChart" style="width:100%;max-width:600px;margin-left: 20px;"></canvas>
<br>
<script>
var xValues = [50,60,70,80,90,100,110,120,130,140,150];
var yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgb(25, 28, 36)",
      borderColor: "rgb(204, 23, 24)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:20}}],
    }
  }
});
</script>


    </div>

<div class="chart_1">
    <br>
<h2  style="margin-left: 20px; margin-top:20px;"> PRODUCT SALES </h2>
<br><br>
<canvas id="mChart" style="width:100%;max-width:600px;margin-left: 80px;"></canvas>
<br>
<script>
var xValues = ["ORION® ", "Ascorp", "ASCORP", "WEILI", "QTYB"];
var yValues = [55, 49, 44, 24, 15];  
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("mChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      
   
    }
  }
});
</script>


</div>


<div class="chart_2">



</div>


   </body> 


<style>

body{
    background-color: white;
    color: rgb(0, 0, 0);
}
 .top{
    justify-content: center;
    
 }
 .a a{
    text-decoration: none;
    color: rgb(204, 23, 24) ;
 }
 .chart{
    /* background-color: rgb(25, 28, 36); */
    margin-left: 100px;
    border-radius: 10px;
 }
 .chart_1{
    /* background-color: rgb(25, 28, 36); */
    margin-left: 100px;
    border-radius: 10px;
    width: 45%;
    height: 100%;
    margin-left: 900px;
    margin-top: -440px;

 }
 .chart_2{
    /* background-color: rgb(25, 28, 36); */
    margin-left: 100px;
    border-radius: 10px;
 }

 
</style>
  <br><br><br>
<!-- <div class="link" style="margin-left:1700px;margin-top:-150px"> 
<a href="http://localhost/DBMS%20CASE%20STUDY/view_orders.php"> Order history </a> <br><br> 
<a href="http://localhost/DBMS%20CASE%20STUDY/view.php">view users</a> <br><br>
<a href="http://localhost/DBMS%20CASE%20STUDY/view_ser.php">serial</a> <br><br>
</div> -->
<br><br><br>
<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'tests';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM product ";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: skyblue;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
    a{
      text-decoration: none;
      color: red;
      /* margin-left: 400px; */
      margin-top: -700px;

      
   
    }
	</style>
</head>

<body>
	<section>
		<h1>product details</h1>

		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Product_id</th>
				<th>product name</th>
                <th>price</th>
				<th>type</th>

			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['product_id'];?></td>
				<td><?php echo $rows['PRODUCT_NAME'];?></td>
        <td><?php echo $rows['PRICE'];?></td>
				<td><?php echo $rows['TYPE'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>

 <form action="change.php" method="post">
  <h2>update here</h2>
  <label>id</label>
  <input type="text" name="product_id">
  <label> price</label>
  <input type="text" name="PRICE">
  <button> submit </button>
 </form> 


 <form action="change1.php" method="post">
  <h2>delete here</h2>
  <label>id</label>
  <input type="text" name="product_id">

  <button> submit </button>
 </form> 


 <form action="change2.php" method="post">
  <h2>insert here</h2>
  <label>id</label>
  <input type="text" name="product_id">
  <label> product_name</label>
  <input type="text" name="PRODUCT_NAME">
  <label> price</label>
  <input type="text" name="PRICE">
  <label> type</label>
  <input type="text" name="TYPE">
  <button> submit </button>
 </form> 
</body>

</html>

</html>

<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<body>

<div id="myPlot" style="width:100%;max-width:700px margin-left:400px"></div>

<script>
var xArray = [5000 ,
6500 ,
7200 ,
4000 ,
8250 ,
12000 ,
15250 ,
11750 ,
12250 ,
13000 ,
];
var yArray = ["A23N145",
"P235Y90",
"6YU7903",
"T6H7342",
"W209M18",
"5GL3456",
"ZD56780",
"K90000Q",
"C45E234",
"L231Q90",
 ];

var data = [{
  x:xArray,
  y:yArray,
  type:"bar",
  orientation:"h",
  marker: {color:"rgba(255,0,0,0.6)"}
}];

var layout = {title:"prdoucts"};

Plotly.newPlot("myPlot", data, layout);
</script>

</body>
</html>


<iframe src="img1.html" width=100% height=800px></iframe>

