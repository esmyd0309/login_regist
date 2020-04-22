<!DOCTYPE html>
<html>
<head>
    <title>Test de Crud Persona</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <a class="nav-link" data-toggle="dropdown" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
{{ __('Logout') }}>
<span class="cerrar">CERRAR CESION</span>
<i class="right fas fa-power-off"></i>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>   
    <div class="container">
        <h1>Test de Crud Persona</h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Crear Nuevo Registro</a><br>

    
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>specialist</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="persona_id" id="persona_id" >

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control"  required id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" required id="email" name="email" placeholder="Enter email" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" required id="phone" name="phone" placeholder="Enter phone" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Specialist</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" required id="specialist" name="specialist" placeholder="Enter specialist" value="" maxlength="50" required="">
                            </div>
                        </div>
                    
        
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
   
<script type="text/javascript">
 $(function () {
     
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
   });
   var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('persona.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'specialist', name: 'specialist'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
   
    
   $('#createNewProduct').click(function () {
       $('#saveBtn').val("create-product");
       $('#persona_id').val('');
       $('#productForm').trigger("reset");
       $('#modelHeading').html("Crear nuevo Registro");
       $('#ajaxModel').modal('show');
   });
   
   $('body').on('click', '.editProduct', function () {
     var persona_id = $(this).data('id');
    
     $.get("{{ route('persona.index') }}" +'/' + persona_id +'/edit', function (data) {
         $('#modelHeading').html("Editar Registro");
         $('#saveBtn').val("edit-persona");
         $('#ajaxModel').modal('show');
         $('#persona_id').val(data.id);
         $('#name').val(data.name);
         $('#email').val(data.email);
         $('#phone').val(data.phone);
         $('#specialist').val(data.specialist);
     })
  });
   
   $('#saveBtn').click(function (e) {
       e.preventDefault();
       $(this).html('Enviar..');
   
       $.ajax({
         data: $('#productForm').serialize(),
         url: "{{ route('persona.store') }}",
         type: "POST",
         dataType: 'json',
         success: function (data) {
    
             $('#productForm').trigger("reset");
             $('#ajaxModel').modal('hide');
             table.draw();
        
         },
         error: function (data) {
              
            alert('Comprete el Formulario.');
             console.log('Error:', data);
            
             $('#saveBtn').html('Guardar');
         }
     });
   });
   
   $('body').on('click', '.deleteProduct', function () {
    
       var persona_id = $(this).data("id");
       confirm("Seguro que desea eliminar este Registro !");
     
       $.ajax({
           type: "DELETE",
           url: "{{ route('persona.store') }}"+'/'+persona_id,
           success: function (data) {
               table.draw();
           },
           error: function (data) {
               console.log('Error:', data);
           }
       });
   });
    
 });


</script>
</html>