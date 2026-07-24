<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Ward Master</title>
    
     <?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

  <!-- Navbar -->
	<!-- Navbar will import here-->
    <?php include(APPPATH.'views/navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include(APPPATH.'views/sidebar.php');?>
  
  <!--sidebar will import here-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Ward Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ward Master</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		
		


      <div class="row">
         	 <div class="col-12">
          		<div class="card">
              <div class="card-header" style="color: #6c757d;">
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelWardAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD Ward</button>
                <h3 class="card-title">Ward Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Ward Name</th>
                    <th>Ward Floor</th>
                    <th>Ward No of Bed</th>
                    <th>Ward Desc</th>
                    <th>Ward Regdate - Regtime</th>
                    <th>Edit/Del/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $ward_data= $this->method_call->showWardList();
													if($ward_data!=null){
														$sr_no=1;			  
														foreach ($ward_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->ward_name; ?></td>
                    <td><?php echo $row->ward_floor; ?></td>
                    <td><?php echo $row->ward_no_of_bed; ?></td>
                    <td><?php echo $row->ward_desc; ?></td>
                    <td><?php echo $row->ward_regdate ." - ".$row->ward_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelWardEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->ward_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelWardDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->ward_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelWardView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->ward_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
                                                </li>
                                            </ul>	
					</td>
                    
                  </tr>
				  <?php  $sr_no++; 
				  } 
				
				} ?>
                   
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          	</div>
         </div>




         

      
		
		
		
		
					
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include(APPPATH.'views/footer.php');?>


</div>
<!-- ./wrapper -->




<!-- Popup Model of bootsratp-->

<!-- Add Item  Modal -->
<div class="modal fade" id="modelWardAdd" tabindex="-1" role="dialog" aria-labelledby="modelWardAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Ward
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertWard') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="ward_name" name="ward_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Floor </label>
										<div class="col-sm-12">
										<input type="number" class="form-control" id="ward_floor" name="ward_floor" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward No of Beds </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="ward_no_of_bed" name="ward_no_of_bed"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Desc</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="ward_desc" name="ward_desc"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="ward_regby" name="ward_regby" value="100100" style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

        
          

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Ward</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
            </div>




			<div class="modal fade" id="modelWardEdit" tabindex="-1" role="dialog" aria-labelledby="modelWardEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT Ward
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateWard') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Name</label>
										<div class="col-sm-12">
										
										<input type="hidden" class="form-control"   id="ward_id" name="ward_id"  style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="edit_ward_name" name="edit_ward_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
            

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Floor</label>
										<div class="col-sm-12">
										<input type="number" class="form-control" id="edit_ward_floor" name="edit_ward_floor" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;"> Ward No of Beds </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_ward_no_of_bed" name="edit_ward_no_of_bed"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Description</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_ward_desc" name="edit_ward_desc"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="edit_ward_id" name="edit_ward_id" style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Hospital</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>

        


            <div class="modal fade" id="modelWardDelete" tabindex="-1" role="dialog" aria-labelledby="modelWardDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Ward ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteWard') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete Reason</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="remove_ward_id" name="remove_ward_id" style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="ward_delreason" name="ward_delreason"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Ward</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>

            <!--Code for view-->
            <div class="modal fade" id="modelWardView" tabindex="-1" role="dialog" aria-labelledby="modelWardView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW Ward
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="#">
						
						<div class="modal-body">
							<div class="row">
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_ward_name" name="view_ward_name"  style="height: 30px;" required="required" disabled >
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Floor </label>
										<div class="col-sm-12">
										<input type="number" class="form-control" id="view_ward_floor" name="view_ward_floor" rows="3" required="required" disabled></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward No of Beds </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_ward_no_of_bed" name="view_ward_no_of_bed"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward Desc</label>
										<div class="col-sm-12">
											<input type="" class="form-control"   id="view_ward_desc" name="view_ward_desc"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>



							</div>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		



<!-- Popup Model of bootsratp-->

<!-- script will import here-->
<?php include(APPPATH.'views/script.php');?>
<script>
function editDetails(ward_id){
   // alert(ward_id);
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchWardByward_id')?>/" + ward_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="ward_id"]').val(data.ward_id);
				$('[name="edit_ward_name"]').val(data.ward_name);
				$('[name="edit_ward_floor"]').val(data.ward_floor);
				$('[name="edit_ward_no_of_bed"]').val(data.ward_no_of_bed);
				$('[name="edit_ward_desc"]').val(data.ward_desc);
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

function deleteRecored(ward_id){
   // alert(ward_id);
	$('[name="remove_ward_id"]').val(ward_id);
	
}


function showDetails(ward_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchWardByWard_id')?>/" + ward_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="view_hosp_id"]').val(data.hosp_id);
				$('[name="view_ward_name"]').val(data.ward_name);
				$('[name="view_ward_floor"]').val(data.ward_floor);
				$('[name="view_ward_no_of_bed"]').val(data.ward_no_of_bed);
				$('[name="view_ward_desc"]').val(data.ward_desc);

					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
    }

</script>

</body>
</html>