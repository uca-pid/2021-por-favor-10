@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
          <br>
          <br>
          <br>
          <br>
          <div style="background:white">
            <div id="chart"></div>
          </div>
        </div>
    </div>

</div>

<script type="text/javascript">

        var recursoejercicios = @json($recursoejercicios);
        var recursoclases = @json($recursoclases);

        /*let test = {x: (recursoejercicios[0]).nombre , y: (recursoejercicios[0]).real , goals: [{
                    name: 'Esperado',
                    value: (recursoejercicios[0]).objetivo,
                    strokeWidth: 5,
                    strokeColor: '#775DD0'
              }] };
        let test2 = {x: (recursoejercicios[1]).nombre , y: (recursoejercicios[1]).real , goals: [{
                    name: 'Esperado',
                    value: (recursoejercicios[1]).objetivo,
                    strokeWidth: 5,
                    strokeColor: '#775DD0'
              }] };*/

        arrayData = [];
        recursoejercicios.forEach(cargarObjetosEnData);
        recursoclases.forEach(cargarObjetosEnData);
        function cargarObjetosEnData(item) {
          arrayData.push( {x: item.nombre , y: item.real , goals: [{
                    name: 'Esperado',
                    value: item.objetivo,
                    strokeWidth: 5,
                    strokeColor: '#775DD0'
              }] } );
        }

        var options = {
          series: [
          {
            name: 'Actual',
            data: arrayData
          }
        ],
          chart: {
          height: 350,
          type: 'bar'
        },
        plotOptions: {
          bar: {
            horizontal: true,
          }
        },
        colors: ['#00E396'],
        dataLabels: {
          formatter: function(val, opt) {
            const goals =
              opt.w.config.series[opt.seriesIndex].data[opt.dataPointIndex]
                .goals
        
            if (goals && goals.length) {
              return `${val} / ${goals[0].value}`
            }
            return val
          }
        },
        legend: {
          show: true,
          showForSingleSeries: true,
          customLegendItems: ['Actual', 'Esperado'],
          markers: {
            fillColors: ['#00E396', '#775DD0']
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

</script>

@endsection