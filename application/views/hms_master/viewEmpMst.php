<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Employee Master</title>
    
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
            <h3 class="m-0">Employee Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Master</li>
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
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD EMPLOYEE</button>
                <h3 class="card-title">Hospital Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
					<th>Hospital Name</th>
					<th>Department Name</th>
					<th>Photo</th>
                    <th>Employee Name</th>
					<th>Gender</th>
                    <th>Phone No</th>
					<th>City, State</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $showEmpList= $this->method_call->showEmpList();
													if($showEmpList!=null){
														$sr_no=1;			  
														foreach ($showEmpList->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->hosp_name; ?></td>
					<td><?php echo $row->dept_name; ?></td>
                    <td><img src="<?php echo base_url(); ?>uploads/emp_photo/<?php echo $row->emp_photo; ?>" style="height:50px;width:50px;" class="img-rounded" alt="Cinque Terre"></td>
					<td><?php echo $row->emp_fname ." - ".$row->emp_mname." - ".$row->emp_lname; ?></td>
                    <td><?php echo $row->emp_gender; ?></td>
                    <td><?php echo $row->emp_pno; ?></td>
					<td><?php echo $row->emp_city ." - ".$row->emp_state; ?></td>
                    <td><?php echo $row->emp_regdate ." - ".$row->emp_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->emp_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->emp_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->emp_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<div class="modal fade" id="modelHospitalAdd" tabindex="-1" role="dialog" aria-labelledby="modelHospitalAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD EMPLOYEE
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertEmp') ?>" >
						
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Department </label>
										<div class="col-sm-12">
										<select class="form-control" id="dept_id" name="dept_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Department</option>
    											<?php $getDept= $this->method_call->getDept();
    											if($getDept!=null){
    											    foreach ($getDept->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->dept_id; ?>"><?php echo $row->dept_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Code</label>
										<div class="col-sm-12">
										  <input type="number" class="form-control"   id="emp_code" name="emp_code"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Fname </label>
										<div class="col-sm-12">
										<input type="text" class="form-control"   id="emp_fname" name="emp_fname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Mname </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_mname" name="emp_mname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Lname </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_lname" name="emp_lname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Phone no </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="emp_pno" name="emp_pno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="emp_email" name="emp_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Gender</label>
										<div class="col-sm-12">
										<select class="form-control" id="emp_gender" name="emp_gender" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Gender</option>
    											
														<option value="Female">Female</option>
														<option value="Male">Male</option>
						                        
    										</select>
										</div>
									</div>
								</div>
								


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_state" name="emp_state"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_city" name="emp_city"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="emp_pin" name="emp_pin"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Address</label>
										<div class="col-sm-12">
                  						  <textarea class="form-control" id="emp_add" name="emp_add" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>

                
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Photo</label>
										<div class="col-sm-12">
											<input type="file" class="form-control"   id="emp_photo" name="emp_photo"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp DOB</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="emp_dob" name="emp_dob"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Marital Status</label>
										<div class="col-sm-12">
										<select class="form-control" id="emp_mari_status" name="emp_mari_status" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Marital Status</option>
    											
														<option value="Marrid">Marrid</option>
														<option value="UnMarrid">UnMarrid</option>
						                        
    										</select>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Qualification</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_qualif" name="emp_qualif"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp DOJ</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="emp_doj" name="emp_doj"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emerg. Contact Person</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_emg_cont_per" name="emp_emg_cont_per"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emerg. Contact Number	</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="emp_emg_cont_per_no" name="emp_emg_cont_per_no"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="emp_regby" name="emp_regby" value="100100" style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Employee</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT EMPLOYEE
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateEmp') ?>" >
						
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Department </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_dept_id" name="edit_dept_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Department</option>
    											<?php $getDept= $this->method_call->getDept();
    											if($getDept!=null){
    											    foreach ($getDept->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->dept_id; ?>"><?php echo $row->dept_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Code</label>
										<div class="col-sm-12">
										  <input type="number" class="form-control"   id="edit_emp_code" name="edit_emp_code"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Fname </label>
										<div class="col-sm-12">
										<input type="text" class="form-control"   id="edit_emp_fname" name="edit_emp_fname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Mname </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_mname" name="edit_emp_mname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Lname </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_lname" name="edit_emp_lname"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Phone no </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_emp_pno" name="edit_emp_pno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="edit_emp_email" name="edit_emp_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Gender</label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_emp_gender" name="edit_emp_gender" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Gender</option>
    											
														<option value="Female">Female</option>
														<option value="Male">Male</option>
						                        
    										</select>
										</div>
									</div>
								</div>
								


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_state" name="edit_emp_state"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_city" name="edit_emp_city"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_emp_pin" name="edit_emp_pin"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Address</label>
										<div class="col-sm-12">
                  						  <textarea class="form-control" id="edit_emp_add" name="edit_emp_add" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp DOB</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_emp_dob" name="edit_emp_dob"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Marital Status</label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_emp_mari_status" name="edit_emp_mari_status" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Marital Status</option>
    											
														<option value="Marrid">Marrid</option>
														<option value="UnMarrid">UnMarrid</option>
						                        
    										</select>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Qualification</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_qualif" name="edit_emp_qualif"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp DOJ</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_emp_doj" name="edit_emp_doj"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emerg. Contact Person</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_emg_cont_per" name="edit_emp_emg_cont_per"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emerg. Contact Number	</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_emp_emg_cont_per_no" name="edit_emp_emg_cont_per_no"  style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="emp_id" name="emp_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Employee</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Employee ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteEmp') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-8">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete Reason</label>
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="remove_emp_id" name="remove_emp_id" style="height: 30px;" required="required" >
											<textarea class="form-control"   id="emp_delreason" name="emp_delreason"  rows="3" required="required"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Employee</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW EMPLOYEE
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Department </label>
										<div class="col-sm-12">
										<select class="form-control" id="view_dept_id" name="view_dept_id" style="height: 30px;font-size: 12px;" required="required" disabled>
    											<option value="">Select Department</option>
    											<?php $getDept= $this->method_call->getDept();
    											if($getDept!=null){
    											    foreach ($getDept->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->dept_id; ?>"><?php echo $row->dept_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Code</label>
										<div class="col-sm-12">
										  <input type="number" class="form-control"   id="view_emp_code" name="view_emp_code"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Fname </label>
										<div class="col-sm-12">
										<input type="text" class="form-control"   id="view_emp_fname" name="view_emp_fname"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Mname </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_mname" name="view_emp_mname"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Lname </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_lname" name="view_emp_lname"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>


								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Phone no </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_emp_pno" name="view_emp_pno"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="view_emp_email" name="view_emp_email"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Gender</label>
										<div class="col-sm-12">
										<select class="form-control" id="view_emp_gender" name="view_emp_gender" style="height: 30px;font-size: 12px;" required="required" disabled>
    											<option value="">Select Gender</option>
    											
														<option value="Female">Female</option>
														<option value="Male">Male</option>
						                        
    										</select>
										</div>
									</div>
								</div>
								


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_state" name="view_emp_state"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_city" name="view_emp_city"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_emp_pin" name="view_emp_pin"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Address</label>
										<div class="col-sm-12">
                  						  <textarea class="form-control" id="view_emp_add" name="view_emp_add" rows="3" required="required" disabled></textarea>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp DOB</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_emp_dob" name="view_emp_dob"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Marital Status</label>
										<div class="col-sm-12">
										<select class="form-control" id="view_emp_mari_status" name="view_emp_mari_status" style="height: 30px;font-size: 12px;" required="required" disabled>
    											<option value="">Select Marital Status</option>
    											
														<option value="Marrid">Marrid</option>
														<option value="UnMarrid">UnMarrid</option>
						                        
    										</select>
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp Qualification</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_qualif" name="view_emp_qualif"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emp DOJ</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_emp_doj" name="view_emp_doj"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emerg. Contact Person</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_emg_cont_per" name="view_emp_emg_cont_per"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Emerg. Contact Number	</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_emp_emg_cont_per_no" name="view_emp_emg_cont_per_no"  style="height: 30px;" required="required" disabled>
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
function editDetails(emp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchEmpByEmp_id')?>/" + emp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="emp_id"]').val(data.emp_id);
				$('[name="edit_hosp_id"]').val(data.hosp_id);
				$('[name="edit_dept_id"]').val(data.dept_id);
				$('[name="edit_emp_code"]').val(data.emp_code);
				$('[name="edit_emp_fname"]').val(data.emp_fname);
				$('[name="edit_emp_mname"]').val(data.emp_mname);
				$('[name="edit_emp_lname"]').val(data.emp_lname);
				$('[name="edit_emp_pno"]').val(data.emp_pno);
				$('[name="edit_emp_email"]').val(data.emp_email);
				$('[name="edit_emp_gender"]').val(data.emp_gender);
				$('[name="edit_emp_state"]').val(data.emp_state);
				$('[name="edit_emp_city"]').val(data.emp_city);
				$('[name="edit_emp_pin"]').val(data.emp_pin);
				$('[name="edit_emp_add"]').val(data.emp_add);
				$('[name="edit_emp_dob"]').val(data.emp_dob);
				$('[name="edit_emp_mari_status"]').val(data.emp_mari_status);
				$('[name="edit_emp_qualif"]').val(data.emp_qualif);
				$('[name="edit_emp_doj"]').val(data.emp_doj);
				$('[name="edit_emp_emg_cont_per"]').val(data.emp_emg_cont_per);
				$('[name="edit_emp_emg_cont_per_no"]').val(data.emp_emg_cont_per_no);

			
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(emp_id){
	$('[name="remove_emp_id"]').val(emp_id);
	
}


function showDetails(emp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchEmpByEmp_id')?>/" + emp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_hosp_id"]').val(data.hosp_id);
				$('[name="view_dept_id"]').val(data.dept_id);
				$('[name="view_emp_code"]').val(data.emp_code);
				$('[name="view_emp_fname"]').val(data.emp_fname);
				$('[name="view_emp_mname"]').val(data.emp_mname);
				$('[name="view_emp_lname"]').val(data.emp_lname);
				$('[name="view_emp_pno"]').val(data.emp_pno);
				$('[name="view_emp_email"]').val(data.emp_email);
				$('[name="view_emp_gender"]').val(data.emp_gender);
				$('[name="view_emp_state"]').val(data.emp_state);
				$('[name="view_emp_city"]').val(data.emp_city);
				$('[name="view_emp_pin"]').val(data.emp_pin);
				$('[name="view_emp_add"]').val(data.emp_add);
				$('[name="view_emp_dob"]').val(data.emp_dob);
				$('[name="view_emp_mari_status"]').val(data.emp_mari_status);
				$('[name="view_emp_qualif"]').val(data.emp_qualif);
				$('[name="view_emp_doj"]').val(data.emp_doj);
				$('[name="view_emp_emg_cont_per"]').val(data.emp_emg_cont_per);
				$('[name="view_emp_emg_cont_per_no"]').val(data.emp_emg_cont_per_no);

			
					
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
