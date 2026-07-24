<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   <title>Visitor Master</title> 
    
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
            <h3 class="m-0">Visitor Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Visitor Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelVisitorAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD VISITOR</button>
                <h3 class="card-title">Visitor Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
					<th>Visitor Name</th>
					<th>Patient Id</th>
					<th>Select Patient</th>
                    <th>Visit date</th>
					<th>relation with patient</th>
                    <th>Contact No</th>
                    <th>Edit/Delete/View</th>
                    </tr> 
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $showVisitorList= $this->method_call->showVisitorList();
													if($showVisitorList!=null){
														$sr_no=1;			  
														foreach ($showVisitorList->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->visitor_name; ?></td>
                    <td><?php echo $row->patient_id; ?></td>
					<td><?php echo $row->p_fname ." ".$row->p_lname; ?></td>
					<td><?php echo $row->visit_date; ?></td>
					<td><?php echo $row->rel_with_patient; ?></td>
                    <td><?php echo $row->c_no; ?></td>
                    
 <td> 
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelVisitorEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->visitor_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelVisitorDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->visitor_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelVisitorView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->visitor_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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











           <div class="modal fade" id="modelVisitorAdd" tabindex="-1" role="dialog" aria-labelledby="modelVisitorAdd" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Visitor
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertVisitor') ?>" >
						
						<div class="modal-body">
							<div class="row">

                                <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Sr.No. </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control"   id="visitor_id" name="visitor_id"  style="height: 30px;" required="required" >
                                            </div>
                                        </div>
                                </div>	



                              <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Visitor Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="visitor_name" name="visitor_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="patient_id" name="patient_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>	






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
			
														<option value="<?php echo $row->p_id; ?>"><?php echo $row->p_fname;?><?php echo $row->p_lname; ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
										</div>
									</div>
								</div>
                                
                            
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Visit Date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="visit_date" name="visit_date"  style="height: 30px;" required="required" >
                                            
										</div>
									</div>
								</div>		
                                
                                
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">relation with patient </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="rel_with_patient" name="rel_with_patient"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>		


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Contact No</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="c_no" name="c_no"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>		


                            </div>
                                <div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Visitor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
            </div>
            </div>

						</form>
					</div>
				</div>
			</div>
                


            <div class="modal fade" id="modelVisitorEdit" tabindex="-1" role="dialog" aria-labelledby="modelVisitorEdit" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT Visitor
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateVisitor') ?>" >
						
						<div class="modal-body">
							<div class="row">
                              <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Sr.No.</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="visitor_id" name="visitor_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Visitor Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_visitor_name" name="edit_visitor_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Id </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_patient_id" name="edit_patient_id"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Visit Date </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_visit_date" name="edit_visit_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">relation with patient </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_rel_with_patient" name="edit_rel_with_patient"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Contact No </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_c_no" name="edit_c_no"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                   
                            </div>
                        </div> 
                        
                        
                        <div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Visitor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
            
            
            <div class="modal fade" id="modelVisitorDelete" tabindex="-1" role="dialog" aria-labelledby="modelVisitorDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Visitor ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteVisitor') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-8">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete visitor id</label>
										<div class="co-sm-8">
											<input type="hidden" class="form-control"   id="remove_visitor_id" name="remove_visitor_id" >
											
											<textarea class="form-control"   id="visitor_delreason" name="visitor_delreason" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>


                        <div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Visitor</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
<div class="modal fade" id="modelVisitorView" tabindex="-1" role="dialog" aria-labelledby="modelVisitorView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW Visitor
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Sr.No. </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_visitor_id" name="view_visitor_id"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Visitor Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_visitor_name" name="view_visitor_name"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>


                               
                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Visit Date </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_visit_date" name="view_visit_date"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">relation with patient </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_rel_with_patient" name="view_rel_with_patient"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Contact No </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_c_no" name="view_c_no"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                            </div>
                        </div> 
  
<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Visitor</button>
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
function editDetails(visitor_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchVisitorByvisitor_id')?>/" + visitor_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="visitor_id"]').val(data.visitor_id);
				$('[name="edit_visitor_name"]').val(data.visitor_name);
				$('[name="edit_visit_date"]').val(data.visit_date);
				$('[name="edit_rel_with_patient"]').val(data.rel_with_patient);
				$('[name="edit_c_no"]').val(data.c_no);
				

			
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

function deleteRecored(visitor_id){
	$('[name="remove_visitor_id"]').val(visitor_id);
	
}

function showDetails(visitor_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchVisitorByvisitor_id')?>/" + visitor_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_visitor_name"]').val(data.visitor_name);
				$('[name="view_visit_date"]').val(data.visit_date);
				$('[name="view_rel_with_patient"]').val(data.rel_with_patient);
				$('[name="view_c_no"]').val(data.c_no);
						
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



