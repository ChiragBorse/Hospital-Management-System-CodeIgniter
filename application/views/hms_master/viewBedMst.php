<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Bed Master</title>
    
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
            <h3 class="m-0">Bed Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bed Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelBedAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD BED</button>
                <h3 class="card-title">Bed Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Ward Id</th>
                    <th>Bed No</th>
                    <th>Bed Info</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $bed_data= $this->method_call->showBedList();
													if($bed_data!=null){
														$sr_no=1;			  
														foreach ($bed_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->ward_id; ?></td>
                    <td><?php echo $row->bed_no; ?></td>
                    <td><?php echo $row->bed_info; ?></td>
                    <td><?php echo $row->bed_regdate ." - ".$row->bed_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelBedEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->bed_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelBedDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecord(<?php echo $row->bed_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelBedView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->bed_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
<div class="modal fade" id="modelBedAdd" tabindex="-1" role="dialog" aria-labelledby="modelBedAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD Bed
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertBed') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
									
									<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Hospital </label>
										<div class="col-sm-12">
										<select class="form-control" id="ward_id" name="ward_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Hospital</option>
    											<?php $getHospital= $this->method_call->showWardList();
    											if($getHospital!=null){
    											    foreach ($getHospital->result() as $row)  
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed no </label>
										<div class="col-sm-12">
										  <input type="text" class="form-control"   id="bed_no" name="bed_no"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="bed_info" name="bed_info" rows="3" required="required"></textarea>
                                        <input type="hidden" class="form-control"   id="bed_regby" name="bed_regby" value="100100" style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Bed</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>





			<div class="modal fade" id="modelBedEdit" tabindex="-1" role="dialog" aria-labelledby="modelBedEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT BED
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateBed') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward ID </label>
										<div class="col-sm-12">
											<select class="form-control" id="edit_ward_id" name="edit_ward_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Hospital</option>
    											<?php $getHospital= $this->method_call->showWardList();
    											if($getHospital!=null){
    											    foreach ($getHospital->result() as $row)  
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">bed Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="edit_bed_info" name="edit_bed_info" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed DISB date </label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="edit_bed_disb_date" name="edit_bed_disb_date"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed DISB time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="edit_bed_disb_time" name="edit_bed_disb_time"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed DISB reason</label>
										<div class="col-sm-12">
											<textarea class="form-control" id="edit_bed_disb_reason" name="edit_bed_disb_reason" rows="3" required="required"></textarea>
											<input type="hidden" class="form-control"   id="bed_id" name="bed_id"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="bed_disbby" name="bed_disbby" value="100101" style="height: 30px;" required="required" >
                                        </div>
									</div>
                                </div>


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Edit Bed</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>

                


			
			<div class="modal fade" id="modelBedDelete" tabindex="-1" role="dialog" aria-labelledby="modelBedDelete"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are you sure to delete this Bed ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteBed') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete reason</label>
										<div class="col-sm-12">
										    <input type="hidden" class="form-control"   id="remove_bed_id" name="remove_bed_id" style="height: 30px;" required="required" >
											<input type="text" class="form-control"   id="bed_disb_reason" name="bed_disb_reason"  style="height: 30px;" required="required" >
										    <input type="hidden" class="form-control"   id="bed_disb_by" name="bed_disb_by" style="height: 30px;" required="required" >
                                        </div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Bed</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>


<!--View Record-->

			<div class="modal fade" id="modelBedView" tabindex="-1" role="dialog" aria-labelledby="modelBedView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">View BED
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Ward ID </label>
										<div class="col-sm-12">
											<select class="form-control" id="view_ward_id" name="view_ward_id" disabled="disabled" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Hospital</option>
    											<?php $getHospital= $this->method_call->showWardList();
    											if($getHospital!=null){
    											    foreach ($getHospital->result() as $row)  
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed No </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_bed_no" name="view_bed_no"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>
								
            

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed Info. </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="view_bed_info" name="view_bed_info"  style="height: 30px;" readonly >
                                         </div>
									</div>
								</div>


                

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed Reg-date</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_bed_regdate" name="view_bed_regdate"  style="height: 30px;" readonly >
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Bed Reg-Time</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_bed_regtime" name="view_bed_regtime"  style="height: 30px;" readonly >
                                            <input type="hidden" class="form-control"   id="bed_id" name="bed_id"  style="height: 30px;" readonly >
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
function editDetails(bed_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchBedByBed_id')?>/" + bed_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="bed_id"]').val(data.bed_id);
				$('[name="edit_ward_id"]').val(data.ward_id);
				$('[name="edit_bed_info"]').val(data.bed_info);
				$('[name="edit_bed_disb_date"]').val(data.bed_disb_date);
				$('[name="edit_bed_disb_time"]').val(data.bed_disb_time);
				$('[name="edit_bed_disb_reason"]').val(data.bed_disb_reason);
				$('[name="edit_bed_disb_by"]').val(data.bed_disb_by);					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecord(bed_id){
	
	$('[name="remove_bed_id"]').val(bed_id);
}








function showDetails(bed_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchBedByBed_id')?>/" + bed_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_bed_id"]').val(data.bed_id);
				$('[name="view_ward_id"]').val(data.ward_id);
				$('[name="view_bed_no"]').val(data.bed_no);
				$('[name="view_bed_info"]').val(data.bed_info);
				$('[name="view_bed_regdate"]').val(data.bed_regdate);
				$('[name="view_bed_regtime"]').val(data.bed_regtime);					
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