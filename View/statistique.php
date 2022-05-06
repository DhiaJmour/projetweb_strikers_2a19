<?php  
 $connect = mysqli_connect("localhost", "root", "", "projet");  
 $query = "SELECT dateL	, count(*) as number FROM livraison GROUP BY dateL ";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title> 
    <link rel="shortcut icon" href="assests/img/favicon.png" type="image/x-icon">
    <!-- icon -->
  
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   
      <link rel="stylesheet" href="statistique.css"> 
     
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <div class="charts">
           <script type="text/javascript">  
            
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['dateL', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["dateL"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'pourcentage date d affectation du panier',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
           </div>
      </head>  
      <body>  


  
           <br /><br />  
           <div style="width:900;">  
                <br />  
                <div id="piechart" style="width: 900px; height: 400px; background-color:transparent; position: relative;left:350px;top:40px;"></div>  
           </div>  

      </body>  
 </html>