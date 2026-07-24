<!DOCTYPE html>
<html lang="en">
<head>
	<!--css will import here -->
   
    <title>Patient Prescription</title>
    
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
            <h3 class="m-0">Patient Prescription</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Patient Prescription</li>
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
									style="background-color: #6c757d;color: white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);">ADD PATIENT PRESCRIPTION</button>
                <h3 class="card-title">PRESCRIPTION Settings</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background-color: #6c757d;color: white; font-size: 12px;">
                    <th>Sr.No.</th>
                    <th>Health Issue</th>
                    <th>Medicine Name</th>
                    <th>MEdicine Upto</th>
                    <th>Medicine: Before/After</th>
                    <th>Medicine Time</th>
                    <th>Total Medicine</th>
                    <th>Medicine: Eat/Drink/Count</th>
                    <th>Next Visit Date</th>
                    <th>Precautions</th>
                    <th>Edit/Delete/View</th>
                    
                  </tr>
                  </thead>
                  <tbody style="font-size: 12px;">
				  <?php $pp_data= $this->method_call->showPP();
													if($pp_data!=null){
														$sr_no=1;			  
														foreach ($pp_data->result() as $row)  
														{ 
											?>


                  <tr>
                    <td><?php echo $sr_no; ?></td>
                    <td><?php echo $row->pp_health_issue; ?></td>
                    <td><?php echo $row->pp_medicine_name; ?></td>
                    <td><?php echo $row->pp_medicine_for_days; ?></td>
                    <td><?php echo $row->pp_medi_befo_aftr; ?></td>
                    <td><?php echo $row->pp_medi_time; ?></td>
                    <td><?php echo $row->pp_medicine_total; ?></td>     
                    <td><?php echo $row->pp_medine_eat_drink_count; ?></td>
                    <td><?php echo $row->pp_nextvisitdate; ?></td>
                    <td><?php echo $row->pp_precautions; ?></td>

                    <td>
					    <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <button class="btn btn-success btn-sm rounded-0" data-toggle="modal" data-target="#modelDoctorView" style="background-color: #6c757d;" type="button" data-toggle="tooltip" data-placement="top" onclick="showDetails(<?php echo $row->pp_id; ?>)" title="View"><i class="fa fa-eye"></i></button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">ADD PRESCRIPTION
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="<?php echo site_url('MasterController/insertPP') ?>" >
						
						<div class="modal-body">
							<div class="row">


                                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor Name</label>
										<select class="form-control" id="doc_id" name="doc_id" style="height: 30px;font-size: 12px;" required="required">
    											<option value="">Select Doctor</option>
    											<?php $getdoc= $this->method_call->getDoctor();
    											if($getdoc!=null){
    											    foreach ($getdoc->result() as $row)  
                                                         {  ?>
			
														<option value="<?php echo $row->doc_id; ?>"><?php echo $row->doc_fname;  ?></option>
						                        	<?php }
                                            				}
                                            					?>
					
    										</select>
									</div>
								</div>
									
								<div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Health Issue</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="pp_health_issue" name="pp_health_issue"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine Name</label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="pp_medicine_name" name="pp_medicine_name"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
									<div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine for Days </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="pp_medicine_for_days" name="pp_medicine_for_days"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
            
								
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">When?</label>
                                        <div class="col-sm-4" style="display: flex;">
                                            <p>Before Meal</p>
                                            <input type="radio" class="form-control"   id="pp_medi_befo_aftr" name="pp_medi_befo_aftr" value="Before Meal"  style="height: 40px;" required="required" >
                                        </div>
                                        <div class="col-sm-4" style="display: flex;">
                                            <p>After Meal</p>
                                            <input type="radio" class="form-control"   id="pp_medi_befo_aftr" name="pp_medi_befo_aftr" value="After Meal"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine Time</label>
                                        <div class="col-sm-12">
                                            <input type="time" class="form-control"   id="pp_medi_time" name="pp_medi_time"  style="height: 30px;" required="required" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine Total</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"   id="pp_medicine_total" name="pp_medicine_total"  style="height: 30px;" required="required" >
                                            <input type="hidden" class="form-control"   id="pp_regby" name="pp_regby" value="100100" style="height: 30px;" required="required" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Eat/Drink/Count</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="pp_medine_eat_drink_count" name="pp_medine_eat_drink_count"  style="height: 30px;" required="required" >
                                        
                                        </div>
                                    </div>
                                </div>

                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Next Visit Date</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="pp_nextvisitdate" name="pp_nextvisitdate"  style="height: 40px;" required="required" >
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Precautions </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="pp_precautions" name="pp_precautions"  style="height: 40px;" required="required" >
										</div>
									</div>
								</div>
                               
                                
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn"
								style="background-color:#6c757d; font-size: 12px;color:white;box-shadow: 0 0 3px 1px rgba(0,0,0,.35);text-transform: uppercase;">Create Prescription</button>
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
							<h5 class="modal-title" style="color:white; text-transform: uppercase;">View Prescriptions
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" role="form" enctype="multipart/form-data" action="#">
						
						<div class="modal-body">
							<div class="row">


                            <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Doctor ID</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_doc_id" name="view_doc_id"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>
									
                            <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Health Issue</label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_pp_health_issue" name="view_pp_health_issue"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine Name</label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="view_pp_medicine_name" name="view_pp_medicine_name"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>
                                
                                <div class="col-sm-6">
									<div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine for Days </label>
										<div class="col-sm-12">
                                            <input type="text" class="form-control"   id="view_pp_medicine_for_days" name="view_pp_medicine_for_days"  style="height: 40px;" readonly>
										</div>
									</div>
								</div>
            
								
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">When?</label>
                                        <div class="col-sm-4" style="display: flex;">
                                        <input type="text" class="form-control"   id="view_pp_medi_befo_aftr" name="view_pp_medi_befo_aftr"  style="height: 40px;" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine Time</label>
                                        <div class="col-sm-12">
                                            <input type="time" class="form-control"   id="view_pp_medi_time" name="view_pp_medi_time"  style="height: 30px;" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Medicine Total</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control"   id="view_pp_medicine_total" name="view_pp_medicine_total"  style="height: 30px;" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Eat/Drink/Count</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control"   id="view_pp_medine_eat_drink_count" name="view_pp_medine_eat_drink_count"  style="height: 30px;" readonly>
                                        
                                        </div>
                                    </div>
                                </div>

                
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Next Visit Date</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control"   id="view_pp_nextvisitdate" name="view_pp_nextvisitdate"  style="height: 40px;" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
									<div class="form-group row">
										<label class="col-sm-12 pull-left control-label" style="color: #6c757d;">Precautions </label>
										<div class="col-sm-12">
											<input type="text" class="form-control"   id="view_pp_precautions" name="view_pp_precautions"  style="height: 40px;" readonly>
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


function showDetails(pp_id){
	$.ajax({
			url : "<?php echo site_url('MasterController/fetchPPByPP_id')?>/" + pp_id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{   
				$('[name="view_doc_id"]').val(data.doc_id);
				$('[name="view_pp_health_issue"]').val(data.pp_health_issue);
                $('[name="view_pp_medicine_name"]').val(data.pp_medicine_name);
                $('[name="view_pp_medicine_for_days"]').val(data.pp_medicine_for_days);
                $('[name="view_pp_medi_befo_aftr"]').val(data.pp_medi_befo_aftr);
                $('[name="view_pp_medi_time"]').val(data.pp_medi_time);
                $('[name="view_pp_medicine_total"]').val(data.pp_medicine_total);
                $('[name="view_pp_medine_eat_drink_count"]').val(data.pp_medine_eat_drink_count);
                $('[name="view_pp_nextvisitdate"]').val(data.pp_nextvisitdate);
              	$('[name="view_pp_precautions"]').val(data.pp_precautions);
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
