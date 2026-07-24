<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Shift Master</title>
    
     <?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

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
            <h3 class="m-0">Shift Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shift Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelHospitalAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD SHIFT</button>
                <h3 class="card-title">Shift Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
					<th>Hospital Name</th>
                    <th>Shift. Name</th>
                    <th>Info</th>
                    <th>Start Time</th>
                    <th>End Time</th>
					<th>Total Hr.</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $showShiftList= $this->method_call->showShiftList();
													if($showShiftList!=null){
														$sr_no=1;			  
														foreach ($showShiftList->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->hosp_name; ?></td>
                    <td><?php echo $row->shift_name; ?></td>
                    <td><?php echo $row->shift_desc; ?></td>
                    <td><?php echo $row->shift_start_time; ?></td>
                    <td><?php echo $row->shift_end_time; ?></td>
					<td><?php echo $row->shift_total_time_in_hr; ?></td>
                    <td><?php echo $row->shift_regdate ." - ".$row->shift_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->shift_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->shift_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->shift_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
                                                </li>
                                            </ul>	
					</td>
                    
                  </tr>
				  <?php  $sr_no++; 
				  } echo "no data found";
				
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
<div class="modal fade" id="modelHospitalAdd" tabindex="-1" role="dialog" aria-labelledby="modelHospitalAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD SHIFT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertShift') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Hospital </label>
										<div class="col-sm-12">
										<select class="form-control" id="hosp_id" name="hosp_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Hospital</option>
    											<?php $getHospital= $this->method_call->getHospital();
    											if($getHospital!=null){
    											    foreach ($getHospital->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->hosp_id; ?>"><?php echo $row->hosp_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="shift_name" name="shift_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="shift_desc" name="shift_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Start Time </label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="shift_start_time" name="shift_start_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift End Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="shift_end_time" name="shift_end_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Total Hr.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="shift_total_time_in_hr" name="shift_total_time_in_hr"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="shift_regby" name="shift_regby" value="100100"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>



							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Shift</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>





			<div class="modal fade" id="modelHospitalEdit" tabindex="-1" role="dialog" aria-labelledby="modelHospitalEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT SHIFT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateShift') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Hospital </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_hosp_id" name="edit_hosp_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Hospital</option>
    											<?php $getHospital= $this->method_call->getHospital();
    											if($getHospital!=null){
    											    foreach ($getHospital->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->hosp_id; ?>"><?php echo $row->hosp_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_shift_name" name="edit_shift_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="edit_shift_desc" name="edit_shift_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Start Time </label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="edit_shift_start_time" name="edit_shift_start_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift End Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="edit_shift_end_time" name="edit_shift_end_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Total Hr.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_shift_total_time_in_hr" name="edit_shift_total_time_in_hr"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="shift_id" name="shift_id"   style="height: 30px;" required="required" >
										</div>
									</div>
								</div>



							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Shift</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>




			<div class="modal fade" id="modelHospitalDelete" tabindex="-1" role="dialog" aria-labelledby="modelHospitalDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Shift ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteShift') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-8">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete Reason</label>
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="remove_shift_id" name="remove_shift_id" style="height: 30px;" required="required" >
										<textarea class="form-control"  id="shift_delreason" name="shift_delreason"  rows="3" required="required"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Shift</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


			




			<div class="modal fade" id="modelHospitalView" tabindex="-1" role="dialog" aria-labelledby="modelHospitalView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW SHIFT
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Hospital </label>
										<div class="col-sm-12">
										<select class="form-control" id="view_hosp_id" name="view_hosp_id" style="height: 30px;font-size: 12px;" required="required" disabled>
    											<option value="">Select Hospital</option>
    											<?php $getHospital= $this->method_call->getHospital();
    											if($getHospital!=null){
    											    foreach ($getHospital->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->hosp_id; ?>"><?php echo $row->hosp_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_shift_name" name="view_shift_name"  style="height: 30px;" required="required" disabled >
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="view_shift_desc" name="view_shift_desc" rows="3" required="required" disabled></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Start Time </label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="view_shift_start_time" name="view_shift_start_time"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift End Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="view_shift_end_time" name="view_shift_end_time"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift Total Hr.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_shift_total_time_in_hr" name="view_shift_total_time_in_hr"  style="height: 30px;" required="required" disabled>
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
function editDetails(shift_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchShiftByShift_id')?>/" + shift_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="shift_id"]').val(data.shift_id);
				$('[name="edit_hosp_id"]').val(data.hosp_id);
				$('[name="edit_shift_name"]').val(data.shift_name);
				$('[name="edit_shift_desc"]').val(data.shift_desc);
				$('[name="edit_shift_start_time"]').val(data.shift_start_time);
				$('[name="edit_shift_end_time"]').val(data.shift_end_time);
				$('[name="edit_shift_total_time_in_hr"]').val(data.shift_total_time_in_hr);
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(shift_id){
	$('[name="remove_shift_id"]').val(shift_id);
	
}


function showDetails(shift_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchShiftByShift_id')?>/" + shift_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="view_hosp_id"]').val(data.hosp_id);
				$('[name="view_shift_name"]').val(data.shift_name);
				$('[name="view_shift_desc"]').val(data.shift_desc);
				$('[name="view_shift_start_time"]').val(data.shift_start_time);
				$('[name="view_shift_end_time"]').val(data.shift_end_time);
				$('[name="view_shift_total_time_in_hr"]').val(data.shift_total_time_in_hr);

			
					
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
