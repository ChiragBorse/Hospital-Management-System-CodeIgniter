<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Patient In-Out Master</title>
    
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
            <h3 class="m-0">Patient In-Out Master</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient In-Out Master</li>
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
            						<button type="button" class="btn btn-sm align-left float-sm-right" data-toggle="modal" data-target="#modelPioAdd"
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD IN</button>
                <h3 class="card-title">Patient in-out Profile Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>patient name</th>
                    <th>In-date</th>
                    <th>In-time</th>
                    <th>In-reason</th>
                    <th>Out-date</th>
                    <th>Out-time</th>
                    <th>Out-reason</th>
                    <th>RegDate-Time</th>
                    <th>Status</th>
                    <th>Out Patient</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $showPioList= $this->method_call->showPioList();
													if($showPioList!=null){
														$sr_no=1;			  
														foreach ($showPioList->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->p_fname . " ". $row->p_mname. " ". $row->p_lname; ?></td>
                    <td><?php echo $row->pio_indate; ?></td>
                    <td><?php echo $row->pio_intime; ?></td>
                    <td><?php echo $row->pio_in_adm_resn; ?></td>
                    <td><?php echo $row->pio_outdate; ?></td>
                    <td><?php echo $row->pio_outtime; ?></td>
                    <td><?php echo $row->pio_out_reason; ?></td>
                    <td><?php echo $row->pio_regdate ." - ".$row->pio_regtime; ?></td>
                    <td><?php if($row->pio_out_reason=="1"){
                        echo "PATIENT IN";}
                        else{
                            echo "PATIENT OUT";
                        }
                     ?></td>
                    
                    <td>
					<ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelPioEdit" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="editDetails(<?php echo $row->pio_in; ?>)" title="Edit"><i class="fa fa-external-link"></i></button>
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
<div class="modal fade" id="modelPioAdd" tabindex="-1" role="dialog" aria-labelledby="modelPioAdd"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD PATIENT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertPio') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Patient </label>
										<div class="col-sm-12">
										<select class="form-control" id="p_id" name="p_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select patient</option>
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
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient In-date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="pio_indate" name="pio_indate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient In-Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="pio_intime" name="pio_intime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient In-Reason</label>
										<div class="col-sm-12">

										<textarea class="form-control" id="pio_in_adm_resn" name="pio_in_adm_resn" rows="3" required="required"> </textarea>
										<input type="hidden" class="form-control"   id="pio_in_by" name="pio_in_by" value="100100" style="height: 30px;" required="required" >
								
										
										</div>
									</div>
								</div>




                             
                                



							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Patient</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>





			<div class="modal fade" id="modelPioEdit" tabindex="-1" role="dialog" aria-labelledby="modelPioEdit"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">OUT PATIENT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/updatePio') ?>" >
						
						<div class="modal-body">
							<div class="row">
									
								


                                


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Out-date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="pio_outdate" name="pio_outdate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Out-Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="pio_outtime" name="pio_outtime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Out-Reason</label>
										<div class="col-sm-12">
										<textarea class="form-control" id="pio_out_reason" name="pio_out_reason" rows="3" required="required"> </textarea>
										
											<input type="hidden" class="form-control"   id="pio_out_by" name="pio_out_by" value="100100" style="height: 30px;" required="required" >
											<input type="hidden" class="form-control"   id="pio_in" name="pio_in" style="height: 30px;" required="required" >
											
										</div>
									</div>
								</div>


							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Out Patient</button>
							<button class="btn" data-dismiss="modal"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>




			




			<div class="modal fade" id="modelPioView" tabindex="-1" role="dialog" aria-labelledby="modelPioView"
				aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#6c757d;">
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">VIEW PATIENT
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="#">
						
						<div class="modal-body">
							<div class="row">
									
								<!-- <div class="col-sm-4">
									 <div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Select Hospital </label>
										<div class="col-sm-12">
										<select class="form-control" id="view_hosp_id" name="view_hosp_id" style="height: 30px;font-size: 12px;">
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
								</div> -->

								<div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Paitent Id</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_p_id" name="view_p_id"  style="height: 30px;" required="required" disabled>
										</div>
									</div>
								</div>

							
                

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient In-date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_pio_indate" name="view_pio_indate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient In-Time</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_pio_intime" name="view_pio_intime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient In-Reason</label>
										<div class="col-sm-12">
											<input type="textarea" class="form-control"   id="view_pio_in_adm_resn" name="view_pio_in_adm_resn"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>



                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Out-date</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_pio_outdate" name="view_pio_outdate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Out-Time</label>
										<div class="col-sm-12">
											<input type="time" class="form-control"   id="view_pio_outtime" name="view_pio_outtime"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Out-Reason</label>
										<div class="col-sm-12">
											<input type="textarea" class="form-control"   id="view_pio_in_adm_reason" name="view_pio_in_adm_reason"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>


                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Reg-Date</label>
										<div class="col-sm-12">
											<input type="textarea" class="form-control"   id="view_pio_regdate" name="view_pio_out_regdate"  style="height: 30px;" required="required" >
										</div>
									</div>
								</div>
                

                                <div class="col-sm-4">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Patient Reg-Time</label>
										<div class="col-sm-12">
											<input type="date" class="form-control"   id="view_pio_regtime" name="view_pio_regtime"  style="height: 30px;" required="required" >
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
function editDetails(pio_in){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPioByPio_in')?>/" + pio_in,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="pio_in"]').val(data.pio_in);
					
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}


/*function deleteRecored(dept_id){
	$('[name="remove_dept_id"]').val(dept_id);
	
}*/


function showDetails(pio_in){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPioByPio_in')?>/" + pio_in,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				
				$('[name="view_pio_in"]').val(data.pio_in);
				$('[name="view_p_id"]').val(data.p_id);
				$('[name="view_pio_indate"]').val(data.pio_indate);
                $('[name="view_pio_intime"]').val(data.pio_intime);
                $('[name="view_pio_in_reasn"]').val(data.pio_in_resn);
				$('[name="view_pio_outdate"]').val(data.pio_outdate);
                $('[name="view_pio_outtime"]').val(data.pio_outtime);
                $('[name="view_pio_out_reason"]').val(data.pio_out_reason);
			
					
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
