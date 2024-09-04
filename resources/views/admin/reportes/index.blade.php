@extends('layouts.app')

@section('title')
 Reportes
@endsection

@section('content')
        @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>

        @endif

    @livewire('Admin.Buscador')
@endsection

@section('script')
    {{-- Seccion para la ejecucion de codigo javascript en esta pagina --}}
<script>
    window.confirmarEliminacion = (event) => {
        event.preventDefault();

            Swal.fire({
            title: '¿Estás seguro?',
            text: "La eliminacion es permanente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía el formulario
                event.target.submit();
            }
        });
    } 
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
    $('#nuevoReporte').on('shown.bs.modal', function () {
        document.getElementById('cliente_id').addEventListener('change', function() {
            const clienteId = this.value;
            console.log(clienteId);
            const localSelect = document.getElementById('local_id');
            
            if (clienteId) {
                fetch(`/api/clientes/${clienteId}/establecimientos`)
                    .then(response => response.json())
                    .then(data => {
                        localSelect.innerHTML = '<option value="">Seleccione un local</option>';
                        data.forEach(local => {
                            const option = document.createElement('option');
                            option.value = local.id;
                            option.textContent = local.descripcion;
                            localSelect.appendChild(option);
                        });
                    });
            } else {
                localSelect.innerHTML = '<option value="">Seleccione un local</option>';
            }
        });
    });
});
</script>
@endsection

