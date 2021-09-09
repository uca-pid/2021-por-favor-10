@extends('layouts.app')

@section('content')

<div class="container">
	
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<br>

	        	<div class="list-group">

					  <a class="list-group-item list-group-item-action flex-column align-items-start active">
					    <div class="d-flex w-100 justify-content-between">
					      <h5 class="mb-1">Modificacion</h5>
					    </div>
					    <p class="mb-1">Aca podemos modificar y borrar las clases cargadas</p>
					  </a>
					    @foreach ($editables as $editable)

						  <a href="{{route('modificarClase',$editable->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-1">{{$editable->title}}</h5>
						    </div>
						    <p class="mb-1">Dia: {{$editable->day}} Horarios: {{$editable->start}}-{{$editable->end}}</p>
						    <small class="text-muted">{{$editable->color}}</small>
						  </a>

					 	@endforeach

				</div>
			<br>
        </div>
    </div>
</div>

@endsection