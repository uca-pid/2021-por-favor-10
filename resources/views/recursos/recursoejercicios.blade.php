@extends('layouts.app')

@section('content')

<div class="container">

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="POST" action="{{ route('crearRecursoEjercicio') }}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            @csrf
                            <h4>Crear Recurso</h4>

                            <br />
                            <label for="nombre_rec">Nombre:</label>
                            <input type="text" class="form-control" name="nombre_rec" id="nombre_rec">
                            <br />
                            <label for="objetivo_rec">Cantidad personas:</label>
                            <input type=number class="form-control" min=0 max=1000 name="objetivo_rec" id="objetivo_rec">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="crear_recurso">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>

                <div class="card text-center">
                  <div class="card-header">
                    <div class="row">
                        <div class="col-auto mr-auto d-flex mb-0 align-items-center">
                            <h3 class="mb-0">Agregar Ejercicio a Recurso</h3>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Crear</button>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"></h5>

                    <form class="form" action="{{ route('agregarEjercicioRecurso') }}" method="POST" id="kt_form">
                           @csrf
                           <div class="row">
                           </div>
                           <br>
                           <div class="row">
                              <br>
                              <label><strong>Ejercicio:</strong></label>
                              <select class="form-control" name="ejercicio" id="ejercicio">
                                @foreach ($ejercicios as $ejercicio)

                                    <option value="{{$ejercicio->id}}">{{$ejercicio->nombre}}</option>

                                @endforeach                                                    
                              </select>
                            </div>
                            <br>
                            <div class="row">
                              <br>
                              <label><strong>Recurso:</strong></label>
                              <select class="form-control" name="recurso" id="recurso">
                                @foreach ($recursos as $recurso)

                                    <option value="{{$recurso->id}}">{{$recurso->nombre}} - {{$recurso->objetivo}}</option>

                                @endforeach                      
                              </select>
                           </div>
                        <br>                               
                  </div>
                  <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-success">Agregar</button> 
                    </form>
                  </div>
                </div>

            <br>
        </div>
    </div>
</div>

@endsection