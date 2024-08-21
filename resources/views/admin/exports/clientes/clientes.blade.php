<table class="table table-striped">
    <thead>
        <tr>
            <td class="fw-bold">ID</td>
            <td class="fw-bold">Nombre Cliente</td>
            <td class="fw-bold" colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
            </tr>
        @endforeach
    </tbody>

</table>