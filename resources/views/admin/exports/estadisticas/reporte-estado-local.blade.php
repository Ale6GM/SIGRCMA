<div class="table-responsive">
   <table class="table table-striped">
       <thead>
           <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Cliente</th>
               <th>Estado Local</th>
           </tr>
       </thead>

       <tbody>
           @foreach ($data as $establecimiento)
               <tr>
                   <td>{{$establecimiento->id}}</td>
                   <td>{{$establecimiento->descripcion}}</td>
                   <td>{{$establecimiento->cliente->nombre}}</td>
                   <td>{{$establecimiento->estado->descripcion}}</td>
               </tr>
           @endforeach
       </tbody>

   </table>
</div>