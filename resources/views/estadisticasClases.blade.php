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
			  </div>
			  <div class="card-footer text-muted">
			    <button type="submit" class="btn btn-primary" id="submitClase">Buscar</button>
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

							    <option value="{{$usuarios->id}}">{{$usuarios->name}} - {{$usuarios->email}}</option>

				 			@endforeach 

					      </select>
					   </div>
					   <div class="row">
					      
					   </div>
					<br>						       
			  </div>
			  <div class="card-footer text-muted">
			    <button type="submit" class="btn btn-primary" id="submitUser">Buscar</button>
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

    $('#postClase').submit(function(e){

        var clase = $('#clase').val();
        var _token = $("input[name=_token]").val();

        //alert(clase);

        $.ajax({
          url:"{{ route('cantUsersClase', ['clase' => clase ]) }}",
          type:"GET",
          data:{
            clase:clase
            _token:_token
          },
          success:function(response){
            console.log(response)
          },
          error: function(xhr, textStatus, error){
          }
        })
    })

</script>

@endsection