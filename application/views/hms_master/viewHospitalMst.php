<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Hospital Master</title>
    
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
            <h3 class="m-0">Hospital Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hospital Master</li>
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
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD HOSPITAL</button>
                <h3 class="card-title">Hospital Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                    <th>State, City</th>
                    <th>Address</th>
                    <th>Lincence</th>
                    <th>RegDate-Time</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $hospital_data= $this->method_call->showHospitalList();
													if($hospital_data!=null){
														$sr_no=1;			  
														foreach ($hospital_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->hosp_name; ?></td>
                    <td><img src="<?php echo base_url(); ?>uploads/hospital_logo/<?php echo $row->hosp_logo; ?>" style="height:50px;width:50px;" class="img-rounded" alt="Cinque Terre"></td>
                    <td><?php echo $row->hosp_pno; ?></td>
                    <td><?php echo $row->hosp_email; ?></td>
                    <td><?php echo $row->hosp_state ." - ".$row->hosp_city; ?></td>
                    <td><?php echo $row->hosp_add; ?></td>
                    <td><?php echo $row->hosp_lic; ?></td>
                    <td><?php echo $row->hosp_regdate ." - ".$row->hosp_regtime; ?></td>
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->hosp_id; ?>)" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalDelete"  style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="deleteRecored(<?php echo $row->hosp_id; ?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelHospitalView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->hosp_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
                                                </li>
                                            </ul>	
					</td>
                    
                  </tr>
				  <?php  $sr_no++; 
				  } 
				
				} 
				?>
                   
                 
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD HOSPITAL
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertHospital') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="hosp_name" name="hosp_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
               
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Logo </label>
										<div class="col-sm-12">
										  <input type="file" class="form-control"   id="hosp_logo" name="hosp_logo"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="hosp_desc" name="hosp_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="hosp_pno" name="hosp_pno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="hosp_email" name="hosp_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="hosp_state" name="hosp_state"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="hosp_city" name="hosp_city"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="hosp_pin" name="hosp_pin"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Address</label>
										<div class="col-sm-12">
                    <textarea class="form-control" id="hosp_add" name="hosp_add" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>

                
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Owner</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="hosp_owner" name="hosp_owner"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Licence</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="hosp_lic" name="hosp_lic"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Registration Date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="hosp_hospregdate" name="hosp_hospregdate"  style="height: 30px;" required="required" >
                    	<input type="hidden" class="form-control"   id="hosp_regby" name="hosp_regby" value="100100" style="height: 30px;" required="required" >
                    </div>
									</div>
								</div>


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Hospital</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">EDIT HOSPITAL
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updateHospital') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_hosp_name" name="edit_hosp_name"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
								
            

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="edit_hosp_desc" name="edit_hosp_desc" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_hosp_pno" name="edit_hosp_pno"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="edit_hosp_email" name="edit_hosp_email"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_hosp_state" name="edit_hosp_state"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_hosp_city" name="edit_hosp_city"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="edit_hosp_pin" name="edit_hosp_pin"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Address</label>
										<div class="col-sm-12">
                    <textarea class="form-control" id="edit_hosp_add" name="edit_hosp_add" rows="3" required="required"></textarea>
										</div>
									</div>
								</div>

                
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Owner</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_hosp_owner" name="edit_hosp_owner"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Licence</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="edit_hosp_lic" name="edit_hosp_lic"  style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="hosp_id" name="hosp_id" style="height: 30px;" required="required" >
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">Are You Sure To Delete This Hospital ?
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/deleteHospital') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								<div class="col-sm-8">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Delete Reason</label>
										<div class="col-sm-12">
											<input type="hidden" class="form-control"   id="remove_hosp_id" name="remove_hosp_id" style="height: 30px;" required="required" >
											
											<textarea class="form-control"   id="hosp_delreason" name="hosp_delreason" rows="2"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Delete Hospital</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW HOSPITAL
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Name </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_hosp_name" name="view_hosp_name"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>
								
            

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Info. </label>
										<div class="col-sm-12">
										<textarea class="form-control" id="view_hosp_desc" name="view_hosp_desc" rows="3" readonly></textarea>
										</div>
									</div>
								</div>


                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Phone no. </label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_hosp_pno" name="view_hosp_pno"  style="height: 30px;" readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Email</label>
										<div class="col-sm-12">
											<input type="email" class="form-control"   id="view_hosp_email" name="view_hosp_email"  style="height: 30px;" readonly >
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital State</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_hosp_state" name="view_hosp_state"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital City</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_hosp_city" name="view_hosp_city"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Pincode</label>
										<div class="col-sm-12">
											<input type="number" class="form-control"   id="view_hosp_pin" name="view_hosp_pin"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Address</label>
										<div class="col-sm-12">
                    <textarea class="form-control" id="view_hosp_add" name="view_hosp_add" rows="3" required="required" readonly></textarea>
										</div>
									</div>
								</div>

                
                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Owner</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_hosp_owner" name="view_hosp_owner"  style="height: 30px;" readonly>
										</div>
									</div>
								</div>

                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Hospital Licence</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_hosp_lic" name="view_hosp_lic"  style="height: 30px;" readonly>
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
			

<!-- Popup Model of bootsratp-->

<!-- script will import here-->
<?php include(APPPATH.'views/script.php');?>
<script>
function editDetails(hosp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchHospitalByHosp_id')?>/" + hosp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="hosp_id"]').val(data.hosp_id);
				$('[name="edit_hosp_name"]').val(data.hosp_name);
				$('[name="edit_hosp_desc"]').val(data.hosp_desc);
				$('[name="edit_hosp_pno"]').val(data.hosp_pno);
				$('[name="edit_hosp_email"]').val(data.hosp_email);
				$('[name="edit_hosp_state"]').val(data.hosp_state);
				$('[name="edit_hosp_city"]').val(data.hosp_city);
				$('[name="edit_hosp_pin"]').val(data.hosp_pin);
				$('[name="edit_hosp_add"]').val(data.hosp_add);
				$('[name="edit_hosp_owner"]').val(data.hosp_owner);
				$('[name="edit_hosp_lic"]').val(data.hosp_lic);

			
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


function deleteRecored(hosp_id){
	$('[name="remove_hosp_id"]').val(hosp_id);
	
}


function showDetails(hosp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchHospitalByHosp_id')?>/" + hosp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_hosp_name"]').val(data.hosp_name);
				$('[name="view_hosp_desc"]').val(data.hosp_desc);
				$('[name="view_hosp_pno"]').val(data.hosp_pno);
				$('[name="view_hosp_email"]').val(data.hosp_email);
				$('[name="view_hosp_state"]').val(data.hosp_state);
				$('[name="view_hosp_city"]').val(data.hosp_city);
				$('[name="view_hosp_pin"]').val(data.hosp_pin);
				$('[name="view_hosp_add"]').val(data.hosp_add);
				$('[name="view_hosp_owner"]').val(data.hosp_owner);
				$('[name="view_hosp_lic"]').val(data.hosp_lic);

			
					
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
