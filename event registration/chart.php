<?php
  $con=mysqli_connect("localhost","root","","event");
  $se="Self";$gr="Group";$co="Corporate";$ot="Others";
  $s="SELECT * FROM login WHERE type='$se'";
  $g="SELECT * FROM login WHERE type='$gr'";
  $c="SELECT * FROM login WHERE type='$co'";
  $o="SELECT * FROM login WHERE type='$ot'";
  $self=mysqli_query($con,$s);
  $Group=mysqli_query($con,$g);
  $Corporate=mysqli_query($con,$c);
  $Others=mysqli_query($con,$o);
?>
<html>
  <head><title>Type Analysis</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Registeration Type', 'Self', 'Group', 'Corporate','Others'],
          ['UTSAV 4.0',<?php echo mysqli_num_rows($self);?>,<?php echo mysqli_num_rows($Group);?>,<?php echo mysqli_num_rows($Corporate);?>,<?php echo mysqli_num_rows($Others);?>]]);

        var options = {
          chart: {
            title: 'Types of Ticket Registered',
            subtitle: 'Self, Group, Corporate and Others',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="margin:auto; margin-top: 40px; width: 800px; height: 500px;"></div>

  </body>
</html>
