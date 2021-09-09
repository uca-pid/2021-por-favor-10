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
				    <h5 class="card-title">{{ $editable->title }}</h5>

				    <form class="form" action="{{route('generarCambios')}}" method="POST" id="kt_form">
					       @csrf
						   <div class="row">
						      <input type="hidden" id="id" name="id" value="{{ ($editable)->id }}">
						   </div>
						   <br>
						   <div class="row">
						   	  <br>
						   	  <label><strong>Titulo:</strong></label>
						      <input class="form-control form-control-solid" id="titulo" name="titulo" type="text" value="{{ ($editable)->title }}"/>
						    </div>
						    <br>
						    <div class="row">
						      <br>
						      <label><strong>Hora inicio:</strong></label>
						      <input class="form-control form-control-solid" id="start" name="start" type="text" value="{{ ($editable)->start }}"/>
						    </div>
						    <br>
						    <div class="row">
						      <br>
						      <label><strong>Hora fin:</strong></label>
						      <br>
						      <input class="form-control form-control-solid" id="end" name="end" type="text" value="{{ ($editable)->end }}"/>
						    </div>
						    <br>
						    <div class="row">
						      <br>
						      <label><strong>Dia:</strong></label>
						      <input class="form-control form-control-solid" id="day" name="day" type="text" value="{{ ($editable)->day }}"/>
						    </div>
						    <br>
						       
				  </div>
				  <div class="card-footer text-muted">
				    <button type="submit" class="btn btn-primary">Modificar</button> 
				    </form>
				    <a href="{{route('borrarClase',$editable->id)}}" class="btn btn-danger">Borrar</a>
				  </div>
				</div>

			<br>
        </div>
    </div>
</div>

@endsection