<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Operation Master</title>
    
     <?php include(APPPATH.'views/css.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

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
            <h3 class="m-0">Operation Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Operation Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modeloperationAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD OPRATION</button>
                <h3 class="card-title">Operation Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Operation Name </th>
                    <th>Result</th>
                    <th>Remark</th>
                    <th>Operation Date-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $patient_operation_data= $this->method_call->showOperationList();
													if($patient_operation_data!=null){
														$sr_no=1;			  
														foreach ($patient_operation_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->p_fname." ".$row->p_mname." ".$row->p_lname ; ?></td>
                   
                    <td><?php echo $row->doc_fname." ".$row->doc_mname." ".$row->doc_lname ; ?></td>
                    <td><?php echo $row->po_name; ?></td>
                    <td><?php echo $row->po_result; ?></td>
                    <td><?php echo $row->po_remark; ?></td>
                    <td><?php echo $row->po_regdate." ".$row->po_regtime; ?></td>

                                 
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modeloperationEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->po_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modeloperationDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecord(<?php echo $row->po_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modeloperationAdd" tabindex="-1" role="dialog" aria-labelledby="modeloperationAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD OPERATION
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertoperation') ?>" >
						
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Name</label>
										<div class="col-sm-12">
											<input type="Text" class="form-control"   id="po_name" name="po_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Description</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="po_desc" name="po_desc"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Result</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="po_result" name="po_result"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Remark</label>
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="po_by" name="po_by" value="100100"  style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="po_remark" name="po_remark"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

        
                                


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Opeartion</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>

<!--EDIT- -->

			<div class="modal fade" id="modeloperationEdit" tabindex="-1" role="dialog" aria-labelledby="modeloperationEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT OPRATION
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateOperation') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
							

							
								
               
               <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="edit_pio_in" name="edit_pio_in" style="height: 30px;font-size: 12px;" required="required">
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
										<select class="form-control" id="doc_id" name="edit_doc_id" style="height: 30px;font-size: 12px;" required="required">
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Name</label>
										<div class="col-sm-12">
											<input type="Text" class="form-control"   id="edit_po_name" name="edit_po_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Info</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_po_desc" name="edit_po_desc"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Operation Result</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_po_result" name="edit_po_result"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_remark</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_po_remark" name="edit_po_remark"  style="height: 30px;" required="required" >
									<input type="hidden" class="form-control"   id="po_id" name="po_id"  style="height: 30px;" required="required" >
									
										</div>
									</div>
								</div>

            


                                
								</div>
						</div>
						<div class="modal-footer">
						<input type="hidden" class="form-control" id="po_id" name="po_id" style="height: 30px;" required="required">
    <div class="modal-footer">
        <button type="submit" class="btn" style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Operation</button>
        <button class="btn" data-dismiss="modal" style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
    </div>
    </div>
</form>
					</div>
				</div>
			</div>


                                




<!--Delete code id 
here -->
			
			<div class="modal fade" id="modeloperationDelete" tabindex="-1" role="dialog" aria-labelledby="modeloperationDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are you sure to delete this opeartion ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteOperation') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete reason</label>
										<div class="col-sm-12">
										<input type="hidden" class="form-control"   id="remove_po_id" name="remove_po_id" style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="po_delreason" name="po_delreason"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete operation</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


<!--View Record-->

			<div class="modal fade" id="modelOperatonView" tabindex="-1" role="dialog" aria-labelledby="modelOperatonView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">View Operation
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_in </label>
										<div class="col-sm-12">
										<input type="text" class="form-control" id="view_po_in" name="view_po_in" rows="3"  readonly></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">doc_id</label>
										<div class="col-sm-12">
											<input type="int" class="form-control"   id="view_doc_id" name="view_doc_id"  style="height: 30px;" readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_name</label>
										<div class="col-sm-12">
											<input type="Text" class="form-control"   id="view_po_name" name="view_po_name"  style="height: 30px;"  readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_desc</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_po_desc" name="view_po_desc"  style="height: 30px;"  readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_result</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_po_result" name="view_po_result"  style="height: 30px;"  readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_remark</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_po_remark" name="view_po_remark"  style="height: 30px;"  readonly >
										</div>
									</div>edit_
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_regdate</label>
										<div class="col-sm-12">
                    <input type="text" class="form-control" id="view_po_regdate" name="view_po_regdate" rows="3"  readonly></textarea>
										</div>
									</div>
								</div>

                
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_regtime</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_po_regtime" name="view_po_regtime"  style="height: 30px;"  readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">po_by</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_po_by" name="view_po_by"  style="height: 30px;"  readonly>
										</div>
									</div>
								</div>

                               

							</div>
						</div>
						
							
						 <div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Operation</button>
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
function editDetails(po_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchOperationBypo_id')?>/" + po_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   

				$('[name="po_id"]').val(data.po_id);
				$('[name="edit_pio_in"]').val(data.pio_in);
				$('[name="edit_doc_id"]').val(data.doc_id);
				$('[name="edit_po_name"]').val(data.po_name);
				$('[name="edit_po_desc"]').val(data.po_desc);
				$('[name="edit_po_result"]').val(data.po_result);
				$('[name="edit_po_remark"]').val(data.po_remark);
										
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

function deleteRecord(po_id){
	
	$('[name="remove_po_id"]').val(po_id);
}

function showDetails(po_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchOperationBypo_id')?>/" + po_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_po_in"]').val(data.po_in);
				$('[name="view_doc_id"]').val(data.doc_id);
				$('[name="view_po_name"]').val(data.po_name);
				$('[name="view_po_desc"]').val(data.po_desc);
				$('[name="view_po_result"]').val(data.po_result);
				$('[name="view_po_remark"]').val(data.po_remark);
				$('[name="view_po_regdate"]').val(data.po_regdate);
				$('[name="view_po_regtime"]').val(data.po_regtime);
				$('[name="view_po_by"]').val(data.po_by);				
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