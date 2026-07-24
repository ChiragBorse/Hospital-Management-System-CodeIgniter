<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Patient Master</title>
    
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
            <h3 class="m-0">Patient Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient Master</li>
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
            				<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelPatientAdd"
							style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD PATIENT</button>
                			<h3 class="card-title">Patient Profile Settings</h3>
              			</div>
              <!-- /.card-header -->
              		<div class="card-body">
                	<table id="example1" class="table table-bordered table-striped">
                  	<thead>
                  	<tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Date Of Birth , Gender</th>
                    <th>City</th>
                    <th>Mobile No. </th>
                    <th>Patient Photo</th>
                    <th>Patient Reg date-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $patient_data= $this->method_call->showPatientList();
													if($patient_data!=null){
														$sr_no=1;			  
														foreach ($patient_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->p_fname ." ".$row->p_mname." ".$row->p_lname; ?></td>
                    <td><?php echo $row->p_dob." Gender: ".$row->p_gender; ?></td>
                    <td><?php echo $row->p_city; ?></td>
                    <td><?php echo $row->p_mobilno; ?></td>
                    <td><img src="<?php echo base_url(); ?>uploads/patientPhoto/<?php echo $row->p_photo; ?>" style="height:50px;width:50px;" class="img-rounded" alt="Paitent Photo"></td>
                    <td><?php echo $row->p_regdate ." - ".$row->p_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPatientEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->p_id; ?>)" title="Edit" ><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPatientDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecord(<?php echo $row->p_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPatientView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->p_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<div class="modal fade" id="modelPatientAdd" tabindex="-1" role="dialog" aria-labelledby="modelPatientAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Patient
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertPatient') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								
							<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient First Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_fname" name="p_fname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Middle Name</label>
										<div class="col-sm-12">
										  <input type="text" class="form-control"   id="p_mname" name="p_mname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Last Name</label>
										<div class="col-sm-12">
										<input type="text" class="form-control" id="p_lname" name="p_lname" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Date Of Birth</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="p_dob" name="p_dob"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Gender</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_gender" name="p_gender"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_state" name="p_state"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_city" name="p_city"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="p_pin" name="p_pin"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Address</label>
										<div class="col-sm-12">
                    					<textarea class="form-control" id="p_add" name="p_add" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Mobile No.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="p_mobilno" name="p_mobilno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="p_email" name="p_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Marital Status</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_marital_status" name="p_marital_status"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Occupation</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_occup" name="p_occup"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Blood Group</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_blood_grp" name="p_blood_grp"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
              		  <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Paitent Adharcard Number</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_aadharno" name="p_aadharno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

									
							
								
              			  

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emerengcy Contact no.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="p_emg_cont_per_no" name="p_emg_cont_per_no"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. Relation</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="p_emg_cont_relat" name="p_emg_cont_relat"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
				
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Add Patient</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>

			</div>

<!--EDIT HOSPITAL-->


		<div  class="modal fade" id="modelPatientEdit" tabindex="-1" role="dialog" aria-labelledby="modelPatientEdit" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Edit Patient
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updatePatient') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								
							<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient First Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_fname" name="edit_p_fname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Middle Name</label>
										<div class="col-sm-12">
										  <input type="text" class="form-control"   id="edit_p_mname" name="edit_p_mname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Last Name</label>
										<div class="col-sm-12">
										<input type="text" class="form-control" id="edit_p_lname" name="edit_p_lname" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Date Of Birth</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_p_dob" name="edit_p_dob"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Gender</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_gender" name="edit_p_gender"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_state" name="edit_p_state"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_city" name="edit_p_city"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_p_pin" name="edit_p_pin"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Address</label>
										<div class="col-sm-12">
                    					<textarea class="form-control" id="edit_p_add" name="edit_p_add" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Mobile No.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_p_mobilno" name="edit_p_mobilno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="edit_p_email" name="edit_p_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Marital Status</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_marital_status" name="edit_p_marital_status"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Occupation</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_occup" name="edit_p_occup"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Blood Group</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_blood_grp" name="edit_p_blood_grp"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. Person</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_emg_cont_per" name="edit_p_emg_cont_per"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. no.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_p_emg_cont_per_no" name="edit_p_emg_cont_per_no"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. Relation</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_p_emg_cont_relat" name="edit_p_emg_cont_relat"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="p_id" name="p_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
								</div>
							</div>
							
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Patient Info</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			
          <!--DELETE Record-->      

			
			<div class="modal fade" id="modelPatientDelete" tabindex="-1" role="dialog" aria-labelledby="modelPatientDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are you sure to delete this Patient ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deletePatient') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete reason</label>
										<div class="col-sm-12">
										<input type="hidden" class="form-control"   id="remove_p_id" name="remove_p_id" style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="p_delreason" name="p_delreason"  style="height: 30px;" required="required" >
										</div>
									</div>
							    </div>
						    </div>	
						</div>			
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Patient</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<!--View Record-->

<div class="modal fade" id="modelPatientView" tabindex="-1" role="dialog" aria-labelledby="modelPatientView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">View Patient
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="#" >
						
						<div class="modal-body">
							<div class="row">
						
							
							<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient First Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_fname" name="view_p_fname"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Middle Name</label>
										<div class="col-sm-12">
										  <input type="text" class="form-control"   id="view_p_mname" name="view_p_mname"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Last Name</label>
										<div class="col-sm-12">
										<input type="text" class="form-control" id="view_p_lname" name="view_p_lname" required="required"  readonly="readonly">
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Date Of Birth</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_p_dob" name="view_p_dob"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Gender</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_gender" name="view_p_gender"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_state" name="view_p_state"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_city" name="view_p_city"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_p_pin" name="view_p_pin"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Address</label>
										<div class="col-sm-12">
                    					<textarea class="form-control" id="view_p_add" name="view_p_add" rows="3" required="required"  readonly="readonly"></textarea>
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Mobile No.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_p_mobilno" name="view_p_mobilno"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="view_p_email" name="view_p_email"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Marital Status</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_marital_status" name="view_p_marital_status"  style="height: 30px;" required="required"   readonly="readonly">
										</div>
									</div>
								</div>
                               
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Blood Group</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_blood_grp" name="view_p_blood_grp"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. person</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_emg_cont_per" name="view_p_emg_cont_per"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. no.</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_p_emg_cont_per_no" name="view_p_emg_cont_per_no"  style="height: 30px;" required="required"  readonly="readonly">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Emg. Cont. Relation</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_emg_cont_relat" name="view_p_emg_cont_relat"  style="height: 30px;" required="required" readonly="readonly" >
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
function editDetails(p_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPatientByPatient_id')?>/" + p_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				
				$('[name="p_id"]').val(data.p_id);
				$('[name="edit_hosp_id"]').val(data.hosp_id);
				
				$('[name="edit_p_fname"]').val(data.p_fname);
				$('[name="edit_p_mname"]').val(data.p_mname);
				$('[name="edit_p_lname"]').val(data.p_lname);
				$('[name="edit_p_dob"]').val(data.p_dob);
				$('[name="edit_p_gender"]').val(data.p_gender);
				$('[name="edit_p_state"]').val(data.p_state);
				$('[name="edit_p_city"]').val(data.p_city);
				$('[name="edit_p_pin"]').val(data.p_pin);
				$('[name="edit_p_add"]').val(data.p_add);
				$('[name="edit_p_mobilno"]').val(data.p_mobilno);	
				$('[name="edit_p_email"]').val(data.p_email);
				$('[name="edit_p_marital_status"]').val(data.p_marital_status);
				$('[name="edit_p_occup"]').val(data.p_occup);
				$('[name="edit_p_blood_grp"]').val(data.p_blood_grp);	
				$('[name="edit_p_emg_cont_per"]').val(data.p_emg_cont_per);
				$('[name="edit_p_emg_cont_per_no"]').val(data.p_emg_cont_per_no);
				$('[name="edit_p_emg_cont_relat"]').val(data.p_emg_cont_relat);
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

function deleteRecord(p_id){
	
	$('[name="p_id"]').val(p_id);
}

function showDetails(p_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPatientByPatient_id')?>/" + p_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
					
				$('[name="view_hosp_id"]').val(data.hosp_id);
				$('[name="view_p_fname"]').val(data.p_fname);
				$('[name="view_p_mname"]').val(data.p_mname);
				$('[name="view_p_lname"]').val(data.p_lname);
				$('[name="view_p_dob"]').val(data.p_dob);
				$('[name="view_p_gender"]').val(data.p_gender);
				$('[name="view_p_state"]').val(data.p_state);
				$('[name="view_p_city"]').val(data.p_city);
				$('[name="view_p_pin"]').val(data.p_pin);
				$('[name="view_p_add"]').val(data.p_add);
				$('[name="view_p_mobilno"]').val(data.p_mobilno);	
				$('[name="view_p_email"]').val(data.p_email);
				$('[name="view_p_marital_status"]').val(data.p_marital_status);
				$('[name="view_p_occup"]').val(data.p_occup);
				$('[name="view_p_blood_grp"]').val(data.p_blood_grp);	
				$('[name="view_p_emg_cont_per"]').val(data.p_emg_cont_per);
				$('[name="view_p_emg_cont_per_no"]').val(data.p_emg_cont_per_no);
				$('[name="view_p_emg_cont_relat"]').val(data.p_emg_cont_relat);			
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