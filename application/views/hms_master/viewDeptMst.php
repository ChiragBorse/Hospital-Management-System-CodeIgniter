<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Department Master</title>
    
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
            <h3 class="m-0">Department Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department Master</li>
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
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD DEPARTMENT</button>
                <h3 class="card-title">Department Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
					<th>Hospital Name</th>
                    <th>Dept. Name</th>
                    <th>Info</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $showDeptList= $this->method_call->showDeptList();
													if($showDeptList!=null){
														$sr_no=1;			  
														foreach ($showDeptList->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->hosp_name; ?></td>
                    <td><?php echo $row->dept_name; ?></td>
                    <td><?php echo $row->dept_desc; ?></td>
                    <td><?php echo $row->dept_pno; ?></td>
                    <td><?php echo $row->dept_email; ?></td>
                    <td><?php echo $row->dept_regdate ." - ".$row->dept_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->dept_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->dept_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->dept_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD DEPARTMENT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertDepartment') ?>" >
						
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="dept_name" name="dept_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="dept_desc" name="dept_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="dept_pno" name="dept_pno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="dept_email" name="dept_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department HOD ID</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="dept_hod_id" name="dept_hod_id"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="dept_regby" name="dept_regby" value="100100"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>



							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Department</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT DEPARTMENT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateDepartment') ?>" >
						
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_dept_name" name="edit_dept_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="edit_dept_desc" name="edit_dept_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_dept_pno" name="edit_dept_pno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="edit_dept_email" name="edit_dept_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department HOD ID</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_dept_hod_id" name="edit_dept_hod_id"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="dept_id" name="dept_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>



							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Department</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Department ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteDepartment') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-8">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete Reason</label>
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="remove_dept_id" name="remove_dept_id" style="height: 30px;" required="required" >
											<textarea class="form-control" id="dept_delreason" name="dept_delreason"  rows="3" required="required"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Department</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW DEPARTMENT
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_dept_name" name="view_dept_name"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

							
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="view_dept_desc" name="view_dept_desc" rows="3" required="required" disabled></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_dept_pno" name="view_dept_pno"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="view_dept_email" name="view_dept_email"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Department HOD ID</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_dept_hod_id" name="view_dept_hod_id"  style="height: 30px;" required="required" disabled>
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
function editDetails(dept_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchDeptByDept_id')?>/" + dept_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="dept_id"]').val(data.dept_id);
				$('[name="edit_hosp_id"]').val(data.hosp_id);
				$('[name="edit_dept_name"]').val(data.dept_name);
				$('[name="edit_dept_desc"]').val(data.dept_desc);
				$('[name="edit_dept_pno"]').val(data.dept_pno);
				$('[name="edit_dept_email"]').val(data.dept_email);
				$('[name="edit_dept_hod_id"]').val(data.dept_hod_id);
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(dept_id){
	$('[name="remove_dept_id"]').val(dept_id);
	
}


function showDetails(dept_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchDeptByDept_id')?>/" + dept_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="view_hosp_id"]').val(data.hosp_id);
				$('[name="view_dept_name"]').val(data.dept_name);
				$('[name="view_dept_desc"]').val(data.dept_desc);
				$('[name="view_dept_pno"]').val(data.dept_pno);
				$('[name="view_dept_email"]').val(data.dept_email);
				$('[name="view_dept_hod_id"]').val(data.dept_hod_id);

			
					
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
