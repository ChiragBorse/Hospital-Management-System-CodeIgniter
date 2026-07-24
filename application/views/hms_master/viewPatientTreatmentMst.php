<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Patient Treatment Master</title>
    
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
            <h3 class="m-0">Patient Treatment Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient Treatment Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelPTAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD TREATMENT</button>
                <h3 class="card-title">Hospital Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                  <th>Sr No.</th>
                    <th>Patient Name</th>
                    <th>Patient In Time/Date</th>
                    <th>Patient Out Time/Date</th>
                    <th>Doctor Name</th>
                    <th>Treatment Title</th>
                    <th>Treatment Details</th>
                    <th>Treatment Time/Date</th>
                    <th>Treatment Remark</th>
                    <th>Treatment Reg. Time/Date</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $ptreatment_data= $this->method_call->showPTreatmentList();
													if($ptreatment_data!=null){
														$sr_no=1;			  
														foreach ($ptreatment_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->p_fname ." - ".$row->p_lname; ?></td>
                    <td><?php echo $row->pio_intime ." - ".$row->pio_indate; ?></td>
                    <td><?php echo $row->pio_outtime ." - ".$row->pio_outdate; ?></td>
                    <td><?php echo $row->doc_fname; ?></td>
                    <td><?php echo $row->tretm_title; ?></td>
                    <td><?php echo $row->tretm_desc; ?></td>
                    <td><?php echo $row->tretm_time ." - ".$row->tretm_date; ?></td>
                    <td><?php echo $row->tretm_remark; ?></td>
                    <td><?php echo $row->tretm_regtime ." - ".$row->tretm_regdate; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPTEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->pt_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPTDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->pt_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPTView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->pt_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<div class="modal fade" id="modelPTAdd" tabindex="-1" role="dialog" aria-labelledby="modelPTAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD treatment
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertPTreatment') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
                            <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="pio_in" name="pio_in" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Patient</option>
    											<?php $getPatient= $this->method_call->getPatientTreatment();
    											if($getPatient!=NULL){
    											    foreach ($getPatient->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->pt_id; ?>"><?php echo $row->p_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
                                </div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Docter </label>
										<div class="col-sm-12">
										<select class="form-control" id="doc_id" name="doc_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Docter</option>
    											<?php $getDocter= $this->method_call->getDoctor();
    											if($getDocter!=NULL){
    											    foreach ($getDocter->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->doc_id; ?>"><?php echo $row->doc_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
                                </div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Title </label>
										<div class="col-sm-12">
										  <input type="text" class="form-control"   id="tretm_title" name="tretm_title"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Details </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="tretm_desc" name="tretm_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Time </label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="tretm_time" name="tretm_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="tretm_date" name="tretm_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Remark</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="tretm_remark" name="tretm_remark"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="tretm_regby" name="tretm_regby" value="100100"  style="height: 30px;" required="required" >
                                          
                                        </div>
									</div>
								</div>
                            </div>
                        </div>
               
                                <div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Treatment</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>

<!--view-->
<!-- edit Item  Modal -->
<div class="modal fade" id="modelPtEdit" tabindex="-1" role="dialog" aria-labelledby="modelPtEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD treatment
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertPTreatment') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
                            <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="p_id" name="p_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Patient</option>
    											<?php $getPatient= $this->method_call->getPatient();
    											if($getPatient!=NULL){
    											    foreach ($getPatient->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->pio_in; ?>"><?php echo $row->p_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
                                </div>
								
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Title </label>
										<div class="col-sm-12">
										  <input type="text" class="form-control"   id="tretm_title" name="tretm_title"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Details </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="tretm_desc" name="tretm_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Time </label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="tretm_time" name="tretm_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="tretm_date" name="tretm_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Treatment Remark</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="tretm_remark" name="tretm_remark"  style="height: 30px;" required="required" >
                                            <input type="hiddem" class="form-control"   id="tretm_regby" name="tretm_regby" value="100100"  style="height: 30px;" required="required" >
                                          
                                        </div>
									</div>
								</div>
                            </div>
                        </div>
               
                                <div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Treatment</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>




<!--view-->




			

<!--view-->


			
			

<!-- Popup Model of bootsratp-->

<!-- script will import here-->
<?php include(APPPATH.'views/script.php');?>
<script>
function editDetails(hosp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchHospitalByHosp_id')?>/" + hosp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="hosp_id"]').val(data.hosp_id);
				$('[name="edit_hosp_name"]').val(data.hosp_name);
				$('[name="edit_hosp_desc"]').val(data.hosp_desc);
				$('[name="edit_hosp_pno"]').val(data.hosp_pno);
				$('[name="edit_hosp_email"]').val(data.hosp_email);
				$('[name="edit_hosp_state"]').val(data.hosp_state);
				$('[name="edit_hosp_city"]').val(data.hosp_city);
				$('[name="edit_hosp_pin"]').val(data.hosp_pin);
				$('[name="edit_hosp_add"]').val(data.hosp_add);
				$('[name="edit_hosp_owner"]').val(data.hosp_owner);
				$('[name="edit_hosp_lic"]').val(data.hosp_lic);

			
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(hosp_id){
	$('[name="remove_hosp_id"]').val(hosp_id);
	
}


function showDetails(hosp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchHospitalByHosp_id')?>/" + hosp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_hosp_name"]').val(data.hosp_name);
				$('[name="view_hosp_desc"]').val(data.hosp_desc);
				$('[name="view_hosp_pno"]').val(data.hosp_pno);
				$('[name="view_hosp_email"]').val(data.hosp_email);
				$('[name="view_hosp_state"]').val(data.hosp_state);
				$('[name="view_hosp_city"]').val(data.hosp_city);
				$('[name="view_hosp_pin"]').val(data.hosp_pin);
				$('[name="view_hosp_add"]').val(data.hosp_add);
				$('[name="view_hosp_owner"]').val(data.hosp_owner);
				$('[name="view_hosp_lic"]').val(data.hosp_lic);

			
					
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
