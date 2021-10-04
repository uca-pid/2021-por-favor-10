@extends('layouts.app')

@section('content')

<div class="container">
	
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<br>

        		<div class="card text-center">
				  <div class="card-header">
				    <h3><strong>Agregar Cliente a Rutina</strong></h3>
				  </div>
				  <div class="card-body">
				    <h5 class="card-title"></h5>

				    <form class="form" action="{{ route('agregarClienteRutina') }}" method="POST" id="kt_form">
					       @csrf
						   <div class="row">
						      <input type="hidden" id="id" name="id" value="">
						   </div>
						   <br>
						   <div class="row">
						   	  <br>
						   	  <label><strong>Rutina:</strong></label>
						      <select class="form-control" name="rutina" id="rutina">
						 	  	@foreach ($rutinas as $rutina)

								    <option value="{{$rutina->id}}">{{$rutina->nombre}}</option>

					 			@endforeach     										 		
						      </select>
						    </div>
						    <br>
						    <div class="row">
						      <br>
						      <label><strong>Cliente:</strong></label>
						      <select class="form-control" name="cliente" id="cliente">
						 	  	@foreach ($clientes as $cliente)

								    <option value="{{$cliente->id}}">{{$cliente->nombre}} - {{$cliente->email}}</option>

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