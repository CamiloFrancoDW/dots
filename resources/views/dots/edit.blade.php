@extends('layout')

@section('content')
<!--Dots zone-->
<div class="table">
    <svg height="1100px" width="400px" class="table">       
        <ellipse cx="{{$dot->axis_x}}" cy="{{$dot->axis_y}}" rx="20" ry="20" class="circle"/>
        <text x="{{$dot->axis_x-5}}" y="{{$dot->axis_y+2.5}}" class="numbers-dots">{{$dot->id}}</text>                
    </svg>        
</div>

<!--Dashboard-->
<div class="container center d-flex justify-content-center">

    <div>      
    <h6>Editar dot</h6>
<!--Error message-->    
        <ul class="errors">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
<!--form edit-->
        <form action="{{ route('dots.update', $dot->id) }}" method="post">
        @csrf
        @method('PATCH')
            <div class="form-group edit-form">
                <label for="axis_x">Ingrese un número entre 1 y 1300 (coordenada X):</label>
                <input type="text" name="axis_x" value="{{$dot->axis_x}}">
            </div>
            <div class="form-group edit-form">
                <label for="axis_y"> Ingrese un número entre 20 y 450 (coordenada Y):</label>
                <input type="text" name="axis_y" value="{{$dot->axis_y}}">          
            </div>
                <button type="submit" class="btn btn-primary">Actualizar posicion</button>        
        </form>         
    </div>
    
    <div>
        <h6>Eliminar dot</h6>
            <form action="{{ route('dots.destroy', [$dot->id]) }}" method="POST">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger">Delete dot</button>
            </form>
    </div> 
    <div>
        <h6>Dots cercanos</h6>
        <label for="">Cant. dots:</label><input type="text">
        <a href="{{ route('nearby', $dot->id)}}" class="btn btn-primary">Buscar dots</a>
    </div>   
</div>
    

@endsection