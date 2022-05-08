<?php require 'Header_Admin.php'; 


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <br>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['titre', 'view_count', 'like_count', 'dislike_count'],
          <?php
           $connection = mysqli_connect('localhost', 'root', '', 'forum');
           $result = mysqli_query($connection, "SELECT * FROM topic");
            while($data=mysqli_fetch_array($result)){
              $titre=$data['titre'];
              $view_count=$data['view_count'];
              $like_count=$data['like_count'];
              $dislike_count=$data['dislike_count'];
           ?>
           ['<?php echo $titre;?>',<?php echo $view_count;?>,<?php echo $like_count;?>,<?php echo $dislike_count;?>],   
           <?php   
            }
           ?> 

            ]);
            var options = {
                chart: {
                    title: 'Mouvement Dans Le Forum',
                    subtitle: 'Nombre de vue, Nombre de like, ',
                    width: 5000,
                    height: 500
                }
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>
<body>

<div id="barchart_material" style="width: 100%; height: 500px;"></div>


</body>
</html>
