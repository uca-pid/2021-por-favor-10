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
        console.log(html);
        $("#"+dia).append(html);
    };

    function eliminarEjercicio(boton){
        $(boton).parents(".removable").remove();
    };
</script>

<form method="POST" action="{{ route('rutina_editar', $rutina->id) }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @csrf
                <h4>Editar rutina</h4>
                <br />
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $rutina->nombre }}">
                    </div>
                </div>

                <hr/>
                <h6>Ejercicios</h6>

                @foreach(json_decode($rutina->ejercicios) as $dia=>$ejercicios_dia)
                    <div class="form-group">
                        <label for="{{ 'dia'.$dia }}">Dia {{ $dia }}:</label>
                        <div class="control-group input-group" id="{{ 'dia'.$dia }}">
                            @foreach($ejercicios_dia as $ejercicio_dia)
                                <div class="control-group input-group removable" style="margin-top:10px">
                                    <select class="form-control" name="{{ 'ejercicios_dia'.$dia.'[]' }}">
                                        @foreach($ejercicios as $ejercicio)
                                            @if($ejercicio->id != $ejercicio_dia->ejercicio_id)
                                                <option value="{{ $ejercicio->id }}">{{ $ejercicio->nombre }}</option>
                                            @else
                                                <option value="{{ $ejercicio_dia->ejercicio_id }}" selected>{{ $ejercicio->nombre }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <input type="text" class="form-control" name="{{ 'repeticiones_dia'.$dia.'[]' }}" value="{{ $ejercicio_dia->repeticiones }}">

                                    <div class="input-group-btn">
                                        <button class="btn btn-danger remove" type="button" onclick="eliminarEjercicio(this)"><i class="far fa-trash-alt"></i> Eliminar</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br />
                        <button class="btn btn-success add-more" type="button" onclick="añadirEjercicio('{{ 'dia'.$dia }}')"><i class="fas fa-plus"></i> Añadir</button>
                    </div>
                    <hr/>
                @endforeach

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="editar_rutina">Guardar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="window.location='{{ route("rutinas") }}'">Cancelar</button>
            </div>
        </div>
    </div>
</form>

<div class="copy" style="visibility: hidden; display: none;">
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