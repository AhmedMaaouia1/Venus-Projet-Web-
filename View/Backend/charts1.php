<?php
  $con = mysqli_connect("localhost","root","","venus");
  
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);


      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Nom',  'qty'   ],
         <?php
         $sql = "SELECT * FROM produit";
         $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['Nom']."',".$result['qty']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Stock des produits '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }


      




    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

  </body>
</html>