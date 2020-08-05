<div class="container">
    <h3 align="center">Dashboard</h3><br />

    <div class="panel panel-default col-md-6">
        <div class="panel-heading">
            <h3 class="panel-title">Porcentaje de aceptación de pedidos</h3>
        </div>
        <div class="panel-body" align="center">
            <div id="pie_chart">

            </div>
        </div>
    </div>

    <div class="panel panel-default col-md-6">
        <div class="panel-heading">
            <h3 class="panel-title">Ventas por mes</h3>
        </div>
        <div class="panel-body" align="center">
            <div id="bar_chart">

            </div>
        </div>
    </div>

</div>

</div>
</div>

<style type="text/css">
    .box {
        width: 800px;
        margin: 0 auto;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    window.onload = function() {
        var aceptation = [];
        var months = [];

        function getAceptation() {

            axios({
                    method: 'get',
                    url: 'http://localhost:8000/api/aceptation',
                    responseType: 'json'
                })
                .then(function(response) {
                    aceptation = response.data;
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });

                    google.charts.setOnLoadCallback(drawChart);

                });


            function drawChart() {
                var data = google.visualization.arrayToDataTable(aceptation);
                var options = {
                    title: 'Porcentaje de aceptación de pedidos',
                    is3D: true
                };
                var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
                chart.draw(data, options);
            }
        }

        function getSalesPerMonth() {
            axios({
                    method: 'get',
                    url: 'http://localhost:8000/api/monthlySales',
                    responseType: 'json'
                })
                .then(function(response) {
                    months = response.data;
                    google.charts.load('current', {
                        'packages': ['corechart', 'bar']
                    });

                    google.charts.setOnLoadCallback(drawChart);

                });


            function drawChart() {
                var data = google.visualization.arrayToDataTable(months);
                var options = {
                    title: 'Ventas por mes',
                    chartArea: {
                        width: '50%'
                    },
                    hAxis: {
                        title: 'Ventas Totales',
                        minValue: 0
                    },
                    vAxis: {
                        title: 'Mes'
                    }
                };
                var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
                chart.draw(data, options);
            }
        }

        getAceptation();
        getSalesPerMonth();
    }
</script>