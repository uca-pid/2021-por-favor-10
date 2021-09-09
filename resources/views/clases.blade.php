@extends('layouts.app')

@section('content')

    <script>
    
        document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                        events: {
                            url: '{{ route('clasesCargadas') }}',
                            method: 'GET',
                        },
                        initialView: 'dayGridWeek',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'addEventButton',
                            right: 'timeGridWeek,timeGridDay,listWeek',
                        },
                        selectable: true,
                        nowIndicator: true,
                        dayMaxEvents: true,
                        customButtons: {
                                addEventButton: {
                                  text: 'Agregar clase',
                                  click: async function() {
                                    var titleOfEvent = await Swal.fire({
                                                          title: 'Escribir nombre de la clase',
                                                          input: 'text',
                                                          inputLabel: 'Nombre de la clase',
                                                          showCancelButton: true,
                                                          inputValidator: (value) => {
                                                            if (!value) {
                                                              return 'La clase tiene que tener nombre!'
                                                            }
                                                          }
                                                        });
                                    var dayOfEvent = await Swal.fire({
                                                      title: 'Seleccionar el dia de la clase',
                                                      input: 'select',
                                                      inputOptions: {
                                                        'Dias': {
                                                          '1': 'Lunes',
                                                          '2': 'Martes',
                                                          '3': 'Miercoles',
                                                          '4': 'Jueves',
                                                          '5': 'Viernes',
                                                          '6': 'Sabado',                                                            
                                                          '0': 'Domingo',                                                    
                                                        }
                                                      },
                                                      showCancelButton: true
                                                    });
                                    var tStart = await Swal.fire({
                                                          title: 'Hora inicio de la clase',
                                                          input: 'text',
                                                          inputLabel: '9:00',
                                                          showCancelButton: true,
                                                          inputValidator: (value) => {
                                                            if (!value) {
                                                              return 'Tiene que escribir un horario!'
                                                            }
                                                          }
                                                        });
                                    var tEnd = await Swal.fire({
                                                          title: 'Hora fin de la clase',
                                                          input: 'text',
                                                          inputLabel: '11:00',
                                                          showCancelButton: true,
                                                          inputValidator: (value) => {
                                                            if (!value) {
                                                              return 'Tiene que escribir un horario!'
                                                            }
                                                          }
                                                        });
                                    if (true) { // valid?
                                        calendar.addEvent({
                                            title: titleOfEvent.value,
                                            startTime: tStart.value,
                                            endTime: tEnd.value,
                                            allDay: false,
                                            daysOfWeek: [ dayOfEvent.value ],
                                        });
                                        $.ajax({
                                          url:"{{ route('cargarClase') }}",
                                          type:"POST",
                                          data:{
                                            "_token":"{{ csrf_token() }}",
                                            "title":titleOfEvent.value,
                                            "startTime":tStart.value,
                                            "endTime":tEnd.value,
                                            "daysOfWeek":dayOfEvent.value,                        
                                          },
                                          success:function(response){
                                            console.log(response)
                                          },
                                          error: function(xhr, textStatus, error){
                                          }
                                        });

                                    } else {
                                      //alert('Invalid date.');
                                    }
                                  }
                                }
                        }
                });
                calendar.setOption('locale', 'es');
                calendar.render();
                //var today = new Date('2021-09-10T08:00:00');
                //var today2 = new Date('2021-09-10T10:00:00');
                calendar.addEvent({
                    title: 'hola',
                    startTime: '8:00',
                    endTime: '10:00',
                    allDay: false,
                    daysOfWeek: [ 5 ],
                });
        });
       
    </script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div id="calendar"></div>
        </div>
    </div>
</div>

@endsection

{{-- Scripts Section --}}
@section('scripts')



@endsection