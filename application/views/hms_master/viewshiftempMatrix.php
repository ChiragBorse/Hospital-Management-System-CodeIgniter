<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Employee Shift Matrix</title>
    
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
            <h3 class="m-0">Employee Shift Matrix</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee Shift Matrix</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelSemAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD Emp-Shift</button>
                <h3 class="card-title">Shift Employee Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
					<th>Employee Name</th>
                    <th>Shift Name</th>
                    <th>Shift applicable from</th>
                    <th>Shift applicable to</th>
                    <th>Shift appli reason</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $showSemList= $this->method_call->showSemList();
													if($showSemList!=null){
														$sr_no=1;			  
														foreach ($showSemList->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->emp_fname; ?></td>
                    <td><?php echo $row->shift_name; ?></td>
                    <td><?php echo $row->sem_aplic_from_date; ?></td>
                    <td><?php echo $row->sem_aplic_to_date; ?></td>
                    <td><?php echo $row->sem_aplic_reason; ?></td>
                    <td><?php echo $row->sem_regdate ." - ".$row->sem_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelSemEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->sem_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelSemDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->sem_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelSemView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->sem_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
			<div class="modal fade" id="modelSemAdd" tabindex="-1" role="dialog" aria-labelledby="modelSemAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Shift
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertSem') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Shift </label>
										<div class="col-sm-12">
										<select class="form-control" id="shift_id" name="shift_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Shift</option>
    											<?php $getShift= $this->method_call->getShift();
    											if($getShift!=null){
    											    foreach ($getShift->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->shift_id; ?>"><?php echo $row->shift_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Employee </label>
										<div class="col-sm-12">
										<select class="form-control" id="emp_id" name="emp_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Employee</option>
    											<?php $getEmployee= $this->method_call->getEmployee();
    											if($getEmployee!=null){
    											    foreach ($getEmployee->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->emp_id; ?>"><?php echo $row->emp_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift applicable from date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="sem_aplic_from_date" name="sem_aplic_from_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                               

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift applicable to date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="sem_aplic_to_date" name="sem_aplic_to_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applicable reason </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="sem_aplic_reason" name="sem_aplic_reason" rows="3" required="required" ></textarea>
										<input type="hidden" class="form-control"   id="sem_regby" name="sem_regby" value="100100"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

							</div>   
						</div>   
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Insert Shift Employee</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>


						</form>
					</div>
				</div>
			</div>



                        <!-- Edit Form -->

			<div class="modal fade" id="modelSemEdit" tabindex="-1" role="dialog" aria-labelledby="modelSemEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT Employee Shift
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateSem') ?>" >
						
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Shift </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_shift_id" name="edit_shift_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Shift</option>
    											<?php $getShift= $this->method_call->getShift();
    											if($getShift!=null){
    											    foreach ($getShift->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->shift_id; ?>"><?php echo $row->shift_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Employee </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_emp_id" name="edit_emp_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Employee</option>
    											<?php $getEmployee= $this->method_call->getEmployee();
    											if($getEmployee!=null){
    											    foreach ($getEmployee->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->emp_id; ?>"><?php echo $row->emp_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift applicable from date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_sem_aplic_from_date" name="edit_sem_aplic_from_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                               

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift applicable to date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_sem_aplic_to_date" name="edit_sem_aplic_to_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applicable reason </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="edit_sem_aplic_reason" name="edit_sem_aplic_reason" rows="3" required="required" ></textarea>
										<input type="hidden" class="form-control"   id="sem_id" name="sem_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
														
								</div>
							</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Insert Shift Employee</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>




			<div class="modal fade" id="modelSemDelete" tabindex="-1" role="dialog" aria-labelledby="modelSemDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Shift Employee ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteSem') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="remove_sem_id" name="remove_sem_id" style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Shift Employee</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


			


     <!-- View Sem-->

			<div class="modal fade" id="modelSemView" tabindex="-1" role="dialog" aria-labelledby="modelSemView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW Shift Employee
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					
					    		
							<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/viewSem') ?>" >
						
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Shift </label>
										<div class="col-sm-12">
										 <select class="form-control" id="view_shift_id" name="view_shift_id" style="height: 30px;font-size: 12px;" required="required" disabled>
    											<option value="">Select Shift</option>
    											<?php $getShift= $this->method_call->getShift();
    											if($getShift!=null){
    											    foreach ($getShift->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->shift_id; ?>"><?php echo $row->shift_name;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Employee </label>
										<div class="col-sm-12">
										 <select class="form-control" id="view_emp_id" name="view_emp_id" style="height: 30px;font-size: 12px;" required="required" disabled>
    											<option value="">Select Employee</option>
    											<?php $getEmployee= $this->method_call->getEmployee();
    											if($getEmployee!=null){
    											    foreach ($getEmployee->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->emp_id; ?>"><?php echo $row->emp_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift applicable from date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_sem_aplic_from_date" name="view_sem_aplic_from_date"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

                               
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Shift applicable to date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_sem_aplic_to_date" name="view_sem_aplic_to_date"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Applicable reason </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="view_sem_aplic_reason" name="view_sem_aplic_reason" rows="3" required="required" disabled></textarea>
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
function editDetails(sem_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchSemBySem_id')?>/" + sem_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="sem_id"]').val(data.sem_id);
				$('[name="edit_shift_id"]').val(data.shift_id);
				$('[name="edit_emp_id"]').val(data.emp_id);
				$('[name="edit_sem_aplic_from_date"]').val(data.sem_aplic_from_date);
				$('[name="edit_sem_aplic_to_date"]').val(data.sem_aplic_to_date);
				$('[name="edit_sem_aplic_reason"]').val(data.sem_aplic_reason);
			
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(sem_id){
	$('[name="remove_sem_id"]').val(sem_id);
	
}


function showDetails(sem_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchSemBySem_id')?>/" + sem_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="sem_id"]').val(data.sem_id);
				$('[name="view_shift_id"]').val(data.shift_id);
				$('[name="view_emp_id"]').val(data.emp_id);
				$('[name="view_sem_aplic_from_date"]').val(data.sem_aplic_from_date);
				$('[name="view_sem_aplic_to_date"]').val(data.sem_aplic_to_date);
				$('[name="view_sem_aplic_reason"]').val(data.sem_aplic_reason);
			
					
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
