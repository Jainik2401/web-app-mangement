<?php include 'header.php'; ?>
	<div class="page-title-box">
	    <div class="row align-items-center">
	    	<div class="col-sm-6">
	            <h4 class="page-title">Inquiry</h4>
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item active"><a href="inquiry.php">Inquiry</a></li>
	            </ol>
			</div>
	    </div>
	</div>

	<div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">                   
                                     
                    <table id="inquiry_table" class="table table-hover table-bordered dt-responsive nowrap" >
                        <thead>
                            <tr>
                              <th width="10px">Sr.No</th>
                              <th width="20px">Name</th>
                              <th width="10px">Email</th>
                              <th>Message</th>
                              <th width="10px">Date</th>
                              <th width="10px">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                              <th>Sr.No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Message</th>
                              <th>Date</th>
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
    var table =  $('#inquiry_table').DataTable({
      "ajax":{
        "url": "inquiry_processing.php",
        "type": "POST",
        "data": function(data){}
      },
      'searching': true,
      'autoWidth': false,
      'order': [[4, 'asc']],
      'columnDefs': [{
        'targets': [0,1,2,3,5], /* column index */
        'orderable': false, /* true or false */
      },
      {
        'targets': [3,5], /* column index */
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
            url: 'delete_inquiry.php',
            type: 'POST',           
            data:  {'inquiry_id': id},  
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