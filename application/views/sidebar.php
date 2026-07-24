<aside class="main-sidebar sidebar-default-primary elevation-4">
    <!-- Brand Logo -->
    
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>dist/img/hms.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Chirag</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">

          
            <ul class="nav nav-treeview">
            <li class="nav-header">Masters</li>
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewHospitalMst') ?>" class="nav-link">
                  <i class="fa fa-hospital-o nav-icon"></i>
                  <p>Hospital Master</p>
                </a>
              </li>


              



              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewVisitorMst') ?>" class="nav-link">
                  <i class="fa fa-sun-o nav-icon"></i>
                  <p>Visitor Master</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewDeptMst') ?>" class="nav-link">
                  <i class="fa fa-id-badge nav-icon"></i>
                  <p>Department Master</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewShiftMst') ?>" class="nav-link">
                  <i class="fa fa-sun-o nav-icon"></i>
                  <p>Shift Master</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewEmpMst') ?>" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Employee Master</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewshiftempMatrix') ?>" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Shift Assign To Employee </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewPatientMst') ?>" class="nav-link">
                  <i class="fa fa-wheelchair nav-icon"></i>
                  <p>Paitient Master</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewPio') ?>" class="nav-link">
                  <i class="fa fa-universal-access nav-icon"></i>
                  <p>Patient In Out</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewWardMst') ?>" class="nav-link">
                  <i class="fa fa-building-o nav-icon"></i>
                  <p>Ward Master</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewBedMst') ?>" class="nav-link">
                  <i class="fa fa-bed nav-icon"></i>
                  <p>Bed Master</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewPass') ?>" class="nav-link">
                  <i class="fa fa-address-card-o nav-icon"></i>
                  <p>Patient Assignment</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewDoctorMst') ?>" class="nav-link">
                  <i class="fa fa-user-md nav-icon"></i>
                  <p>Doctor Master</p>
                </a>
              </li>
              
                <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewPP') ?>" class="nav-link">
                  <i class="fa fa-pencil-square-o nav-icon"></i>
                  <p>Patient Prescription</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewPatientTreatmentMst') ?>" class="nav-link" >
                  <i class="fa fa-medkit nav-icon"></i>
                  <p>Patient Treatment</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo site_url('MasterController/viewOperationMst') ?>" class="nav-link">
                  <i class="fa fa-heartbeat nav-icon"></i>
                  <p>Patient Operation Master</p>
                </a>
              </li>
          
            </ul>
          </li>
          
         
          
         
         
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>