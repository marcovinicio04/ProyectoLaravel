
@extends('layouts.app')

@section('contenido')
<div class="contenido-interno">
    <div class="header-lista">
        <h2>+ Agregar producto</h2>
    </div>
    @if(session('success'))
        <div id="success-message">
            {{ session('success') }}
        </div>
    @endif


    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST" class="formulario">
        <h2></h2>
        @csrf
                
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre')}}" required>
            <br><br>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio')}}"required>
            <br><br>
        </div>

        <div class="form-group"> 
            <label for="stock">Stock:</label>
            <input type="number" name="stock" value="{{ old('stock')}}" required>
            <br><br>
        </div> 

        <div class="form-actions">
            <button type="submit" class="btn-guardar">Guardar</button>      
            <a href="{{ route('productos.index') }}" class="btn-volver">Regresar</a>
        </div>   
    </form>
</div>      
@endsection
