<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Doctor Master</title>
    
     <?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 

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
            <h3 class="m-0">Doctor Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Doctor Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelDoctorAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD DOCTOR</button>
                <h3 class="card-title">Doctor Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Full Name</th>
                    <th>doc Image</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>State, City</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Qualification</th>
                    <th>DOJ</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $doctor_data= $this->method_call->showDoctorList();
													if($doctor_data!=null){
														$sr_no=1;			  
														foreach ($doctor_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->doc_fname . " " .$row->doc_mname . " " .$row->doc_lname ?></td>
                    <td><img src="<?php echo base_url(); ?>uploads/doctor_photo/<?php echo $row->doc_photo; ?>" style="height:50px;width:50px;" class="img-rounded" alt="Cinque Terre"></td>
                    <td><?php echo $row->doc_mobileno; ?></td>
                    <td><?php echo $row->doc_email; ?></td>
                    <td><?php echo $row->doc_gender; ?></td>
                    <td><?php echo $row->doc_state ." - ".$row->doc_city; ?></td>
                    <td><?php echo $row->doc_add; ?></td>
                    <td><?php echo $row->doc_dob; ?></td>
                    <td><?php echo $row->doc_qualif; ?></td>
                    <td><?php echo $row->doc_doj; ?></td>


                    <td><?php echo $row->doc_regdate ." - ".$row->doc_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelDoctorEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->doc_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelDoctorDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecord(<?php echo $row->doc_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelDoctorView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->doc_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<!-- ./wrapperdoctor
<-- Popup Model of bootsratp-->

<!-- Add Item  Modal -->
<div class="modal fade" id="modelDoctorAdd" tabindex="-1" role="dialog" aria-labelledby="modelDoctorAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Doctor
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertDoctor') ?>" >
						
						<div class="modal-body">
							<div class="row">

                            <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Name </label>
										<select class="form-control" id="hosp_id" name="hosp_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Hospital</option>
    											<?php $gethosp= $this->method_call->getHospital();
    											if($gethosp!=null){
    											    foreach ($gethosp->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->hosp_id; ?>"><?php echo $row->hosp_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
									</div>
								</div>
									
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor First Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="doc_fname" name="doc_fname"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Middle Name </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="doc_mname" name="doc_mname"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
									<div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor last Name </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="doc_lname" name="doc_lname"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
            
								
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor Gender</label>
                                        <div class="col-sm-4" style="display: flex;">
                                            <p>Male</p>
                                            <input type="radio" class="form-control"   id="doc_gender" name="doc_gender" value="Male"  style="height: 40px;" required="required" >
                                        </div>
                                        <div class="col-sm-4" style="display: flex;">
                                            <p>Female</p>
                                            <input type="radio" class="form-control"   id="doc_gender" name="doc_gender" value="Female"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor DOB</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="doc_dob" name="doc_dob"  style="height: 30px;" required="required" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor DOJ</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="doc_doj" name="doc_doj"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="doc_regby" name="doc_regby" value="100100" style="height: 30px;" required="required" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor Description</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="doc_desc" name="doc_desc"  style="height: 30px;" required="required" >
                                        
                                        </div>
                                    </div>
                                </div>

                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Qualification</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="doc_qualif" name="doc_qualif"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>


                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="doc_mobileno" name="doc_mobileno"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor State</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"   id="doc_state" name="doc_state"  style="height: 40px;" required="required" >
                                                    </div>
                                                </div>
                                            </div>
                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor City</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"   id="doc_city" name="doc_city"  style="height: 40px;" required="required" >
                                                    </div>
                                                </div>
                                            </div>
                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor City Pincode</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control"   id="doc_pin" name="doc_pin"  style="height: 40px;" required="required" >
                                                    </div>
                                                </div>
                                            </div>
                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Address</label>
                                                    <div class="col-sm-12">
                                <textarea class="form-control" id="doc_add" name="doc_add" rows="3" style="height: 40px;" required="required"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Photo </label>
										<div class="col-sm-12">
                                            <input type="file" class="form-control"   id="doc_photo" name="doc_photo"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Certificate image </label>
										<div class="col-sm-12">
                                            <input type="file" class="form-control"   id="doc_certif_img" name="doc_certif_img"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>

                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Email</label>
										<div class="col-sm-12">
                                            <input type="email" class="form-control"   id="doc_email" name="doc_email"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>    

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor Speciality</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="doc_specl" name="doc_specl"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Doctor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
					</form>
					</div>
				</div>
			</div>





			<div class="modal fade" id="modelDoctorEdit" tabindex="-1" role="dialog" aria-labelledby="modelDoctorEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT Doctor
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateDoctor') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
                            <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor First Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_doc_fname" name="edit_doc_fname"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Middle Name </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="edit_doc_mname" name="edit_doc_mname"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
									<div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor last Name </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="edit_doc_lname" name="edit_doc_lname"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
            
								
                                <!-- <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor Gender</label>
                                        <div class="col-sm-4" style="display: flex;">
                                            <p>Male</p>
                                            <input type="radio" class="form-control"   id="edit_doc_gender" name="edit_doc_gender" value="Male"  style="height: 40px;" required="required" >
                                        </div>
                                        <div class="col-sm-4" style="display: flex;">
                                            <p>Female</p>
                                            <input type="radio" class="form-control"   id="edit_doc_gender" name="edit_doc_gender" value="Female"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor DOB</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="edit_doc_dob" name="edit_doc_dob"  style="height: 30px;" required="required" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor DOJ</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="edit_doc_doj" name="edit_doc_doj"  style="height: 30px;" required="required" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor Description</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="edit_doc_desc" name="edit_doc_desc"  style="height: 30px;" required="required" >
                                        
                                        </div>
                                    </div>
                                </div>

                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Qualification</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="edit_doc_qualif" name="edit_doc_qualif"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>


                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_doc_mobileno" name="edit_doc_mobileno"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor State</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"   id="edit_doc_state" name="edit_doc_state"  style="height: 40px;" required="required" >
                                                    </div>
                                                </div>
                                            </div>
                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor City</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"   id="edit_doc_city" name="edit_doc_city"  style="height: 40px;" required="required" >
                                                    </div>
                                                </div>
                                            </div>
                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor City Pincode</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control"   id="edit_doc_pin" name="edit_doc_pin"  style="height: 40px;" required="required" >
                                                    </div>
                                                </div>
                                            </div>
                
                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Address</label>
                                                    <div class="col-sm-12">
                                <textarea class="form-control" id="edit_doc_add" name="edit_doc_add" rows="3" style="height: 40px;" required="required"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                  
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Email</label>
										<div class="col-sm-12">
                                            <input type="email" class="form-control"   id="edit_doc_email" name="edit_doc_email"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doctor Speciality</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="edit_doc_specl" name="edit_doc_specl"  style="height: 40px;" required="required" >
                                               <input type="hidden" class="form-control"   id="doc_id" name="doc_id"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Doctor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>





            <div class="modal fade" id="modelDoctorDelete" tabindex="-1" role="dialog" aria-labelledby="modelDoctorDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are you sure to delete this Doctor?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteDoctor') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete reason </label>
										<div class="col-sm-12">
										<input type="hidden" class="form-control"   id="remove_doc_id" name="remove_doc_id" style="height: 30px;" required="required" >

											<input type="text" class="form-control"   id="doc_delreason" name="doc_delreason"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Doctor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


			


			<div class="modal fade" id="modelDoctorView" tabindex="-1" role="dialog" aria-labelledby="modelDoctorView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">View Doctor
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="#" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor First Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_doc_fname" name="view_doc_fname"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>

                                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Middle Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_doc_mname" name="view_doc_mname"  style="height: 40px;" readonly >
										</div>
									</div>
								</div>

                                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor last Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_doc_lname" name="view_doc_lname"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>

                                
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor DOB</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="view_doc_dob" name="view_doc_dob"  style="height: 30px;" readonly>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor DOJ</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="view_doc_doj" name="view_doc_doj"  style="height: 30px;" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Description</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="view_doc_desc" name="view_doc_desc"  style="height: 30px;" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Qualification</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="view_doc_qualif" name="view_doc_qualif"  style="height: 40px;" readonly>
                                        </div>
                                    </div>
                                </div>


                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_doc_mobileno" name="view_doc_mobileno"  style="height: 40px;" readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_doc_state" name="view_doc_state"  style="height: 40px;" readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_doc_city" name="view_doc_city"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor City Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_doc_pin" name="view_doc_pin"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Address</label>
										<div class="col-sm-12">
                    <textarea class="form-control" id="view_doc_add" name="view_doc_add" rows="3" style="height: 40px;" readonly></textarea>
										</div>
									</div>
								</div>



                                <!-- <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Certificate photo</label>
										<div class="col-sm-12">
											<input type="file" class="form-control"   id="view_doc_certif_img" name="view_doc_certif_img"  style="height: 30px;" readonly >
                                        </div>
									</div>
								</div> -->

                                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="view_doc_email" name="view_doc_email"  style="height: 40px;" readonly >
										</div>
									</div>
								</div>

                                <!-- <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Photo </label>
										<div class="col-sm-12">
										  <input type="file" class="form-control"   id="view_doc_photo" name="view_doc_photo"  style="height: 40px;" readonly >
										</div>
									</div>
								</div> -->


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
function editDetails(doc_id){
    //alert(doc_id);
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchDoctorByDoc_id')?>/" + doc_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="doc_id"]').val(data.doc_id);
				$('[name="edit_doc_fname"]').val(data.doc_fname);
                $('[name="edit_doc_mname"]').val(data.doc_mname);
                $('[name="edit_doc_lname"]').val(data.doc_lname);
                $('[name="edit_doc_dob"]').val(data.doc_dob);
                $('[name="edit_doc_doj"]').val(data.doc_doj);
                $('[name="edit_doc_desc"]').val(data.doc_desc);
                $('[name="edit_doc_qualif"]').val(data.doc_qualif);
              	$('[name="edit_doc_mobileno"]').val(data.doc_mobileno);
                $('[name="edit_doc_state"]').val(data.doc_state);
                $('[name="edit_doc_city"]').val(data.doc_city);
                $('[name="edit_doc_pin"]').val(data.doc_pin);
                $('[name="edit_doc_add"]').val(data.doc_add);
                $('[name="edit_doc_email"]').val(data.doc_email);
                $('[name="edit_doc_specl"]').val(data.doc_specl);
                  
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

function deleteRecord(doc_id)
{
	$('[name="remove_doc_id"]').val(doc_id);
}


function showDetails(doc_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchDoctorByDoc_id')?>/" + doc_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="doc_id"]').val(data.doc_id);
				$('[name="Hosp_id"]').val(data.Hosp_id);
				$('[name="view_doc_fname"]').val(data.doc_fname);
                $('[name="view_doc_mname"]').val(data.doc_mname);
                $('[name="view_doc_lname"]').val(data.doc_lname);
                $('[name="view_doc_dob"]').val(data.doc_dob);
                $('[name="view_doc_doj"]').val(data.doc_doj);
                $('[name="view_doc_desc"]').val(data.doc_desc);
                $('[name="view_doc_qualif"]').val(data.doc_qualif);
              	$('[name="view_doc_mobileno"]').val(data.doc_mobileno);
                $('[name="view_doc_state"]').val(data.doc_state);
                $('[name="view_doc_city"]').val(data.doc_city);
                $('[name="view_doc_pin"]').val(data.doc_pin);
                $('[name="view_doc_add"]').val(data.doc_add);
                $('[name="view_doc_photo"]').val(data.doc_photo);
                $('[name="view_doc_certif_img"]').val(data.doc_certif_img);
                $('[name="view_doc_email"]').val(data.doc_email);
                $('[name="view_doc_specl"]').val(data.doc_specl);
				

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
