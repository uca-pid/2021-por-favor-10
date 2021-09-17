@extends('layouts.app')

@section('content')

<script type="text/javascript">
    function mostrarEjercicios(rutina_id){
        if ($('#ejercicios_'+rutina_id).attr('hidden')) {
            $('#ejercicios_'+rutina_id).removeAttr('hidden');
        } else {
            $('#ejercicios_'+rutina_id).attr('hidden',"true");
        }
    };

    function añadirEjercicio(dia){
        var html = $(".copy").html();
        html = ($(html).find('select[name]').attr('name','ejercicios_'+dia+'[]')).prevObject;
        html = ($(html).find('input[name]').attr('name','repeticiones_'+dia+'[]')).prevObject;
        $("#"+dia).append(html);
    };

    function eliminarEjercicio(boton){
        $(boton).parents(".control-group .removable").remove();
    };
</script>


        <div class="card" style="overflow: scroll;">
            <div class="card-header">
                <div class="row">
                    <div class="col-auto mr-auto">Rutinas</div>
                    <div class="col-auto">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Crear</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @if(isset($rutinas))
                        @foreach ($rutinas as $rutina)
                            <div class="rutina col-md-4 mb-5" id="{{ $rutina->id }}" onclick="mostrarEjercicios({{ $rutina->id }})">
                                <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                                 <div class="card-body">
                                  <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    <path d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                            {{ $rutina->nombre }}
                                        </a>
                                        <div class="text-dark-75">
                                            ...
                                        </div>
                                        <div id="ejercicios_{{ $rutina->id }}" class="ejercicios" hidden="">
                                            <table class="table">
                                                <thead>
                                                    <th>Día</th>
                                                    <th>Nombre ejercicio</th>
                                                    <th>Cant. repeticiones</th>
                                                </thead>
                                                <tbody>
                                                    @foreach(json_decode($rutina->ejercicios) as $dia=>$ejercicios_dia)
                                                        <tr>
                                                            <td>{{ $dia }}</td>
                                                            <td>
                                                                @if(!empty($ejercicios_dia))
                                                                    @foreach($ejercicios_dia as $ej_rep)
                                                                        @foreach($ejercicios as $ej)
                                                                            @if($ej->id == $ej_rep->ejercicio_id)
                                                                                {{ $ej->nombre }}<br>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!empty($ejercicios_dia))
                                                                    @foreach($ejercicios_dia as $ej_rep)
                                                                        {{ $ej_rep->repeticiones }}<br>
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                  </div>
                                 </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>No hay rutinas cargadas</div>
                    @endif

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="POST" action="{{ route('rutina_crear') }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            @csrf
                            <h4>Crear rutina</h4>

                            Nombre
                            <br />
                            <input type="text" class="form-control" name="nombre" id="nombre">

                            <br />
                            Ejercicios


                            <br />
                            <label>Dia 1:</label>
                            <div class="input-group control-group after-add-more" id="dia1">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia1[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia1[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia1')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                            <br />
                            <label>Dia 2:</label>
                            <div class="input-group control-group after-add-more" id="dia2">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia2[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia2[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia2')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                            <br />
                            <label>Dia 3:</label>
                            <div class="input-group control-group after-add-more" id="dia3">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia3[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia3[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia3')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                            <br />
                            <label>Dia 4:</label>
                            <div class="input-group control-group after-add-more" id="dia4">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia4[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia4[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia4')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                            <br />
                            <label>Dia 5:</label>
                            <div class="input-group control-group after-add-more" id="dia5">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia5[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia5[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia5')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                            <br />
                            <label>Dia 6:</label>
                            <div class="input-group control-group after-add-more" id="dia6">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia6[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia6[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia6')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                            <br />
                            <label>Dia 7:</label>
                            <div class="input-group control-group after-add-more" id="dia7">
                              {{-- <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here"> --}}

                                <select class="form-control" name="ejercicios_dia7[]">
                                    <option value="" selected hidden>Seleccione un ejercicio</option>
                                    @foreach($ejercicios as $ejercicio)
                                        <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="repeticiones_dia7[]">

                              <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('dia7')"><i class="fas fa-plus"></i> Añadir</button>
                              </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="crear_rutina">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="copy" style="visibility: hidden;">
          <div class="control-group input-group removable" style="margin-top:10px">
            <select class="form-control" name="ejercicios_[]">
                <option value="" selected hidden>Seleccione un ejercicio</option>
                @foreach($ejercicios as $ejercicio)
                    <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="repeticiones_[]">

            <div class="input-group-btn">
              <button class="btn btn-danger remove" type="button" onclick="eliminarEjercicio(this)"><i class="far fa-trash-alt"></i> Eliminar</button>
            </div>
          </div>
        </div>

@endsection