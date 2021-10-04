@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

{{-- <script type="text/javascript">
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
</script> --}}

<script type="text/javascript">

$( document ).ready(function() {
    window.Apex = {
  chart: {
    foreColor: '#ccc',
    toolbar: {
      show: false
    },
  },
  stroke: {
    width: 3
  },
  dataLabels: {
    enabled: false
  },
  tooltip: {
    theme: 'dark'
  },
  grid: {
    borderColor: "#535A6C",
    xaxis: {
      lines: {
        show: true
      }
    }
  }
};

var spark1 = {
  chart: {
    id: 'spark1',
    group: 'sparks',
    type: 'line',
    height: 80,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      top: 1,
      left: 1,
      blur: 2,
      opacity: 0.2,
    }
  },
  series: [{
    data: [25, 66, 41, 59, 25, 44, 12, 36, 9, 21]
  }],
  stroke: {
    curve: 'smooth'
  },
  markers: {
    size: 0
  },
  grid: {
    padding: {
      top: 20,
      bottom: 10,
      left: 110
    }
  },
  colors: ['#fff'],
  tooltip: {
    x: {
      show: false
    },
    y: {
      title: {
        formatter: function formatter(val) {
          return '';
        }
      }
    }
  }
}

var spark2 = {
  chart: {
    id: 'spark2',
    group: 'sparks',
    type: 'line',
    height: 80,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      top: 1,
      left: 1,
      blur: 2,
      opacity: 0.2,
    }
  },
  series: [{
    data: [12, 14, 2, 47, 32, 44, 14, 55, 41, 69]
  }],
  stroke: {
    curve: 'smooth'
  },
  grid: {
    padding: {
      top: 20,
      bottom: 10,
      left: 110
    }
  },
  markers: {
    size: 0
  },
  colors: ['#fff'],
  tooltip: {
    x: {
      show: false
    },
    y: {
      title: {
        formatter: function formatter(val) {
          return '';
        }
      }
    }
  }
}

var spark3 = {
  chart: {
    id: 'spark3',
    group: 'sparks',
    type: 'line',
    height: 80,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      top: 1,
      left: 1,
      blur: 2,
      opacity: 0.2,
    }
  },
  series: [{
    data: [47, 45, 74, 32, 56, 31, 44, 33, 45, 19]
  }],
  stroke: {
    curve: 'smooth'
  },
  markers: {
    size: 0
  },
  grid: {
    padding: {
      top: 20,
      bottom: 10,
      left: 110
    }
  },
  colors: ['#fff'],
  xaxis: {
    crosshairs: {
      width: 1
    },
  },
  tooltip: {
    x: {
      show: false
    },
    y: {
      title: {
        formatter: function formatter(val) {
          return '';
        }
      }
    }
  }
}

var spark4 = {
  chart: {
    id: 'spark4',
    group: 'sparks',
    type: 'line',
    height: 80,
    sparkline: {
      enabled: true
    },
    dropShadow: {
      enabled: true,
      top: 1,
      left: 1,
      blur: 2,
      opacity: 0.2,
    }
  },
  series: [{
    data: [15, 75, 47, 65, 14, 32, 19, 54, 44, 61]
  }],
  stroke: {
    curve: 'smooth'
  },
  markers: {
    size: 0
  },
  grid: {
    padding: {
      top: 20,
      bottom: 10,
      left: 110
    }
  },
  colors: ['#fff'],
  xaxis: {
    crosshairs: {
      width: 1
    },
  },
  tooltip: {
    x: {
      show: false
    },
    y: {
      title: {
        formatter: function formatter(val) {
          return '';
        }
      }
    }
  }
}

new ApexCharts(document.querySelector("#spark1"), spark1).render();
new ApexCharts(document.querySelector("#spark2"), spark2).render();
new ApexCharts(document.querySelector("#spark3"), spark3).render();
new ApexCharts(document.querySelector("#spark4"), spark4).render();


var optionsLine = {
  chart: {
    height: 328,
    type: 'line',
    zoom: {
      enabled: false
    },
    dropShadow: {
      enabled: true,
      top: 3,
      left: 2,
      blur: 4,
      opacity: 1,
    }
  },
  stroke: {
    curve: 'smooth',
    width: 2
  },
  //colors: ["#3F51B5", '#2196F3'],
  series: [{
      name: "Music",
      data: [1, 15, 26, 20, 33, 27]
    },
    {
      name: "Photos",
      data: [3, 33, 21, 42, 19, 32]
    },
    {
      name: "Files",
      data: [0, 39, 52, 11, 29, 43]
    }
  ],
  title: {
    text: 'Media',
    align: 'left',
    offsetY: 25,
    offsetX: 20
  },
  subtitle: {
    text: 'Statistics',
    offsetY: 55,
    offsetX: 20
  },
  markers: {
    size: 6,
    strokeWidth: 0,
    hover: {
      size: 9
    }
  },
  grid: {
    show: true,
    padding: {
      bottom: 0
    }
  },
  labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002'],
  xaxis: {
    tooltip: {
      enabled: false
    }
  },
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -20
  }
}

var chartLine = new ApexCharts(document.querySelector('#line-adwords'), optionsLine);
chartLine.render();

var optionsCircle4 = {
  chart: {
    type: 'radialBar',
    height: 350,
    width: 380,
  },
  plotOptions: {
    radialBar: {
      size: undefined,
      inverseOrder: true,
      hollow: {
        margin: 5,
        size: '48%',
        background: 'transparent',

      },
      track: {
        show: false,
      },
      startAngle: -180,
      endAngle: 180

    },
  },
  stroke: {
    lineCap: 'round'
  },
  series: [71, 63, 77],
  labels: ['June', 'May', 'April'],
  legend: {
    show: true,
    floating: true,
    position: 'right',
    offsetX: 70,
    offsetY: 240
  },
}

var chartCircle4 = new ApexCharts(document.querySelector('#radialBarBottom'), optionsCircle4);
chartCircle4.render();


var optionsBar = {
  chart: {
    height: 380,
    type: 'bar',
    stacked: true,
  },
  plotOptions: {
    bar: {
      columnWidth: '30%',
      horizontal: false,
    },
  },
  series: [{
    name: 'PRODUCT A',
    data: [14, 25, 21, 17, 12, 13, 11, 19]
  }, {
    name: 'PRODUCT B',
    data: [13, 23, 20, 8, 13, 27, 33, 12]
  }, {
    name: 'PRODUCT C',
    data: [11, 17, 15, 15, 21, 14, 15, 13]
  }],
  xaxis: {
    categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4'],
  },
  fill: {
    opacity: 1
  },

}

var chartBar = new ApexCharts(
  document.querySelector("#barchart"),
  optionsBar
);

chartBar.render();

var optionsArea = {
  chart: {
    height: 380,
    type: 'area',
    stacked: false,
  },
  stroke: {
    curve: 'straight'
  },
  series: [{
      name: "Music",
      data: [11, 15, 26, 20, 33, 27]
    },
    {
      name: "Photos",
      data: [32, 33, 21, 42, 19, 32]
    },
    {
      name: "Files",
      data: [20, 39, 52, 11, 29, 43]
    }
  ],
  xaxis: {
    categories: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2'],
  },
  tooltip: {
    followCursor: true
  },
  fill: {
    opacity: 1,
  },

}

var chartArea = new ApexCharts(
  document.querySelector("#areachart"),
  optionsArea
);

chartArea.render();

});
</script>

<style type="text/css">
    div .wrapper {
      color: #777;
      font-family: Montserrat, Arial, sans-serif;
    }

    .body-bg {
      background: #F3F4FA !important;
    }

    h1, h2, h3, h4, h5, h6, strong {
      font-weight: 600;
    }

    /*div .wrapper {
      background: linear-gradient(45deg,#3a3a60,#5f5f8e);
      min-height: 100vh;
    }*/

    .content-area {
      width: 70%;
      max-width: 1280px;
      margin: 1rem auto;
      background: #343E59;
      padding-top: 1rem;
      padding-bottom: 1rem;
    }

    .box {
      background-color: #2B2D3E;
      padding: 25px 20px;
    }

    .shadow {
      box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08);
    }
    .sparkboxes .box {
      padding-top: 10px;
      padding-bottom: 10px;
      text-shadow: 0 1px 1px 1px #666;
      box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08);
      position: relative;
      border-radius: 5px;
    }

    .sparkboxes .box .details {
      position: absolute;
      color: #fff;
      transform: scale(0.7) translate(-22px, 20px);
    }
    .sparkboxes strong {
      position: relative;
      z-index: 3;
      top: -8px;
      color: #fff;
    }


    .sparkboxes .box1 {
      background-image: linear-gradient( 135deg, #ABDCFF 10%, #0396FF 100%);
    }

    .sparkboxes .box2 {
      background-image: linear-gradient( 135deg, #2AFADF 10%, #4C83FF 100%);
    }

    .sparkboxes .box3 {
      background-image: linear-gradient( 135deg, #FFD3A5 10%, #FD6585 100%);
    }

    .sparkboxes .box4 {
      background-image: linear-gradient( 135deg, #EE9AE5 10%, #5961F9 100%);
    }
</style>

{{-- <div class="container px-4 mx-auto">
    <div id="chart" class="p-6 m-20 bg-white rounded shadow">

    </div>
    <button id="resetGrafico" class="btn btn-primary">Restablecer</button>
</div> --}}

<div id="wrapper" class="wrapper">
  <div class="content-area rounded">
    <div class="container-fluid">
      <div class="main">
        <div class="row sparkboxes mt-4">
          <div class="col-md-6">
            <div class="box box1">
              <div class="details">
                <h3>1213</h3>
                <h4>REGISTRADOS</h4>
              </div>
              <div id="spark1"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box box2">
              <div class="details">
                <h3>422</h3>
                <h4>CLIENTES EN CLASES</h4>
              </div>
              <div style="min-height: 80px; display: flex; justify-content: flex-end; align-items: center;">
                <i class="fas fa-users-class fa-3x text-white"></i>
              </div>
              {{-- <div id="spark2"></div> --}}
            </div>
          </div>
          <div class="col-md-3">
            <div class="box box3">
              <div class="details">
                <h3>311</h3>
                <h4>CLIENTES EN RUTINAS</h4>
              </div>
              <div style="min-height: 80px; display: flex; justify-content: flex-end; align-items: center;">
                 <i class="fas fa-calendar-check fa-3x text-white"></i>
              </div>
              {{-- <div id="spark3"></div> --}}
            </div>
          </div>
          {{-- <div class="col-md-3">
            <div class="box box4">
              <div class="details">
                <h3>22</h3>
                <h4>SALES</h4>
              </div>
              <div id="spark4"></div>
            </div>
          </div> --}}
        </div>

        {{-- <div class="row mt-4">
          <div class="col-md-5">
            <div class="box shadow mt-4">
              <div id="radialBarBottom"></div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="box shadow mt-4">
              <div id="line-adwords" class=""></div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-5">
            <div class="box shadow mt-4">
              <div id="barchart"></div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="box shadow mt-4">
              <div id="areachart"></div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</div>

@endsection