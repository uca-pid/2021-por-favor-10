@extends('layouts.app')

@section('content')

<div class="container">
	
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<br>

    		<div class="card text-center">
			  <div class="card-header">
			    <h3><strong>Cantidad de Usuarios en Clase</strong></h3>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"></h5>
			    		<form method="GET" role="form" id="postClase">
              			@csrf
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
					    <div class="row" id="resultadosClase">
					      
					   </div>
					<br>						       
			  </div>
			  <div class="card-footer text-muted">
			    <button type="button" class="btn btn-primary" id="submitClase" name="submitClase">Buscar</button>
				</form>
			  </div>
			</div>

			<br>

    		<div class="card text-center">
			  <div class="card-header">
			    <h3><strong>Usuarios inscriptos en Clase</strong></h3>
			  </div>
			  <div class="card-body">
			    <h5 class="card-title"></h5>
			    		<form method="GET" role="form" id="postUser">
              			@csrf
					   <br>
					    <div class="row">
					      <br>
					      <label><strong>Usuario:</strong></label>
					      <select class="form-control" name="user" id="user">

					 	  	@foreach ($usuarios as $usuarios)

							    <option value="{{$usuarios->id}}">{{$usuarios->nombre}} - {{$usuarios->email}}</option>

				 			@endforeach 

					      </select>
					   </div>
					   <br>
					   <div class="row" id="resultadosUser">
					      
					   </div>
					<br>						       
			  </div>
			  <div class="card-footer text-muted">
			    <button type="button" class="btn btn-primary" id="submitUser" name="submitUser">Buscar</button>
			    </form> 
			  </div>
			</div>

		<br>

        </div>
    </div>
</div>

{{-- <script>
	$(document).ready(function() {
    	$('#itemClase').select2();
	});
</script>

<script type="text/javascript">
      $("form").on("submit", function (e) {
      var data = $(this).serialize();
      $.ajax({
        type: "POST",
        URL: "{{ route('dynamicsroomsend', ['name' => $name, 'code' => $code]) }}",
        data: data,
        success: function () {
          console.log("funciona");
        }
      });
   
      e.preventDefault();
      });
    </script> --}}

<script type="text/javascript">

    $('#submitClase').click(function() {
    	var clase = $('#clase').val();
    	$.ajax({
	      url:"/estadisticasClases/"+clase,
	      type:"GET",
	      data:{
	        "_token":"{{ csrf_token() }}",
	        "clase":clase,
	      },
	      success:function(response){
	        //alert(response);
	        $("#resultadosClase").empty();
	        $('#resultadosClase').append('<p><strong>Cantidad de inscriptos: '+response+'</strong></p>');   
	      },
	      error: function(xhr, textStatus, error){
	      }
	    });

	});

    $('#submitUser').click(function() {
    	var user = $('#user').val();
    	$.ajax({
	      url:"/estadisticasUsers/"+user,
	      type:"GET",
	      data:{
	        "_token":"{{ csrf_token() }}",
	        "user":user,
	      },
	      success:function(response){
	        //alert(response);
	        $("#resultadosUser").empty();
	        $('#resultadosUser').append('<p><strong>Clases donde esta inscripto el usuario: '+response+'</strong></p>');   
	      },
	      error: function(xhr, textStatus, error){
	      }
	    });

	});


</script>

@endsection