@extends('layouts.app')

@section('content')

<div class="container">
	
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<br>

        		<div class="card text-center">
				  <div class="card-header">
				    <h3><strong>Agregar Usuario a Clase</strong></h3>
				  </div>
				  <div class="card-body">
				    <h5 class="card-title"></h5>

				    <form class="form" action="{{ route('agregarUsuariosClases') }}" method="POST" id="kt_form">
					       @csrf
						   <div class="row">
						      <input type="hidden" id="id" name="id" value="">
						   </div>
						   <br>
						   <div class="row">
						   	  <br>
						   	  <label><strong>Clase:</strong></label>
						      <select class="form-control" name="clase" id="clase">
						 	  	@foreach ($clases as $clase)

								    <option value="{{$clase->id}}">{{$clase->title}}  {{$clase->start}}-{{$clase->end}}</option>

					 			@endforeach     										 		
						      </select>
						    </div>
						    <br>
						    <div class="row">
						      <br>
						      <label><strong>Usuario:</strong></label>
						      <select class="form-control" name="user" id="user">
						 	  	@foreach ($usuarios as $usuarios)

								    <option value="{{$usuarios->id}}">{{$usuarios->name}} - {{$usuarios->email}}</option>

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

<script>
	$(document).ready(function() {
    	$('#itemClase').select2();
	});
</script>

@endsection