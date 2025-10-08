@extends('layouts.app')

@section('contenido')
<div class="contenido-interno">
    <div class="header-lista">
        <h2>✏️ Editar producto</h2>
    </div>        

    @if(session('success'))
        <div id="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="error-mensaje;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach    
            </ul>
        </div>
    @endif
    <form action="{{ route('productos.update', $productos->id) }}" method="POST" class="formulario">
        <h2></h2>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $productos->nombre)}}" required>
            <br><br>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio', $productos->precio)}}" required>
            <br><br>
        </div>

        <div class="form-group">    
            <label for="stock">Stock:</label>
            <input type="number" name="stock" value="{{ old('stock', $productos->stock)}}" required>
            <br><br>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-guardar">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn-volver">Regresar</a>
        </div>
    </form>
    <br>
</div>
@endsection
