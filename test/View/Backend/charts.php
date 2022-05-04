<?php require 'Header_Admin.php'; 
$connection = mysqli_connect('localhost', 'root', '', 'forum');
$result = mysqli_query($connection, "SELECT * FROM topic");
//if($result){
//    echo "CONNECTED";
//}
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
                ['titre', 'like_count', 'dislike_count','view_count'],

                <?php

                    if(mysqli_num_rows($result)> 0){

                        while($row = mysqli_fetch_array($result)){

                            echo "['".$row['titre']."', '".$row['like_count']."', '".$row['dislike_count']."','".$row['view_count']."'],";

                        }


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

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>
<body>

<div id="columnchart_material" style="width: 100%; height: 500px;"></div>


</body>
</html>
