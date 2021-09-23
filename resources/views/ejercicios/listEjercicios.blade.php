@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $(document).ready(function() {
        $('#grupo_muscular').select2({
            theme: 'bootstrap4',
            dropdownParent: $("#modal")
        });
    });

    function mostrarEjercicios(rutina_id){
        if ($('#ejercicios-'+rutina_id).attr('hidden')) {
            $('#ejercicios-'+rutina_id).removeAttr('hidden');
        } else {
            $('#ejercicios-'+rutina_id).attr('hidden',"true");
        }
    }
</script>

<script>
  function detailFormatter(index, row) {
    var html = []
    $.each(row, function (key, value) {
      html.push('<p><b>' + key + ':</b> ' + value + '</p>')
    })
    return html.join('')
  };

  window.ajaxOptions = {
    beforeSend: function (xhr) {
      xhr.setRequestHeader('XSRF-TOKEN', "{{ csrf_token() }}")
    }
  };

  function nuevoGrupoMuscular(){
    $('.select2').attr('hidden',"true");
    $('#botonNuevoGM').attr('hidden',"true");
    $('#botonAtrasGM').removeAttr('hidden');
    $('#nuevo_grupo_muscular').removeAttr('hidden');
  };

  function atrasNuevoGrupoMuscular(){
    $('.select2').removeAttr('hidden');
    $('#botonNuevoGM').removeAttr('hidden');
    $('#nuevo_grupo_muscular').val(null);
    $('#nuevo_grupo_muscular').attr('hidden',"true");
    $('#botonAtrasGM').attr('hidden',"true");
  };

  // xhr.setRequestHeader('XSRF-TOKEN', @csrf)
</script>

{{-- <div class="container bg-white" style="overflow: scroll;"> --}}
    {{-- <div class="row justify-content-center"> --}}
        <div class="card" style="overflow: scroll;">
            <div class="card-header">
                <div class="row">
                    <div class="col-auto mr-auto">Ejercicios</div>
                    <div class="col-auto">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Crear</button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                    @if(isset($ejercicios))
                        <table
                          id="table"
                          data-toggle="table"
                          data-height="460"
                          {{-- data-detail-view="true"
                          data-detail-formatter="detailFormatter" --}}
                          data-ajax-options="ajaxOptions"
                          data-url="{{ route('lista_ejercicios') }}">
                          <thead>
                            <tr>
                              {{-- <th data-field="id">ID</th> --}}
                              <th data-field="nombre">Nombre ejercicio</th>
                              <th data-field="grupo_muscular">Grupo muscular</th>
                            </tr>
                          </thead>
                          {{-- <tbody>
                                @foreach ($ejercicios as $ejercicio)
                                    <tr>
                                        <td>{{ $ejercicio->id }}</td>
                                        <td>{{ $ejercicio->nombre }}</td>
                                        <td>{{ $ejercicio->grupo_muscular }}</td>
                                    </tr>
                                @endforeach
                          </tbody> --}}
                        </table>
                    {{-- @else
                        <div>No hay ejercicios cargados</div> --}}
                    @endif


            </div>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="POST" action="{{ route('ejercicio_crear') }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            @csrf
                            <h4>Crear ejercicio</h4>

                            <br />
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">

                            <br />
                            <div class="form-group d-flex justify-content-between">
                                <label for="grupo_muscular" class="col-form-label">Grupo muscular:</label>
                                <span class="btn btn-outline-info" id="botonNuevoGM" onclick="nuevoGrupoMuscular();">Nuevo</span>
                                <span class="btn btn-outline-info" id="botonAtrasGM" hidden onclick="atrasNuevoGrupoMuscular();">Atrás</span>
                            </div>
                            <select id="grupo_muscular" name="grupo_muscular" class="form-control custom-select select2" style="width: 100%;">
                                <option selected>Seleccionar</option>
                                @foreach($grupos_musculares as $grupo_muscular)
                                    <option value="{{ $grupo_muscular->id }}">{{ $grupo_muscular->nombre }}</option>
                                @endforeach
                            </select>

                            <input type="text" hidden class="form-control" name="nuevo_grupo_muscular" id="nuevo_grupo_muscular">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="crear_rutina">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
 {{--    </div>
</div> --}}

@endsection