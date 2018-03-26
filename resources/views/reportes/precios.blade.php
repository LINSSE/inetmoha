@extends('layouts.principal')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

    $(function () { 

        var max = <?php echo $max; ?>;
        var min = <?php echo $min; ?>;
        var prom = <?php echo $prom; ?>;
        var nombre = <?php echo $nombre; ?>;

    $('#container').highcharts({

        chart: {

            type: 'line'

        },

        title: {

            text: 'Max precios de prod'

        },

        xAxis: {

            type: 'datetime',

            title: {
                text: nombre
            },

        },

        yAxis: {

            title: {

                text: 'precios'

            }, 

            categories: ['min', 'prom', 'max']

        },

        series: [{
            
            name: 'Mínimo',

            data: [min, prom, max],

            pointStart: Date.parse("2018 03 22")

        }]

    });

});

</script>

<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <div id="container"></div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection