@extends('layouts.app')

@section('content')

<div class="container">
	
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<br>

        		<div class="card text-center">
				  <div class="card-header">
				    <h3><strong>Modificacion</strong></h3>
				  </div>
				  <div class="card-body">
				    <h5 class="card-title">{{ $recurso->nombre }}</h5>

				    <form class="form" action="{{route('generarCambioRecurso')}}" method="POST" id="kt_form">
					       @csrf
						   <div class="row">
						      <input type="hidden" id="id" name="id" value="{{ $recurso->id }}">
						      <input type="hidden" id="tipo" name="tipo" value="{{ $tipo }}">
						   </div>
						   <br>
						   <div class="row">
						   	  <br>
						   	  <label><strong>Nombre:</strong></label>
						      <input class="form-control form-control-solid" id="nombre" name="nombre" type="text" value="{{ $recurso->nombre }}"/>
						    </div>
						    <br>
						    <div class="row">
						      <br>
						      <label><strong>Objetivo:</strong></label>
						      <input class="form-control form-control-solid" id="objetivo" name="objetivo" type="text" value="{{ $recurso->objetivo }}"/>
						    </div>
						    <br>

				  </div>
				  <div class="card-footer text-muted">
				    <button type="submit" class="btn btn-primary">Modificar</button> 
				    </form>
				    <a href="{{route('borrarRecursos', [ 'tipo' => $tipo, 'id' => $recurso->id] )}}" class="btn btn-danger">Borrar</a>
				  </div>
				</div>

			<br>
        </div>
    </div>
</div>

@endsection