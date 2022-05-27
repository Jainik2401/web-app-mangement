<?php include 'header.php'; ?>
    <div class="page-title-box">
        <div class="row align-items-center">
            
            <div class="col-sm-6">
                <h4 class="page-title">App Management </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">App Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Application listing</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">                   
                                     
                    <table id="applisting_table" class="table table-hover table-bordered dt-responsive nowrap" >
                        <thead>
                            <tr>
                              <th>App Logo</th>
                              <th>App Name</th>
                              <th>Company Name</th>
                              <th>Category</th>
                              <th>Status</th>
                              <th width="10px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>                              
                              <th>App Logo</th>
                              <th>App Name</th>
                              <th>Company Name</th>
                              <th>Category</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>                      
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row --> 
<?php include 'footerscripts.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    var table =  $('#applisting_table').DataTable({
      "ajax":{
        "url": "application_processing.php",
        "type": "POST",
        "data": function(data){}
      },
      'order': [[1, 'asc']],
      'searching': true,
      'autoWidth': false,
      'columnDefs': [{
        'targets': [0,  5], /* column index */
        'orderable': false, /* true or false */
      },
      {
        'targets': [4,5], /* column index */
        'searchable': false, /* true or false */
      }
      ]
  });

$(document).delegate('.delete','click',function(e){
      e.preventDefault();
      var id= $(this).data('id');

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, deletede it!',

        }).then((result) => 
        {
          if(result.value){
          $.ajax({
             url: 'delete_new_app.php',
             type: 'POST',           
             data:  {'application_id': id},  
             dataType: 'json',
             success: function(response){ 
              if(response.sucess){
                table.ajax.reload();
                Swal.fire('Deleted!',
                'Your file has been deleted.',
                'success')
              }
            }
          });

        }else{
            return;
        }
        });
    }); 
});
    

</script>

<?php include 'footer.php'; ?>