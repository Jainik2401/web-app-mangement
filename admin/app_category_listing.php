<?php include 'header.php'; ?>
    <div class="page-title-box">
        <div class="row align-items-center">
            
            <div class="col-sm-6">
                <h4 class="page-title">App Category</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">App Catagory</a></li>
        			<li class="breadcrumb-item active" aria-current="page">Catagory listing</li>
                </ol>

            </div>
        </div>
    </div>

	<div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">                   
                                     
                    <table id="catagory_table" class="table table-hover table-bordered dt-responsive nowrap" >
                        <thead>
                            <tr>
                              <th width="10px">Sr.No</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th width="10px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                              <th>Sr.No</th>
                              <th>Category Name</th>
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
    var table =  $('#catagory_table').DataTable({
      "ajax":{
        "url": "category_processing.php",
        "type": "POST",
        "data": function(data){}
      },
      'order': [[1, 'asc']],
      'searching': true,
      'autoWidth': false,

      'columnDefs': [{
        'targets': [0,3], /* column index */
        'orderable': false, /* true or false */
      },
      {
        'targets': [2,3], /* column index */
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
             url: 'delete_app_category.php',
             type: 'POST',           
             data:  {'category_id': id},  
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