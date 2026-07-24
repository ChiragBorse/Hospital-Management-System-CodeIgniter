<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Patient Assignment Matrix</title>
    
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
            <h3 class="m-0">Patient Assignment Matrix</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient Assignment Matrix</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelPassAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD PATIENT ASSIGNMENT</button>
                <h3 class="card-title">Patient Assignment Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>ward no</th>
                    <th>bed no</th>
                    <th>doc name</th>
                    <th>applic from date</th>
                    <th>applic to date</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $Patient= $this->method_call->showPassList();
													if($Patient!=null){
														$sr_no=1;			  
														foreach ($Patient->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->p_fname; ?></td>
                    <td><?php echo $row->ward_id; ?></td>
                    <td><?php echo $row->bed_id; ?></td>
                    <td><?php echo $row->doc_fname; ?></td>
                    <td><?php echo $row->pam_applic_from_date; ?></td>
                    <td><?php echo $row->pam_applic_to_date; ?></td>
                    <td><?php echo $row->pam_regdate ." - ".$row->pam_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->pam_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->pam_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->pam_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<div class="modal fade" id="modelPassAdd" tabindex="-1" role="dialog" aria-labelledby="modelPassAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Patient Assign Matrix
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertPam') ?>" >
						
						<div class="modal-body">
							<div class="row">

                            <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="p_id" name="p_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Patient</option>
    											<?php $getPatient= $this->method_call->getPatient();
    											if($getPatient!=null){
    											    foreach ($getPatient->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->p_id; ?>"><?php echo $row->p_fname;  ?></option>
						                        	<?php }
                                            				}
                                            				?>
					
    										</select>
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Ward </label>
										<div class="col-sm-12">
										<select class="form-control" id="ward_id" name="ward_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Ward</option>
    											<?php $getWard= $this->method_call->getWard();
    											if($getWard!=null){
    											    foreach ($getWard->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->ward_id; ?>"><?php echo $row->ward_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Bed</label>
										<div class="col-sm-12">
										<select class="form-control" id="bed_id" name="bed_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Bed</option>
    											<?php $getBed= $this->method_call->getBed();
    											if($getBed!=null){
    											    foreach ($getBed->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->bed_id; ?>"><?php echo $row->bed_no;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>





                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Doctor</label>
										<div class="col-sm-12">
										<select class="form-control" id="doc_id" name="doc_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Doctor</option>
    											<?php $getDoctor= $this->method_call->getDoctor();
    											if($getDoctor!=null){
    											    foreach ($getDoctor->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->doc_id; ?>"><?php echo $row->doc_fname;?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>




                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application From Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="pam_applic_from_date" name="pam_applic_from_date"  style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application From Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="pam_applic_from_time" name="pam_applic_from_time"  style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application To Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="pam_applic_to_date" name="pam_applic_to_date"  style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application To Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="pam_applic_to_time" name="pam_applic_to_time"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="pam_regby" name="pam_regby" value="100100" style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>



                                
									
		

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Assignment</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT PATIENT ASSIGNMENT 
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updatePam') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
                            <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_p_id" name="edit_p_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Patient</option>
    											<?php $getPatient= $this->method_call->getPatient();
    											if($getPatient!=null){
    											    foreach ($getPatient->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->p_id; ?>"><?php echo $row->p_fname;  ?></option>
						                        	<?php }
                                            				}
                                            				?>
					
    										</select>
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Ward </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_ward_id" name="edit_ward_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Ward</option>
    											<?php $getWard= $this->method_call->getWard();
    											if($getWard!=null){
    											    foreach ($getWard->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->ward_id; ?>"><?php echo $row->ward_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Bed</label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_bed_id" name="edit_bed_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Bed</option>
    											<?php $getBed= $this->method_call->getBed();
    											if($getBed!=null){
    											    foreach ($getBed->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->bed_id; ?>"><?php echo $row->bed_no;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>





                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Doctor</label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_doc_id" name="edit_doc_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Doctor</option>
    											<?php $getDoctor= $this->method_call->getDoctor();
    											if($getDoctor!=null){
    											    foreach ($getDoctor->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->doc_id; ?>"><?php echo $row->doc_fname;?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>
								
            

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application From Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_pam_applic_from_date" name="edit_pam_applic_from_date"  style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application From Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="edit_pam_applic_from_time" name="edit_pam_applic_from_time"  style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application To Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_pam_applic_to_date" name="edit_pam_applic_to_date"  style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Application To Time</label>
										<div class="col-sm-12">
									
											<input type="hidden" class="form-control"   id="pam_id" name="pam_id"  style="height: 30px;" required="required" >
                                      
											<input type="time" class="form-control"   id="edit_pam_applic_to_time" name="edit_pam_applic_to_time"  style="height: 30px;" required="required" >
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




			<div class="modal fade" id="modelHospitalDelete" tabindex="-1" role="dialog" aria-labelledby="modelHospitalDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Patient Assign ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteAssign') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-8">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete Reason</label>
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="remove_pam_id" name="remove_pam_id" style="height: 30px;" required="required" >
											  <textarea class="form-control" rows="3" id="pam_reason" name="pam_reason"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Patient Assignment</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW Patient Assignment
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="view_p_id" name="view_p_id" style="height: 30px;font-size: 12px;" disabled="disabled" required="required">
    											<option value="">Select Patient</option>
    											<?php $getPatient= $this->method_call->getPatient();
    											if($getPatient!=null){
    											    foreach ($getPatient->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->p_id; ?>"><?php echo $row->p_fname;  ?></option>
						                        	<?php }
                                            				}
                                            				?>
					
    										</select>
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Ward </label>
										<div class="col-sm-12">
										<select class="form-control" id="view_ward_id" name="view_ward_id" style="height: 30px;font-size: 12px;" disabled="disabled" required="required">
    											<option value="">Select Ward</option>
    											<?php $getWard= $this->method_call->getWard();
    											if($getWard!=null){
    											    foreach ($getWard->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->ward_id; ?>"><?php echo $row->ward_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Bed</label>
										<div class="col-sm-12">
										<select class="form-control" id="view_bed_id" name="view_bed_id" style="height: 30px;font-size: 12px;" disabled="disabled" required="required">
    											<option value="">Select Bed</option>
    											<?php $getBed= $this->method_call->getBed();
    											if($getBed!=null){
    											    foreach ($getBed->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->bed_id; ?>"><?php echo $row->bed_no;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>





                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Doctor</label>
										<div class="col-sm-12">
										<select class="form-control" id="view_doc_id" name="view_doc_id" style="height: 30px;font-size: 12px;" disabled="disabled" required="required">
    											<option value="">Select Doctor</option>
    											<?php $getDoctor= $this->method_call->getDoctor();
    											if($getDoctor!=null){
    											    foreach ($getDoctor->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->doc_id; ?>"><?php echo $row->doc_fname;?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>
                

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applic from date</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_pam_applic_from_date" name="view_pam_applic_from_date"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applic from time</label>
										<div class="col-sm-12">
                                        <input type="text" class="form-control"   id="view_pam_applic_from_time" name="view_pam_applic_from_time"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applic to date</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_pam_applic_to_date" name="view_pam_applic_to_date"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applic to time</label>
										<div class="col-sm-12">
                                        <input type="text" class="form-control"   id="view_pam_applic_to_time" name="view_pam_applic_to_time"  style="height: 30px;" readonly>
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
function editDetails(pam_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPamByPam_id')?>/" + pam_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="pam_id"]').val(data.pam_id);
				$('[name="edit_p_id"]').val(data.p_id);
				$('[name="edit_ward_id"]').val(data.ward_id);
				$('[name="edit_bed_id"]').val(data.bed_id);
				$('[name="edit_doc_id"]').val(data.doc_id);
				$('[name="edit_pam_applic_from_date"]').val(data.pam_applic_from_date);
				$('[name="edit_pam_applic_to_date"]').val(data.pam_applic_to_date);
				$('[name="edit_pam_applic_from_time"]').val(data.pam_applic_from_time);
				$('[name="edit_pam_applic_to_time"]').val(data.pam_applic_to_time);

			
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(pam_id){
	$('[name="remove_pam_id"]').val(pam_id);
	
}


function showDetails(pam_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPamByPam_id')?>/" + pam_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_p_id"]').val(data.p_id);
				$('[name="view_ward_id"]').val(data.ward_id);
				$('[name="view_bed_id"]').val(data.bed_id);
				$('[name="view_doc_id"]').val(data.doc_id);
				$('[name="view_pam_applic_from_date"]').val(data.pam_applic_from_date);
				$('[name="view_pam_applic_to_date"]').val(data.pam_applic_to_date);
				$('[name="view_pam_applic_from_time"]').val(data.pam_applic_from_time);
				$('[name="view_pam_applic_to_time"]').val(data.pam_applic_to_time);

			
					
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
