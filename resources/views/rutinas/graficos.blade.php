@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

<script type="text/javascript">
    $( document ).ready(function() {
        // var options = {
        //   chart: {
        //     type: 'line'
        //   },
        //   series: [{
        //     name: 'sales',
        //     data: [30,40,35,50,49,60,70,91,125]
        //   },
        //   {
        //     name: 'otra',
        //     data: [120,10,24,3,22,11,15,23,4,90]
        //   }],
        //   xaxis: {
        //     categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        //   }
        // }
        var datos = @json($datos);
        console.log(datos);

        var options = {
            chart: {
                type: 'donut',
                width: '100%',
                height: 400,
                events: {
                  dataPointSelection: function(event, chartContext, config) {
                    console.log(chartContext);
                    console.log(config.dataPointIndex);
                    var seleccion = config.dataPointIndex;
                    eliminarClase(seleccion, chartContext.w.globals.series, chartContext.w.globals.labels);
                  }
                }
            },
            title: {
                text: 'Distribución de las clases',
                align: 'center',
                style: {
                  fontSize: '20px',
                }
            },
            series: datos['alumnos'],
            labels: datos['clases_nombre'],
            dataLabels: {
                enabled: true,
                enabledOnSeries: undefined,
                textAnchor: 'middle',
                distributed: false,
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '20px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 'bold',
                    colors: undefined
                },
                background: {
                    enabled: true,
                    foreColor: '#fff',
                    padding: 4,
                    borderRadius: 2,
                    borderWidth: 1,
                    borderColor: '#fff',
                    opacity: 0.9,
                    dropShadow: {
                        enabled: false,
                        top: 1,
                        left: 1,
                        blur: 1,
                        color: '#000',
                        opacity: 0.45
                    }
                },
                dropShadow: {
                    enabled: false,
                    top: 1,
                    left: 1,
                    blur: 1,
                    color: '#000',
                    opacity: 0.45
                }
            },
            plotOptions: {
                pie: {
                    expandOnClick: false
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        function eliminarClase(seleccion, serie, labels) {
            let nuevaSerie = serie;
            let nuevoLabels = labels;
            nuevaSerie.splice(seleccion, 1);
            nuevoLabels.splice(seleccion, 1);

            chart.updateOptions({
              series: nuevaSerie,
              labels: nuevoLabels
            });
        };

        function resetGrafico() {
            chart.updateOptions({
                series: datos['alumnos'],
                labels: datos['clases_nombre']
            });
        };

        document.querySelector("#resetGrafico").addEventListener("click", function() {
            chart.updateOptions({
                series: datos['alumnos'],
                labels: datos['clases_nombre']
            });
        });
    });
</script>

<div class="container px-4 mx-auto">
    <div id="chart" class="p-6 m-20 bg-white rounded shadow">

    </div>
    <button id="resetGrafico" class="btn btn-primary">Restablecer</button>
</div>
@endsection