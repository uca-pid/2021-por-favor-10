@extends('layouts.app')

@section('content')

<div class="container">
	
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<br>

	        	<div class="list-group">

					  <a class="list-group-item list-group-item-action flex-column align-items-start active">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Modificacion Recursos-Clases</h5>
					    </div>
					    <p class="mb-1">Aca podemos modificar los Recursos-Clases</p>
					  </a>
					    @foreach ($recursosclases as $recursoclase)

						  <a href="{{route('recursoaEditar', [ 'id' => $recursoclase->id , 'tipo' => 'clases' ])}}" class="list-group-item list-group-item-action flex-column align-items-start">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">{{$recursoclase->nombre}}</h5>
						    </div>
						    <p class="mb-1">Objetivo: {{$recursoclase->objetivo}} Porcentaje: {{$recursoclase->ocupacion}}%</p>
						    <small class="text-muted">Actual: {{$recursoclase->real}}</small>
						  </a>

					 	@endforeach

				</div>
				<br>
				<br>
				<div class="list-group">

					  <a class="list-group-item list-group-item-action flex-column align-items-start active">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Modificacion Recursos-Ejercicios</h5>
					    </div>
					    <p class="mb-1">Aca podemos modificar los Recursos-Ejercicios</p>
					  </a>
					    @foreach ($recursosejercicios as $recursoejercicio)

						  <a href="{{route('recursoaEditar', [ 'id' => $recursoejercicio->id , 'tipo' => 'ejercicios' ])}}" class="list-group-item list-group-item-action flex-column align-items-start">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">{{$recursoejercicio->nombre}}</h5>
						    </div>
						    <p class="mb-1">Objetivo: {{$recursoejercicio->objetivo}} Porcentaje: {{$recursoejercicio->ocupacion}}%</p>
						    <small class="text-muted">Actual: {{$recursoejercicio->real}}</small>
						  </a>

					 	@endforeach

				</div>

			<br>
        </div>
    </div>
</div>

@endsection