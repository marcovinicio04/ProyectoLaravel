@extends('layouts.app')

@section('contenido')
    
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

    <div class="contenido-interno">
        <div class="header-lista">
            <h2> 📋 Lista de Productos</h2>
        </div>
        
        
        <div class="acciones-superiores">
            <a href="{{ route('productos.create') }}" class="boton-agregar">+ Agregar Producto</a>
        </div>     

        <div class="tabla-responsive">
            <table class="tabla-productos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th class="acciones">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $productos)
                        <tr>
                            <td>{{ $productos->id }}</td>
                            <td>{{ $productos->nombre }}</td>
                            <td>{{ $productos->precio }}</td>
                            <td>{{ $productos->stock }}</td>
                            <td>
                                <form action="{{ route('productos.edit', $productos->id) }}" method="GET" style="display:inline;">
                                    <button type="submit" class="btn-editar">✏️ Editar</button>
                                </form>

                                <form onsubmit="event.preventDefault(); abrirModal(this);" action="{{ route('productos.destroy', $productos->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-eliminar">🗑️ Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal-confirmacion" class="modal" style="display: none;">
        <div class="modal-contenido">
            <p>🗑️ ¿Estás seguro de que quieres eliminar este producto?</p>
            <form id="form-eliminar" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-eliminar">Eliminar</button>
                <button type="button" class="btn-cancelar" onclick="cerrarModal()">Cancelar</button>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        function abrirModal(form) {
            const modal = document.getElementById('modal-confirmacion');
            const formEliminar = document.getElementById('form-eliminar');
            formEliminar.action = form.action;
            modal.style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modal-confirmacion').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('modal-confirmacion');
            if (event.target === modal) {
                cerrarModal();
            }
        }
    </script>
@endsection
