<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Doctor Shift Master</title>
    
     <?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

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
            <h3 class="m-0"> Shift Doctor Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shift Doctor Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelShiftDoctorMatAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);"> ADD SHIFT FOR DOCTOR </button>
                <h3 class="card-title"> Doctor Shift Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>sdm id</th>
                     <!-- <th>shift id</th>
                   
                    <th>doc id</th>  -->
                    <th> date from</th>
					<th> date to</th>
                    <th> reason</th>
                    <th> regby</th>
                    <th>RegDate</th>
					<th>Regtime</th>
					
                    <th>Regstatus</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $shift_doctor_matrix_data= $this->method_call->showShiftDoctorMatList();
													if($shift_doctor_matrix_data!=null){
														$sr_no=1;			  
														foreach ($shift_doctor_matrix_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->sdm_id; ?></td>
                   
                    <td><?php echo $row->sdm_aplic_from_date; ?></td>
                    <td><?php echo $row->sdm_aplic_to_date; ?></td>
                    
                    <td><?php echo $row->sdm_aplic_reason; ?></td>
                    <td><?php echo $row->sdm_regby; ?></td>
                    <td><?php echo $row->sdm_regdate ;?></td>
					<td><?php echo $row->sdm_regtime; ?></td>
					<td><?php echo $row->sdm_status; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelShiftDoctorMatEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->sdm_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelShiftDoctorMatDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecord(<?php echo $row->sdm_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelShiftDoctorMatView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->sdm_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<div class="modal fade" id="modelShiftDoctorMatADD" tabindex="-1" role="dialog" aria-labelledby="modelShiftDoctorMatADD"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD shiftDoctorMat
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertShiftDoctorMat') ?>" >
						
						<div class="modal-body">
							<div class="row">
							
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Sdm id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="sdm_id" name="sdm_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div> 
								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="doc_id" name="doc_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="shift_id" name="shift_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
               
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">start from </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sdm_applic_from_date" name="sdm_applic_from_date" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">start to </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sdm_applic_to_date" name="sdm_applic_to_date" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>



								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm reason </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sdm_applic_reason" name="sdm_applic_reason" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">reg by </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="sdm_regby" name="sdm_regby"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm regdate</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="sdm_regdate" name="sdm_regdate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm regtime</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="sdm_regtime" name="sdm_regtime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;"> Status</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="sdm_status" name="sdm_status"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

               
               

               
              


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create ShiftDoctorMat</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>





			<div class="modal fade" id="modelShiftDoctorMatEdit" tabindex="-1" role="dialog" aria-labelledby="modelShiftDoctorMatEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT ShiftDoctorMat
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateShiftDoctorMat') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								
								
            


<!-- 
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Sdm id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="sdm_id" name="sdm_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								 -->
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="doc_id" name="doc_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="shift_id" name="shift_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
               
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">start from </label>
										<div class="col-sm-12">
										<textarea class="text" id="sdm_applic_from_date" name="sdm_applic_from_date" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">start to </label>
										<div class="col-sm-12">
										<textarea class="text" id="sdm_applic_to_date" name="sdm_applic_to_date" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>



								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm reason </label>
										<div class="col-sm-12">
										<textarea class="text" id="sdm_applic_reason" name="sdm_applic_reason" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">reg by </label>
										<div class="col-sm-12">
											<input type="int" class="form-control"   id="sdm_regby" name="sdm_regby"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm regdate</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="sdm_regdate" name="sdm_regdate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm regtime</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="sdm_regtime" name="sdm_regtime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;"> Status</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="sdm_status" name="sdm_status"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>



							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit ShiftDoctor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


	

			<!--- delete code 
		id here-->


			
			<div class="modal fade" id="modelShiftDoctorMatDelete" tabindex="-1" role="dialog" aria-labelledby="modelShiftDoctorMatDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are you sure to delete this ShiftDoctor ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteShiftDoctorMat') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete reason</label>
										<div class="col-sm-12">
										<input type="hidden" class="form-control"   id="remove_sdm_id" name="remove_sdm_id" style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="sdm_delreason" name="sdm_delreason"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								


<!-- 									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete by</label>
										<div class="col-sm-12">
										<input type="hidden" class="form-control"   id="remove_sdm_regby" name="remove_sdm_regby" style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="sdm_regby" name="sdm_regby"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div> -->

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete shift Doctor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


<!--View Record-->

			<div class="modal fade" id="modelShiftDoctorMatView" tabindex="-1" role="dialog" aria-labelledby="modelShiftDoctorMatView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">View ShiftDoctorMat
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="#" >
						
						<div class="modal-body">
							<div class="row">
									
<!-- 								
							<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Sdm id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="sdm_id" name="sdm_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								 -->
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="doc_id" name="doc_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="shift_id" name="shift_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
               
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">start from </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sdm_applic_from_date" name="sdm_applic_from_date" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">start to </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sdm_applic_to_date" name="sdm_applic_to_date" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>



								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm reason </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sdm_applic_reason" name="sdm_applic_reason" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">reg by </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="sdm_regby" name="sdm_regby"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm regdate</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="sdm_regdate" name="sdm_regdate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">sdm regtime</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="sdm_regtime" name="sdm_regtime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;"> Status</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="sdm_status" name="sdm_status"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit shiftdoctor</button>
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
function editDetails(sdm_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchShiftDoctorMatBysdm_id')?>/" + sdm_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   

				$('[name="edit_sdm_id"]').val(data.sdm_id);
				$('[name="edit_sdm_aplic_from_date"]').val(data.sdm_aplic_from_date);
				$('[name="edit_sdm_aplic_to_date"]').val(data.sdm_aplic_to_date);
				$('[name="edit_hosdm_aplic_reason"]').val(data.sdm_aplic_reason);
				$('[name="edit_sdm_regby"]').val(data.sdm_regby);
				$('[name="edit_sdm_regdate"]').val(data.sdm_regdate);
				$('[name="edit_sdm_regtime"]').val(data.sdm_regtime);
				$('[name="edit_sdm_status"]').val(data.sdm_status);
								
								
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

function deleteRecord(sdm_id){
	
	$('[name="remove_sdm_id"]').val(sdm_id);
}

function showDetails(sdm_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchShiftDoctorMatBysdm_id')?>/" + sdm_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="view_sdm_id"]').val(data.sdm_id);
				$('[name="view_sdm_aplic_from_date"]').val(data.sdm_aplic_from_date);
				$('[name="view_sdm_aplic_to_date"]').val(data.sdm_aplic_to_date);
				$('[name="view_hosdm_aplic_reason"]').val(data.sdm_aplic_reason);
				$('[name="view_sdm_regby"]').val(data.sdm_regby);
				$('[name="view_sdm_regdate"]').val(data.sdm_regdate);
				$('[name="view_sdm_regtime"]').val(data.sdm_regtime);
				$('[name="view_sdm_status"]').val(data.sdm_status);
								
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
