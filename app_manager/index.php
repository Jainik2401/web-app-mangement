<?php include 'header.php'; 
include 'function.php';?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
    <p class="pt-3 ses-name"> Hi, <span class=" text-uppercase"><?php echo $_SESSION['firstname']; ?></span> Welcome to EASY APP. </p>
    <div class="page-title-box dashboard">
        <div class="row align-items-center">
            
            <div class="col-sm-6">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>                            
        
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets/images/services-icon/01.png" alt="" >
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Total Application</h5>
                            <h4 class="font-500"><span class="count"><?php echo $result=totalapp($_SESSION['app_manager_id'])?></span></h4> 
                            </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Total Application</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets/images/services-icon/02.png" alt="" >
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Active Application</h5>
                            <h4 class="font-500"><span class="count"><?php echo $result=totalActiveapp($_SESSION['app_manager_id'])?></span></h4>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>

                            <p class="text-white-50 mb-0">Active Application</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="assets/images/services-icon/03.png" alt="" >
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Deactvie Application</h5>
                            <h4 class="font-500"><span class="count"><?php echo $result=totaldeactiveapp($_SESSION['app_manager_id'])?></span></h4>
                            
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                            <p class="text-white-50 mb-0">Deactvie Application</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end row -->
        

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Latest Application</h4>
                        <div class="table-responsive">
                            <table id="applisting_table" class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="2">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <!-- end row -->
  
<?php include 'footerscripts.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 2500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    })

    var table =  $('#applisting_table').DataTable({
      "ajax":{
        "url": "application_processing.php",
        "type": "POST",
        "data": function(data){
            data.limit='5'
            }
      },
        'order': [[0, '']],
        'searching': false,
        "paging": false,
        "bInfo" : false,
        'autoWidth': false,
        'columnDefs': [{
        'targets': [0,1,2,3,4, 5], /* column index */
        'orderable': false, /* true or false */
      },      
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
               
       