<table>
<h1>Biểu đồ</h1>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Loại Hàng', 'Số lượng sản phẩm'],
  <?php
            $tong_loai = count($listtk);
            $i = 1;
            foreach ($listtk as $thongke) {
                extract($thongke);
                if ($i == $tong_loai) $dauphay = "";
                else $dauphay = ",";
                echo "['" . $thongke['category_name'] . "'," . $thongke['countsp'] . "]" . $dauphay;
                $i += 1;
            }
            ?>

        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Thống kê sản phẩm',
            'width': 1100,
            'height': 800
        };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</table>