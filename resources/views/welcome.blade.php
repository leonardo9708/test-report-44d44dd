<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .chart {
                width: 100%; 
                min-height: 450px;
            }
            .row {
                margin:0 !important;
            }
        </style>
        <!-- Javasctipt -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["calendar"]});
            google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var passedArray = <?php echo json_encode($array_data_master); ?>;
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'date', id: 'Date' });
            dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
            for(var i = 0; i < passedArray.length; i++){ 
                dataTable.addRows([
                    //[ new Date(2012, 3, 13), 38177 ]
                    [ new Date(passedArray[i].date), passedArray[i].num ]
                ]);
            }

            var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

            var options = {
                title: "Entradas de residentes",
                width: '100%',
                height: 350,
            };

            chart.draw(dataTable, options);
        }
            google.charts.load("current", {packages:["calendar"]});
            google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var passedArray = <?php echo json_encode($array_data_service); ?>;
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'date', id: 'Date' });
            dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
            for(var i = 0; i < passedArray.length; i++){ 
                dataTable.addRows([
                    //[ new Date(2012, 3, 13), 38177 ]
                    [ new Date(passedArray[i].date), passedArray[i].num ]
                ]);
            }

            var chart = new google.visualization.Calendar(document.getElementById('calendar_basic2'));

            var options = {
                title: "Entradas del personal de servicio",
                width: '100%',
                height: 350,
            };

            chart.draw(dataTable, options);
        }
            google.charts.load("current", {packages:["calendar"]});
            google.charts.setOnLoadCallback(drawChart3);

        function drawChart3() {
            var passedArray = <?php echo json_encode($array_data_visitf); ?>;
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn({ type: 'date', id: 'Date' });
            dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
            for(var i = 0; i < passedArray.length; i++){ 
                dataTable.addRows([
                    //[ new Date(2012, 3, 13), 38177 ]
                    [ new Date(passedArray[i].date), passedArray[i].num ]
                ]);
            }

            var chart = new google.visualization.Calendar(document.getElementById('calendar_basic3'));

            var options = {
                title: "Entradas de visitas frecuentes",
                width: '100%',
                height: 350,
            };

            chart.draw(dataTable, options);
        }
        </script>
    </head>
    <body>
        <div class="title m-b-md flex-center">
            Uso lectoras
        </div>
        <div class="container content">
            <div id="calendar_basic" style="width: 100vh; height: 350px;" class="content"></div>
            <div id="calendar_basic2" style="width: 100vh; height: 350px;" class="content"></div>
            <div id="calendar_basic3" style="width: 100vh; height: 350px;" class="content"></div>
        </div>
        <div class="title m-b-md flex-center">
            Lectoras estado Actual
        </div>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Device</th>
                    <th>Name</th>
                    <th>State</th>
                </tr>
                </thead>
                <tbody>
                @foreach($array_data as $key=>$value)
                    @if($value["state"] <= 50)
                    <tr class="table-danger">
                    @elseif($value["state"] <= 75)
                    <tr class="table-warning">
                    @elseif($value["state"] <= 100)
                    <tr class="table-success">
                    @endif
                        <td>{{$value["device"]}}</td>
                        <td>{{$value["description"]}}</td>
                        <td>{{$value["state"]}}%</td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
        </div>
        <div class="title m-b-md flex-center">
            Lectoras estado ultimos tres dias
        </div>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Device</th>
                    <th>Name</th>
                    <th>State</th>
                </tr>
                </thead>
                <tbody>
                @foreach($array_data3 as $key=>$value)
                    @if($value["state"] <= 50)
                    <tr class="table-danger">
                    @elseif($value["state"] <= 75)
                    <tr class="table-warning">
                    @elseif($value["state"] <= 100)
                    <tr class="table-success">
                    @endif
                        <td>{{$value["device"]}}</td>
                        <td>{{$value["description"]}}</td>
                        <td>{{$value["state"]}}%</td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
        </div>
        <div class="title m-b-md flex-center">
            Lectoras estado ultimo mes
        </div>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Device</th>
                    <th>Name</th>
                    <th>State</th>
                </tr>
                </thead>
                <tbody>
                @foreach($array_data3 as $key=>$value)
                    @if($value["state"] <= 50)
                    <tr class="table-danger">
                    @elseif($value["state"] <= 75)
                    <tr class="table-warning">
                    @elseif($value["state"] <= 100)
                    <tr class="table-success">
                    @endif
                        <td>{{$value["device"]}}</td>
                        <td>{{$value["description"]}}</td>
                        <td>{{$value["state"]}}%</td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
        </div>
        <div class="title m-b-md flex-center">
            Ingresos por fecha
        </div>
        <div class="container content">
            <form name="form1" action="{{url('use')}}" method="post" onsubmit="myFunction()">
                @csrf
                <label for="birthday">De:</label>
                <input type="date" id="date1" name="date1" >
                <label for="birthday">A:</label>
                <input type="date" id="date2" name="date2">
                <button type="submit">Consultar</button>
            </form>
        </div>
        <br><br>
        <div class="container">
        @if ($date1 != ""  && $date2 != "")
            <h3>Registros de {{$date1}} a {{$date2}}</h3>
        @else
            <h3>Seleccione un fecha</h3>
        @endif

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="table-dark text-dark">
                        <td colspan="2">Ingresos via Lectoras</td>
                    </tr>
                    @foreach($array_data_use as $key=>$value)
                        <tr>
                            <td>Residentes</td>
                            <td>{{$value["lectora"][0]["master"]}}</td>
                        </tr>
                        <tr>
                            <td>Personal de Servicio</td>
                            <td>{{$value["lectora"][1]["staff"]}}</td>
                        </tr>
                        <tr>
                            <td>Visitas Frecuentes</td>
                            <td>{{$value["lectora"][2]["frequent"]}}</td>
                        </tr>
                    @endforeach()
                    <tr class="table-dark text-dark">
                        <td colspan="2">Ingresos via Tabletas</td>
                    </tr>
                    @foreach($array_data_use as $key=>$value)
                        <tr>
                            <td>Visita regular</td>
                            <td>{{$value["tablet"][0]["invitations"]}}</td>
                        </tr>
                        <tr>
                            <td>Personal de Servicio</td>
                            <td>{{$value["tablet"][1]["staff"]}}</td>
                        </tr>
                        <tr>
                            <td>Visitas Frecuentes</td>
                            <td>{{$value["tablet"][2]["frequent"]}}</td>
                        </tr>
                        <tr>
                            <td>Proveedores</td>
                            <td>{{$value["tablet"][3]["suppliers"]}}</td>
                        </tr>
                        <tr>
                            <td>Registros manuales</td>
                            <td>{{$value["tablet"][4]["manual"]}}</td>
                        </tr>
                    @endforeach()
                    <tr class="table-dark text-dark">
                        <td colspan="2">Altas</td>
                    </tr>
                    @foreach($array_data_use as $key=>$value)
                        <tr>
                            <td>Nuevos usuarios</td>
                            <td>{{$value["altas"][0]["usuarios"]}}</td>
                        </tr>
                        <tr>
                            <td>Nuevos visitantes</td>
                            <td>{{$value["altas"][1]["visitantes"]}}</td>
                        </tr>
                        <tr>
                            <td>Nuevo personal de servicio</td>
                            <td>{{$value["altas"][2]["personal"]}}</td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
        <!-- Footer -->
        <footer >
            <br><br><br><br>
        </footer>
        <script>
            function myFunction() {
                var date1 = document.forms["form1"]["date1"].value;
                var date2 = document.forms["form1"]["date1"].value;
                if (date1 == "" || date2 == ""){
                    alert("Selecciona ambas fechas!");
                    return false;
                } else {
                    return true;
                }
            }
        </script>
    </body>
</html>
