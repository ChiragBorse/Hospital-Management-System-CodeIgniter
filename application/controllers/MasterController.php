<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterController extends CI_Controller {

	//constructor
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        // Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
        
        $this->load->model('MasterModel');
        // Load database
        $this->method_call =& get_instance();
    }

    public function viewHospitalMst(){

       $this->load->view("hms_master/viewHospitalMst");

    }


    public function insertHospital(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");


        if(!empty($_FILES['hosp_logo']['name'])){
            
            $config['upload_path'] = 'uploads/hospital_logo/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $_FILES['hosp_logo']['name'];
           
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('hosp_logo')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = '';
        }




        $data = array(
            'hosp_name' => $this->input->post('hosp_name'),
            'hosp_logo' => $picture,
            'hosp_desc' => $this->input->post('hosp_desc'),
            'hosp_pno' => $this->input->post('hosp_pno'),
            'hosp_email' => $this->input->post('hosp_email'),
            'hosp_state' => $this->input->post('hosp_state'),
            'hosp_city' => $this->input->post('hosp_city'),
            'hosp_pin' => $this->input->post('hosp_pin'),
            'hosp_add' => $this->input->post('hosp_add'),
            'hosp_owner' => $this->input->post('hosp_owner'),
            'hosp_lic' => $this->input->post('hosp_lic'),
            'hosp_hospregdate' => $this->input->post('hosp_hospregdate'),
            'hosp_regby' => $this->input->post('hosp_regby'),
            'hosp_regdate' => $date,
            'hosp_regtime' =>  $time,
        );

        $this->MasterModel->insertHospital($data);
		echo "<script>alert('Hospital Added Successfully');
                  window.location.href='viewHospitalMst';</script>" ;
               
    }


    public function showHospitalList(){

        $data['hospital_data']=$this->MasterModel->showHospitalList();
        return $data['hospital_data'];

        
    }

    public function fetchHospitalByHosp_id($hosp_id){

        $data = $this->MasterModel->fetchHospitalByHosp_id($hosp_id);
	    echo json_encode($data);
        
    }


    
    public function updateHospital(){

            $hosp_id  =$this->input->post('hosp_id');

            $data = array(
                'hosp_name' => $this->input->post('edit_hosp_name'),
                'hosp_desc' => $this->input->post('edit_hosp_desc'),
                'hosp_pno' => $this->input->post('edit_hosp_pno'),
                'hosp_email' => $this->input->post('edit_hosp_email'),
                'hosp_state' => $this->input->post('edit_hosp_state'),
                'hosp_city' => $this->input->post('edit_hosp_city'),
                'hosp_pin' => $this->input->post('edit_hosp_pin'),
                'hosp_add' => $this->input->post('edit_hosp_add'),
                'hosp_owner' => $this->input->post('edit_hosp_owner'),
                'hosp_lic' => $this->input->post('edit_hosp_lic'),
              );

              $this->MasterModel->updateHospital($data,$hosp_id);
              
              echo "<script>alert('Hospital Updated Successfully');
                  window.location.href='viewHospitalMst';</script>" ;
    }

    public function deleteHospital(){

        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");

        $hosp_id  =$this->input->post('remove_hosp_id');

        $data = array(
            'hosp_delreason' => $this->input->post('hosp_delreason'),
            'hosp_deldate' => $date,
            'hosp_deltime' => $time,
            'hosp_delby' => 100100,
            'hosp_status' => 0,
          );

          $this->MasterModel->updateHospital($data,$hosp_id);
          
          echo "<script>alert('Hospital Deleted Successfully');
              window.location.href='viewHospitalMst';</script>" ;

    }



    // dept master
    // code author: Team A
    // Developer : Chirag, Omkar
    // Method created at: 2023-12-21
    public function viewDeptMst(){

        $this->load->view("hms_master/viewDeptMst");
 
     }
 
     //dorpdown
     public function getHospital(){
	    $data['getHospital']=$this->MasterModel->getHospital();
	    return  $data['getHospital'];
	} 

	public function getPatient(){
	    $data['getPatient']=$this->MasterModel->getPatient();
	    return  $data['getPatient'];
	} 
	
	
    public function getDept(){
	    $data['getDept']=$this->MasterModel->getDept();
	    return  $data['getDept'];
	} 


     public function insertDepartment(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A"); 
 
         $data = array(
             'hosp_id' => $this->input->post('hosp_id'),
             'dept_name' => $this->input->post('dept_name'),
             'dept_desc' => $this->input->post('dept_desc'),
             'dept_pno' => $this->input->post('dept_pno'),
             'dept_email' => $this->input->post('dept_email'),
             'dept_hod_id' => $this->input->post('dept_hod_id'),
             'dept_regdate' => $date,
             'dept_regtime' =>  $time,
             'dept_regby'  => $this->input->post('dept_regby'),
         );
 
         $this->MasterModel->insertDepartment($data);
         echo "<script>alert('Department Added Successfully');
                   window.location.href='viewDeptMst';</script>" ;
                
     }
 
 
     public function showDeptList(){
 
         $data['showDeptList']=$this->MasterModel->showDeptList();
         return $data['showDeptList'];
 
         
     }
 
     public function fetchDeptByDept_id($dept_id){
 
         $data = $this->MasterModel->fetchDeptByDept_id($dept_id);
         echo json_encode($data);
         
     }
 
 
     
     public function updateDepartment(){
 
             $dept_id  =$this->input->post('dept_id');
 
             $data = array(
                'hosp_id' => $this->input->post('edit_hosp_id'),
                'dept_name' => $this->input->post('edit_dept_name'),
                'dept_desc' => $this->input->post('edit_dept_desc'),
                'dept_pno' => $this->input->post('edit_dept_pno'),
                'dept_email' => $this->input->post('edit_dept_email'),
                'dept_hod_id' => $this->input->post('edit_dept_hod_id'),
            );
    
 
               $this->MasterModel->updateDepartment($data,$dept_id);
               
               echo "<script>alert('Depatment Updated Successfully');
                   window.location.href='viewDeptMst';</script>" ;
     }
 
     public function deleteDepartment(){
 
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
 
         $dept_id  =$this->input->post('remove_dept_id');
 
         $data = array(
             'dept_delreason' => $this->input->post('dept_delreason'),
             'dept_deldate' => $date,
             'dept_deltime' => $time,
             'dept_delby' => 100100,
             'dept_status' => 0,
           );
 
           $this->MasterModel->updateDepartment($data,$dept_id);
           
           echo "<script>alert('Department Deleted Successfully');
               window.location.href='viewDeptMst';</script>" ;
 
     }


     //shift master start from here

     public function viewShiftMst(){

        $this->load->view("hms_master/viewShiftMst");
 
     }

     
     public function insertShift(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A"); 

        $data = array(
            'hosp_id' => $this->input->post('hosp_id'),
            'shift_name' => $this->input->post('shift_name'),
            'shift_desc' => $this->input->post('shift_desc'),
            'shift_start_time' => $this->input->post('shift_start_time'),
            'shift_end_time' => $this->input->post('shift_end_time'),
            'shift_total_time_in_hr' => $this->input->post('shift_total_time_in_hr'),
            'shift_regdate' => $date,
            'shift_regtime' =>  $time,
            'shift_regby'  => $this->input->post('shift_regby'),
        );

        $this->MasterModel->insertShift($data);
        echo "<script>alert('Shift Added Successfully');
                  window.location.href='viewShiftMst';</script>" ;
               
    }


    public function showShiftList(){

        $data['showShiftList']=$this->MasterModel->showShiftList();
        return $data['showShiftList'];

        
    }

    public function fetchShiftByShift_id($shift_id){

        $data = $this->MasterModel->fetchShiftByShift_id($shift_id);
        echo json_encode($data);
        
    }


    
    public function updateShift(){

            $shift_id  =$this->input->post('shift_id');

            $data = array(
                'hosp_id' => $this->input->post('edit_hosp_id'),
                'shift_name' => $this->input->post('edit_shift_name'),
                'shift_desc' => $this->input->post('edit_shift_desc'),
                'shift_start_time' => $this->input->post('edit_shift_start_time'),
                'shift_end_time' => $this->input->post('edit_shift_end_time'),
                'shift_total_time_in_hr' => $this->input->post('edit_shift_total_time_in_hr'),
            );
    
   

              $this->MasterModel->updateShift($data,$shift_id);
              
              echo "<script>alert('Shift Updated Successfully');
                  window.location.href='viewShiftMst';</script>" ;
    }

    public function deleteShift(){

        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y');
        $time = date("h:i A");

        $shift_id  =$this->input->post('remove_shift_id');

        $data = array(
            'shift_delreason' => $this->input->post('shift_delreason'),
            'shift_deldate' => $date,
            'shift_deltime' => $time,
            'shift_delby' => 100100,
            'shift_status' => 0,
          );

          $this->MasterModel->updateShift($data,$shift_id);
          
          echo "<script>alert('Shift Deleted Successfully');
              window.location.href='viewShiftMst';</script>" ;

    }



    // employee master 

    
    public function viewEmpMst(){

        $this->load->view("hms_master/viewEmpMst");
 
     }
 
 
     public function insertEmp(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
 
 
         if(!empty($_FILES['emp_photo']['name'])){
             
             $config['upload_path'] = 'uploads/emp_photo/';
             $config['allowed_types'] = 'jpg|jpeg|png';
             $config['file_name'] = $_FILES['emp_photo']['name'];
            
             //Load upload library and initialize configuration
             $this->load->library('upload',$config);
             $this->upload->initialize($config);
             
             if($this->upload->do_upload('emp_photo')){
                 $uploadData = $this->upload->data();
                 $picture = $uploadData['file_name'];
             }else{
                 $picture = '';
             }
         }else{
             $picture = '';
         }
 
 
 
 
         $data = array(
             'hosp_id' => $this->input->post('hosp_id'),
             'dept_id' => $this->input->post('dept_id'),
             'emp_code' => $this->input->post('emp_code'),
             'emp_fname' => $this->input->post('emp_fname'),
             'emp_mname' => $this->input->post('emp_mname'),
             'emp_lname' => $this->input->post('emp_lname'),
             'emp_pno' => $this->input->post('emp_pno'),
             'emp_email' => $this->input->post('emp_email'),
             'emp_gender' => $this->input->post('emp_gender'),
             'emp_state' => $this->input->post('emp_state'),
             'emp_city' => $this->input->post('emp_city'),
             'emp_pin' => $this->input->post('emp_pin'),
             'emp_add' => $this->input->post('emp_add'),
             'emp_photo' => $picture,
             'emp_dob' => $this->input->post('emp_dob'),
             'emp_mari_status' => $this->input->post('emp_mari_status'),
             'emp_qualif' => $this->input->post('emp_qualif'),
             'emp_doj' => $this->input->post('emp_doj'),
             'emp_emg_cont_per' => $this->input->post('emp_emg_cont_per'),
             'emp_emg_cont_per_no' => $this->input->post('emp_emg_cont_per_no'),
             'emp_regby' => $this->input->post('emp_regby'),
             'emp_regdate' => $date,
             'emp_regtime' =>  $time,
         );
 
         $this->MasterModel->insertEmp($data);
         echo "<script>alert('Employee Added Successfully');
                   window.location.href='viewEmpMst';</script>" ;
                
     }
 
 
     public function showEmpList(){
 
         $data['showEmpList']=$this->MasterModel->showEmpList();
         return $data['showEmpList'];
 
         
     }
 
     public function fetchEmpByEmp_id($emp_id){
 
         $data = $this->MasterModel->fetchEmpByEmp_id($emp_id);
         echo json_encode($data);
         
     }
 
 
     
     public function updateEmp(){
 
             $emp_id  =$this->input->post('emp_id');
 
            
         $data = array(
            'hosp_id' => $this->input->post('edit_hosp_id'),
            'dept_id' => $this->input->post('edit_dept_id'),
            'emp_code' => $this->input->post('edit_emp_code'),
            'emp_fname' => $this->input->post('edit_emp_fname'),
            'emp_mname' => $this->input->post('edit_emp_mname'),
            'emp_lname' => $this->input->post('edit_emp_lname'),
            'emp_pno' => $this->input->post('edit_emp_pno'),
            'emp_email' => $this->input->post('edit_emp_email'),
            'emp_gender' => $this->input->post('edit_emp_gender'),
            'emp_state' => $this->input->post('edit_emp_state'),
            'emp_city' => $this->input->post('edit_emp_city'),
            'emp_pin' => $this->input->post('edit_emp_pin'),
            'emp_add' => $this->input->post('edit_emp_add'),
            'emp_dob' => $this->input->post('edit_emp_dob'),
            'emp_mari_status' => $this->input->post('edit_emp_mari_status'),
            'emp_qualif' => $this->input->post('edit_emp_qualif'),
            'emp_doj' => $this->input->post('edit_emp_doj'),
            'emp_emg_cont_per' => $this->input->post('edit_emp_emg_cont_per'),
            'emp_emg_cont_per_no' => $this->input->post('edit_emp_emg_cont_per_no'),
        );
 
               $this->MasterModel->updateEmp($data,$emp_id);
               
               echo "<script>alert('Employee Updated Successfully');
                   window.location.href='viewEmpMst';</script>" ;
     }
 
     public function deleteEmp(){
 
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
 
         $emp_id  =$this->input->post('remove_emp_id');
 
         $data = array(
             'emp_delreason' => $this->input->post('emp_delreason'),
             'emp_deldate' => $date,
             'emp_deltime' => $time,
             'emp_delby' => 100100,
             'emp_status' => 0,
           );
 
           $this->MasterModel->updateEmp($data,$emp_id);
           
           echo "<script>alert('Employee Deleted Successfully');
               window.location.href='viewEmpMst';</script>" ;
 
     }
     
     //shift emp matrix
     
     public function viewshiftempMatrix(){
         
         $this->load->view("hms_master/viewshiftempMatrix");
         
     }
 
     public function insertSem(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $data = array(
             'emp_id' => $this->input->post('emp_id'),
             'shift_id' => $this->input->post('shift_id'),
             'sem_aplic_from_date' => $this->input->post('sem_aplic_from_date'),
             'sem_aplic_to_date' => $this->input->post('sem_aplic_to_date'),
             'sem_aplic_reason' => $this->input->post('sem_aplic_reason'),
             'sem_regdate' => $date,
             'sem_regtime' =>  $time,
             'sem_regby'  => $this->input->post('sem_regby'),
         );
         
         $this->MasterModel->insertSem($data);
         echo "<script>alert('Sift employee Added Successfully');
                  window.location.href='viewshiftempMatrix';</script>" ;
         
     }
     
     
     public function showSemList(){
         
         $data['showSemList']=$this->MasterModel->showSemList();
         return $data['showSemList'];
         
         
     }
     
     
     public function fetchSemBySem_id($sem_id){
         
         $data = $this->MasterModel->fetchSemBySem_id($sem_id);
         echo json_encode($data);
         
     }
     
     public function updateSem(){
         
         $sem_id  =$this->input->post('sem_id');
         
         $data = array(
             'emp_id' => $this->input->post('edit_emp_id'),
             'shift_id' => $this->input->post('edit_shift_id'),
             'sem_aplic_from_date' => $this->input->post('edit_sem_aplic_from_date'),
             'sem_aplic_to_date' => $this->input->post('edit_sem_aplic_to_date'),
             'sem_aplic_reason' => $this->input->post('edit_sem_aplic_reason'),
             
         );
         
         
         $this->MasterModel->updateSem($data,$sem_id);
         
         echo "<script>alert('Shift Employee Updated Successfully');
                  window.location.href='viewshiftempMatrix';</script>" ;
     }
     
     public function deleteSem(){
         
         
         
         $sem_id  =$this->input->post('remove_sem_id');
         
         $data = array(
             'sem_status' => 0,
         );
         
         $this->MasterModel->updateSem($data,$sem_id);
         
         echo "<script>alert('Shift Employee Deleted Successfully');
              window.location.href='viewshiftempMatrix';</script>" ;
         
     }
     
     public function getShift(){
         $data['getShift']=$this->MasterModel->getShift();
         return  $data['getShift'];
     }
     
     
     public function getEmployee(){
         $data['getEmployee']=$this->MasterModel->getEmployee();
         return  $data['getEmployee'];
     }
     
     
     
     //patient master data here
     
     
     
     public function viewPatientMst(){
         
         $this->load->view("hms_master/viewPatientMst");
         
     }
     
     public function insertPatient(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         
         if(!empty($_FILES['p_idproof']['name'])){
             
             $config['upload_path'] = 'uploads/patientIdProof/';
             $config['allowed_types'] = 'jpg|jpeg|png';
             $config['file_name'] = $_FILES['p_idproof']['name'];
             
             //Load upload library and initialize configuration
             $this->load->library('upload',$config);
             $this->upload->initialize($config);
             
             if($this->upload->do_upload('p_idproof')){
                 $uploadData = $this->upload->data();
                 $picture = $uploadData['file_name'];
             }else{
                 $picture = '';
             }
         }else{
             $picture = '';
         }
         
         
         
         
         if(!empty($_FILES['p_photo']['name'])){
             
             $config['upload_path'] = 'uploads/patientPhoto/';
             $config['allowed_types'] = 'jpg|jpeg|png';
             $config['file_name'] = $_FILES['p_photo']['name'];
             
             //Load upload library and initialize configuration
             $this->load->library('upload',$config);
             $this->upload->initialize($config);
             
             if($this->upload->do_upload('p_photo')){
                 $uploadData = $this->upload->data();
                 $picture2 = $uploadData['file_name'];
             }else{
                 $picture2 = '';
             }
         }else{
             $picture2 = '';
         }
         
         $data = array(
             'p_fname' => $this->input->post('p_fname'),
             'p_mname' => $this->input->post('p_mname'),
             'p_lname' => $this->input->post('p_lname'),
             'p_dob' => $this->input->post('p_dob'),
             'p_gender' => $this->input->post('p_gender'),
             'p_state' => $this->input->post('p_state'),
             'p_city' => $this->input->post('p_city'),
             'p_pin' => $this->input->post('p_pin'),
             'p_add' => $this->input->post('p_add'),
             'p_mobilno' => $this->input->post('p_mobilno'),
             'p_email' => $this->input->post('p_email'),
             'p_marital_status' => $this->input->post('p_marital_status'),
             'p_occup' => $this->input->post('p_occup'),
             'p_blood_grp' => $this->input->post('p_blood_grp'),
             'p_aadharno' => $this->input->post('p_aadharno'),
             'p_idproof' =>$picture,
             'p_emg_cont_per' => $this->input->post('p_emg_cont_per'),
             'p_emg_cont_per_no' => $this->input->post('p_emg_cont_per_no'),
             'p_emg_cont_relat' => $this->input->post('p_emg_cont_relat'),
              'p_photo' =>$picture2,
             'p_regdate' => $date,
             'p_regtime' => $time,
             
         );
         
         $this->MasterModel->insertPatient($data);
         echo "<script>alert('Patient Added Successfully');
              window.location.href='viewPatientMst';</script>" ;
         
     }
     
     
     public function showPatientList(){
         
         $data['patient_data']=$this->MasterModel->showPatientList();
         return $data['patient_data'];
         
         
     }
     
     
     public function fetchPatientByPatient_id($p_id){
         
         $data = $this->MasterModel->fetchPatientByPatient_id($p_id);
         echo json_encode($data);
         
     }
     
     
     
     public function updatePatient(){
         
         $p_id  =$this->input->post('p_id');
         $data = array(
             'p_fname' => $this->input->post('edit_p_fname'),
             'p_mname' => $this->input->post('edit_p_mname'),
             'p_lname' => $this->input->post('edit_p_lname'),
             'p_dob' => $this->input->post('edit_p_dob'),
             'p_gender' => $this->input->post('edit_p_gender'),
             'p_state' => $this->input->post('edit_p_state'),
             'p_city' => $this->input->post('edit_p_city'),
             'p_pin' => $this->input->post('edit_p_pin'),
             'p_add' => $this->input->post('edit_p_add'),
             'p_mobilno' => $this->input->post('edit_p_mobilno'),
             'p_email' => $this->input->post('edit_p_email'),
             'p_marital_status' => $this->input->post('edit_p_marital_status'),
             'p_occup' => $this->input->post('edit_p_occup'),
             'p_blood_grp' => $this->input->post('edit_p_blood_grp'),
             'p_emg_cont_per' => $this->input->post('edit_p_emg_cont_per'),
             'p_emg_cont_per_no' => $this->input->post('edit_p_emg_cont_per_no'),
             'p_emg_cont_relat' => $this->input->post('edit_p_emg_cont_relat'),
             
         );
         $this->MasterModel->updatePatient($data,$p_id);
         echo "<script>alert('Patient Updated Successfully');
         window.location.href='viewPatientMst';</script>" ;
         
     }
     
     
     public function deletePatient(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $p_id  =$this->input->post('remove_p_id');
         $data = array(
             'p_delreason' => $this->input->post('p_delreason'),
             'p_deldate' => $date,
             'p_deltime' => $time,
             'p_delby'=>100100,
             'p_status'=>0,
             
         );
         $this->MasterModel->updatePatient($data,$p_id);
         echo "<script>alert('Patient Deleted Successfully');
                window.location.href='viewPatientMst';</script>" ;
     }
     
     
     
     
     // patient in out master 
     
     public function viewPio(){
         
         $this->load->view("hms_master/viewPio");
         
     }
     
     
     
     public function insertPio(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $data = array(
             
             'p_id' => $this->input->post('p_id'),
             'pio_indate' => $this->input->post('pio_indate'),
             'pio_intime' => $this->input->post('pio_intime'),
             'pio_in_adm_resn' => $this->input->post('pio_in_adm_resn'),
             'pio_in_by' => $this->input->post('pio_in_by'),
             'pio_regby' => $this->input->post('pio_in_by'),
             'pio_regdate' => $date,
             'pio_regtime' =>  $time,
             'pio_status' =>  2,
         );
         
         $this->MasterModel->insertPio($data);
         echo "<script>alert('Patient Insetreted Successfully');
                  window.location.href='viewPio';</script>" ;
         
     }
     
     
     public function showPioList(){
         
         $data['showPioList']=$this->MasterModel->showPioList();
         return $data['showPioList'];
         
         
     }
     
     public function fetchPioByPio_in($pio_in){
         
         $data = $this->MasterModel->fetchPioByPio_in($pio_in);
         echo json_encode($data);
         
     }
     
     
     
     public function updatePio(){
         
         $pio_in  =$this->input->post('pio_in');
         
         $data = array(
             
             'pio_outdate' => $this->input->post('pio_outdate'),
             'pio_outtime' => $this->input->post('pio_outtime'),
             'pio_out_reason' => $this->input->post('pio_out_reason'),
         );
         
         
         $this->MasterModel->updatePio($data,$pio_in);
         
         echo "<script>alert('Patient Out Successfully');
                window.location.href='viewPio';</script>";
     
     
     }
     
     
     //php code for Ward Mst
     public function viewWardMst(){
         
         $this->load->view("hms_master/viewWardMst");
         
     }
     
     
     public function insertWard(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         
         
         
         $data = array(
             'ward_name' => $this->input->post('ward_name'),
             'ward_floor' => $this->input->post('ward_floor'),
             'ward_no_of_bed' => $this->input->post('ward_no_of_bed'),
             'ward_desc' => $this->input->post('ward_desc'),
             'ward_regby' => $this->input->post('ward_regby'),
             'ward_regdate' => $date,
             'ward_regtime' =>  $time,
         );
         
         $this->MasterModel->insertWard($data);
         echo "<script>alert('Ward Added Successfully');
              window.location.href='viewWardMst';</script>" ;
         
     }
     
     
     public function showWardList(){
         
         $data['ward_data']=$this->MasterModel->showWardList();
         return $data['ward_data'];
         
         
     }
     
     public function fetchWardByWard_id($ward_id){
         
         $data = $this->MasterModel->fetchWardByWard_id($ward_id);
         echo json_encode($data);
         
     }
     
     
     public function updateWard(){
         $ward_id = $this->input->post('ward_id');
         
         $data = array(
             'ward_name' => $this->input->post('edit_ward_name'),
             'ward_floor' => $this->input->post('edit_ward_floor'),
             'ward_no_of_bed' => $this->input->post('edit_ward_no_of_bed'),
             'ward_desc' => $this->input->post('edit_ward_desc'),
         );
         
         $this->MasterModel->updateWard($data,$ward_id);
         echo "<script>alert('Ward Updated Successfully');
              window.location.href='viewWardMst';</script>" ;
         
     }
     
     
     public function deleteWard(){
         
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $ward_id  =$this->input->post('remove_ward_id');
         
         $data = array(
             'ward_disb_reason' => $this->input->post('ward_delreason'),
             'ward_disb_date' => $date,
             'ward_disb_time' => $time,
             'ward_disb_by' => 100100,
             'ward_status' => 0,
         );
         
         $this->MasterModel->updateward($data,$ward_id);
         
         echo "<script>alert('Ward Deleted Successfully');
          window.location.href='viewWardMst';</script>" ;
         
     }
     
     //Bed master code here
     
     public function viewBedMst(){
         $this->load->view("/hms_master/viewBedMst");
     }
     
     
     public function showBedList(){
         
         $data['bed_data']=$this->MasterModel->showBedList();
         return $data['bed_data'];
         
         
     }
     
     
     public function insertBed(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $data = array(
             
             'ward_id' => $this->input->post('ward_id'),
             'bed_no' => $this->input->post('bed_no'),
             'bed_info' => $this->input->post('bed_info'),
             'bed_regby' => $this->input->post('bed_regby'),
             'bed_regdate' => $date,
             'bed_regtime' => $time,
             
         );
         
         $this->MasterModel->insertBed($data);
         echo "<script>alert('Bed Added Successfully');
                  window.location.href='viewBedMst';</script>" ;
         
     }
     
     
     
     public function updateBed(){
         
         $bed_id  =$this->input->post('bed_id');
         $data = array(
             'bed_id' => $this->input->post('bed_id'),
             'ward_id' => $this->input->post('edit_ward_id'),
             'bed_info' => $this->input->post('edit_bed_info'),
             'bed_disb_date' => $this->input->post('edit_bed_disb_date'),
             'bed_disb_time' => $this->input->post('edit_bed_disb_time'),
             'bed_disb_reason' => $this->input->post('edit_bed_disb_reason'),
             'bed_disb_by' => $this->input->post('bed_disbby'),
             
         );
         $this->MasterModel->updateBed($data,$bed_id);
         echo "<script>alert('Bed Updated Successfully');
         window.location.href='viewBedMst';</script>" ;
         
     }
     
     
     public function fetchBedByBed_id($bed_id){
         
         $data = $this->MasterModel->fetchBedByBed_id($bed_id);
         echo json_encode($data);
         
     }
     
     
     
     public function deleteBed(){
         date_default_timezone_set('Asia/Kolkata');
         
         $bed_id  =$this->input->post('remove_bed_id');
         $data = array(
             'bed_disb_reason' => $this->input->post('bed_disb_reason'),
             'bed_disb_by'=>100100,
             'bed_status'=>0,
             
         );
         $this->MasterModel->updateBed($data,$bed_id);
         echo "<script>alert('Bed Deleted Successfully');
     window.location.href='viewBedMst';</script>" ;
     }
              
     
     // ShiftDoctor
     // code  is here
     
     
     
     public function viewShiftDoctorMatMst(){
         
         $this->load->view("hms_master/viewShiftDoctorMatMst");
         
     }
     
     public function insertShiftDoctorMat(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $data = array(
             // 'doc_id' => $this->input->post('doc_id'),
             'sdm_id' => $this->input->post('sdm_id'),
             // 'shift_id' => $this->input->post('shift_id'),
             'sdm_aplic_from_date' => $this->input->post('sdm_aplic_from_date'),
             'sdm_aplic_to_date' => $this->input->post('sdm_aplic_to_date'),
             'sdm_aplic_reason' => $this->input->post('sdm_aplic_reason'),
             'sdm_regby' => $this->input->post('sdm_regby'),
             'sdm_regdate' => $date,
             'sdm_regtime' => $time,
             'sdm_status' => $time,
         );
         
         $this->MasterModel->insertShiftDoctorMat($data);
         echo "<script>alert('ShiftDoctor Added Successfully');
              window.location.href='viewShiftDoctorMatMst';</script>" ;
         
     }
     
     
     public function showShiftDoctorMatList(){
         
         $data['shift_doctor_matrix_data']=$this->MasterModel->showShiftDoctorMatList();
         return $data['shift_doctor_matrix_data'];
         
         
     }
     
     
     public function fetchShiftDoctorMatBysdm_id($sdm_id){
         
         $data = $this->MasterModel->fetchShiftDoctorMatBysdm_id($sdm_id);
         echo json_encode($data);
         
     }
     
     
     
     public function updateShiftDoctorMat(){
         
         $shift_id  =$this->input->post('shift_id');
         $data = array(
             
             
             
             // 'doc_id' => $this->input->post('doc_id'),
             'sdm_id' => $this->input->post('sdm_id'),
             // 'shift_id' => $this->input->post('shift_id'),
             'sdm_aplic_from_date' => $this->input->post('sdm_aplic_from_date'),
             'sdm_aplic_to_date' => $this->input->post('sdm_aplic_to_date'),
             'sdm_aplic_reason' => $this->input->post('sdm_aplic_reason'),
             'sdm_regby' => $this->input->post('sdm_regby'),
             'sdm_regdate' => $date,
             'sdm_regtime' => $time,
             'sdm_status' => $time,
             
         );
         $this->MasterModel->updateShiftMat($data,$shift_id);
         echo "<script>alert('shiftDoctor Updated Successfully');
         window.location.href='viewShiftMst';</script>" ;
         
     }
     
     
     public function deleteShiftMat(){
         date_default_timezone_set('Asia/Kolkata');
         $date = date('d-m-Y');
         $time = date("h:i A");
         
         $sdm_id  =$this->input->post('remove_sdm_id');
         $data = array(
             'sdm_delreason' => $this->input->post('sdm_delreason'),
             'sdm_deldate'=>$date,
             'sdm_deltime' => $time,
             'sdm_delby'=>100100,
             'sdm_status'=>1,
             
         );
         $this->MasterModel->updateShiftDoctorMat($data,$sdm_id);
         echo "<script>alert('shiftDoctor Deleted Successfully');
         window.location.href='viewShiftDoctorMatMst';</script>" ;
         
     }
     
     public function viewShiftDoctorMat(){
         
         $this->load->view("hms_master/viewShiftDoctorMatMst");
         
         }
         
         
         /* Patient Assignment Controller */
         
         public function viewPass(){
             
             $this->load->view("hms_master/viewPass");
         }
         
         public function showPassList(){
             
             $data['Patient']=$this->MasterModel->showPassList();
             return $data['Patient'];
             
             
         }
         
         
         public function insertPam(){
             date_default_timezone_set('Asia/Kolkata');
             $date = date('d-m-Y');
             $time = date("h:i A");
             
             $data = array(
                 'p_id' => $this->input->post('p_id'),
                 'ward_id' => $this->input->post('ward_id'),
                 'bed_id' => $this->input->post('bed_id'),
                 'doc_id' => $this->input->post('doc_id'),
                 'pam_applic_from_date' => $this->input->post('pam_applic_from_date'),
                 'pam_applic_from_time' => $this->input->post('pam_applic_from_time'),
                 'pam_applic_to_date' => $this->input->post('pam_applic_to_date'),
                 'pam_applic_to_time' => $this->input->post('pam_applic_to_time'),
                 'pam_regby' => $this->input->post('pam_regby'),
                 'pam_regdate' => $date,
                 'pam_regtime' => $time,
             );
             
             $this->MasterModel->insertPam($data);
             echo "<script>alert('Patient Assign Added Successfully');
                  window.location.href='viewPass';</script>" ;
             
         }
         
        
         public function getBed(){
             $data['getBed']=$this->MasterModel->getBed();
             return  $data['getBed'];
         }
         
         
         
         public function getWard(){
             $data['getWard']=$this->MasterModel->getWard();
             return  $data['getWard'];
         }
         
         
         public function getDoctor(){
             $data['getDoctor']=$this->MasterModel->getDoctor();
             return  $data['getDoctor'];
         }
         
         
         public function updatePam(){
             
             $pam_id  =$this->input->post('pam_id');
             
             
             $data = array(
                 'p_id' => $this->input->post('edit_p_id'),
                 'ward_id' => $this->input->post('edit_ward_id'),
                 'bed_id' => $this->input->post('edit_bed_id'),
                 'doc_id' => $this->input->post('edit_doc_id'),
                 'pam_applic_from_date' => $this->input->post('edit_pam_applic_from_date'),
                 'pam_applic_from_time' => $this->input->post('edit_pam_applic_from_time'),
                 'pam_applic_to_date' => $this->input->post('edit_pam_applic_to_date'),
                 'pam_applic_to_time' => $this->input->post('edit_pam_applic_to_time'),
             );
             
             $this->MasterModel->updatePam($data,$pam_id);
             
             echo "<script>alert('Patient Assignment Updated Successfully');
                        window.location.href='viewPass';</script>" ;
         }
         
         public function fetchPamByPam_id($pam_id){
             
             $data = $this->MasterModel->fetchPamByPam_id($pam_id);
             echo json_encode($data);
             
         }
         
         
         public function deletePam(){
              $pam_id  =$this->input->post('remove_pam_id');
             $data = array(
                 'pam_reason' => $this->input->post('pam_reason'),
                 'pam_status' => 0,
             );
             $this->MasterModel->updatePam($data,$pam_id);
            echo "<script>alert('Patient Assignment Deleted Successfully');
            window.location.href='viewPassMst';</script>";
         }
         
         public function deleteAssign(){
             
             
             $pam_id  =$this->input->post('remove_pam_id');
             
             $data = array(
                 'pam_reason' => $this->input->post('pam_reason'),
                 'pam_status' => 0,
             );
             
             $this->MasterModel->updatePam($data,$pam_id);
             
             echo "<script>alert('Patient Assignment Deleted Successfully');
          window.location.href='viewPass';</script>";
             
         }
        
         // doctor master 
         
         public function viewDoctorMst(){
             
             $this->load->view("hms_master/viewDoctorMst");
             
         }
         
         
         public function insertDoctor(){
             date_default_timezone_set('Asia/Kolkata');
             $date = date('d-m-Y');
             $time = date("h:i A");
             
             
             if(!empty($_FILES['doc_photo']['name'])){
                 
                 $config['upload_path'] = 'uploads/doctor_photo/';
                 $config['allowed_types'] = 'jpg|jpeg|png';
                 $config['file_name'] = $_FILES['doc_photo']['name'];
                 
                 
                 $this->load->library('upload',$config);
                 $this->upload->initialize($config);
                 
                 if($this->upload->do_upload('doc_photo')){
                     $uploadData = $this->upload->data();
                     $picture = $uploadData['file_name'];
                 }else{
                     $picture = '';
                 }
             }else{
                 $picture = '';
             }
             
             
             if(!empty($_FILES['doc_certif_img']['name'])){
                 
                 $config['upload_path'] = 'uploads/doctor_certificate/';
                 $config['allowed_types'] = 'jpg|jpeg|png';
                 $config['file_name'] = $_FILES['doc_certif_img']['name'];
                 
                 
                 $this->load->library('upload',$config);
                 $this->upload->initialize($config);
                 
                 if($this->upload->do_upload('doc_certif_img')){
                     $uploadData = $this->upload->data();
                     $picture1 = $uploadData['file_name'];
                 }else{
                     $picture1 = '';
                 }
             }else{
                 $picture1 = '';
             }
             
             $data = array(
                 'hosp_id' => $this->input->post('hosp_id'),
                 'doc_fname' => $this->input->post('doc_fname'),
                 'doc_mname' => $this->input->post('doc_mname'),
                 'doc_lname' => $this->input->post('doc_lname'),
                 'doc_photo' => $picture,
                 'doc_gender' => $this->input->post('doc_gender'),
                 'doc_dob' => $this->input->post('doc_dob'),
                 'doc_doj' => $this->input->post('doc_doj'),
                 'doc_desc	' => $this->input->post('doc_desc'),
                 'doc_qualif' => $this->input->post('doc_qualif'),
                 'doc_mobileno' => $this->input->post('doc_mobileno'),
                 'doc_state' => $this->input->post('doc_state'),
                 'doc_city' => $this->input->post('doc_city'),
                 'doc_pin' => $this->input->post('doc_pin'),
                 'doc_add' => $this->input->post('doc_add'),
                 'doc_certif_img' => $picture1,
                 'doc_email' => $this->input->post('doc_email'),
                 'doc_specl' => $this->input->post('doc_specl'),
                 'doc_regdate' => $date,
                 'doc_regtime' =>  $time,
             );
             
             $this->MasterModel->insertDoctor($data);
             echo "<script>alert('Doctor Added Successfully');
                   window.location.href='viewDoctorMst';</script>" ;
             
         }
         
         
         
         
         public function showDoctorList(){
             
             $data['doctor_data']=$this->MasterModel->showDoctorList();
             return $data['doctor_data'];
             
             
         }
         
         public function fetchDoctorByDoc_id($doc_id){
             
             $data = $this->MasterModel->fetchDoctorByDoc_id($doc_id);
             echo json_encode($data);
             
         }
         
         
         
         public function updateDoctor(){
             
             $doc_id  =$this->input->post('doc_id');
             
             $data = array(
                 'doc_fname' => $this->input->post('edit_doc_fname'),
                 'doc_mname' => $this->input->post('edit_doc_mname'),
                 'doc_lname' => $this->input->post('edit_doc_lname'),
                 'doc_gender' => $this->input->post('edit_doc_gender'),
                 'doc_dob' => $this->input->post('edit_doc_dob'),
                 'doc_doj' => $this->input->post('edit_doc_doj'),
                 'doc_desc	' => $this->input->post('edit_doc_desc'),
                 'doc_qualif' => $this->input->post('edit_doc_qualif'),
                 'doc_mobileno' => $this->input->post('edit_doc_mobileno'),
                 'doc_state' => $this->input->post('edit_doc_state'),
                 'doc_city' => $this->input->post('edit_doc_city'),
                 'doc_pin' => $this->input->post('edit_doc_pin'),
                 'doc_add' => $this->input->post('edit_doc_add'),
                 'doc_email' => $this->input->post('edit_doc_email'),
                 'doc_specl' => $this->input->post('edit_doc_specl'),
                 );
             
             $this->MasterModel->updateDoctor($data,$doc_id);
             
             echo "<script>alert('Doctor Updated Successfully');
             window.location.href='viewDoctorMst';</script>" ;
             
             
         }
         
         public function deleteDoctor(){
             
             date_default_timezone_set('Asia/Kolkata');
             $date = date('d-m-Y');
             $time = date("h:i A");
             
             
             $doc_id  =$this->input->post('remove_doc_id');
             
             $data = array(
                 'doc_delreason' => $this->input->post('doc_delreason'),
                 'doc_deldate' => $date,
                 'doc_deltime' => $time,
                 'doc_delby' => 100100,
                 'doc_status' => 0,
             );
             
             $this->MasterModel->updateDoctor($data,$doc_id);
             
             echo "<script>alert('EDoctor Deleted Successfully');
             window.location.href='viewDoctorMst';</script>";
        
            }

            /* Patient prescription Page Controller */
            
            public function viewPP(){
                
                $this->load->view("hms_master/viewPP");
                
            }
            
            public function insertPP(){
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-Y');
                $time = date("h:i A");
                
                
                if(!empty($_FILES['pp_photo']['name'])){
                    
                    $config['upload_path'] = 'uploads/pp_photo/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['file_name'] = $_FILES['pp_photo']['name'];
                    
                    
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('pp_photo')){
                        $uploadData = $this->upload->data();
                        $picture = $uploadData['file_name'];
                    }else{
                        $picture = '';
                    }
                }else{
                    $picture = '';
                }
                
                $data = array(
                    'doc_id' => $this->input->post('doc_id'),
                    'pp_health_issue' => $this->input->post('pp_health_issue'),
                    'pp_medicine_name' => $this->input->post('pp_medicine_name'),
                    'pp_medicine_for_days' => $this->input->post('pp_medicine_for_days'),
                    'pp_medi_befo_aftr' => $this->input->post('pp_medi_befo_aftr'),
                    'pp_medi_time' => $this->input->post('pp_medi_time'),
                    'pp_medicine_total' => $this->input->post('pp_medicine_total'),
                    'pp_medine_eat_drink_count' => $this->input->post('pp_medine_eat_drink_count'),
                    'pp_nextvisitdate' => $this->input->post('pp_nextvisitdate'),
                    'pp_precautions' => $this->input->post('pp_precautions'),
                    'pp_regdate' => $date,
                    'pp_regtime' =>  $time,
                    'pp_regby' => $this->input->post('pp_regby'),
                );
                
                $this->MasterModel->insertPP($data);
                echo "<script>alert('Prescription Added Successfully');
                   window.location.href='viewPP';</script>" ;
                
            }
            
            
            
            
            public function showPP(){
                
                $data['pp_data']=$this->MasterModel->showPP();
                return $data['pp_data'];
                
                
            }
            
            public function fetchPPByPP_id($pp_id){
                
                $data = $this->MasterModel->fetchPPByPP_id($pp_id);
                echo json_encode($data);
                
            }
            public function getdoc(){
                $data['getdoc']=$this->MasterModel->getdoc();
                return  $data['getdoc'];
            }
            
            
            
            
            //treatment  Master Code
            
            public function viewPatientTreatmentMst(){
                
                $this->load->view("hms_master/viewPatientTreatmentMst");
                
            }
            
            //dorpdown
            public function getPio(){
                $data['getPio']=$this->MasterModel->getPio();
                return  $data['getPio'];
            }
         
            public function getDocter(){
                $data['getDocter']=$this->MasterModel->getDocter();
                return  $data['getDocter'];
            }
            
            public function insertPTreatment(){
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-Y');
                $time = date("h:i A");
                
                $data = array(
                    'pio_in' => $this->input->post('pio_in'),
                    'doc_id' => $this->input->post('doc_id'),
                    'tretm_title' => $this->input->post('tretm_title'),
                    'tretm_desc' => $this->input->post('tretm_desc'),
                    'tretm_time' => $this->input->post('tretm_time'),
                    'tretm_date' => $this->input->post('tretm_date'),
                    'tretm_remark' => $this->input->post('tretm_remark'),
                    'tretm_regdate' => $date,
                    'tretm_regtime' =>  $time,
                    'tretm_regby' =>  $this->input->post('tretm_regby'),
                   
                );
                
                $this->MasterModel->insertPTreatment($data);
                echo "<script>alert('Treatment Added Successfully');
               window.location.href='viewPatientTreatmentMst';</script>" ;
                
            }
            
            
            public function showPTreatmentList(){
                
                $data['showPTreatmentList']=$this->MasterModel->showPTreatmentList();
                return $data['showPTreatmentList'];
                
                
            }
            
            public function fetchPTreatmentBypt_id($pt_id){
                
                $data = $this->MasterModel->fetchPTreatmentBypt_id($pt_id);
                echo json_encode($data);
                
            }
            
            
            
            public function updatePteatment(){
                
                $emp_id  =$this->input->post('emp_id');
                
                
                $data = array(
                    'pio_in' => $this->input->post('edit_pio_in'),
                    'doc_id' => $this->input->post('edit_doc_id'),
                    'tretm_title' => $this->input->post('edit_tretm_title'),
                    'tretm_desc' => $this->input->post('edit_tretm_desc'),
                    'tretm_time' => $this->input->post('edit_tretm_time'),
                    'tretm_date' => $this->input->post('edit_tretm_date'),
                    'tretm_remark' => $this->input->post('edit_emp_pno'),
                    'emp_email' => $this->input->post('edit_tretm_remark'),
                    
                );
                
                $this->MasterModel->updateEmp($data,$pt_id);
                
                echo "<script>alert('Employee Updated Successfully');
               window.location.href='viewEmpMst';</script>" ;
            }
            
            public function deletePTreatment(){
                
                date_default_timezone_set('Asia/Kolkata');
               
                
                $pt_id  =$this->input->post('remove_pt_id');
                
                $data = array(
                    'tretm_status' => 0,
                );
                
                $this->MasterModel->updatePTreatment($data,$pt_id);
                
                echo "<script>alert('Employee Deleted Successfully');
           window.location.href='viewEmpMst';</script>";
                }
                
                
                public function getPatientTreatment(){
                    $data['getPatientTreatment']=$this->MasterModel->getPatientTreatment();
                    return  $data['getPatientTreatment'];
                } 
                
                //opration 
                
                
                public function viewOperationMst(){
                    
                    $this->load->view("hms_master/viewOperationMst");
                    
                }
                
                
                public function insertOperation() {
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-Y');
                    $time = date("h:i A");
                    
                    $data = array(
                        // Do not include 'po_id' in the column list if it's auto-incrementing
                        // 'po_id' => $this->input->post('po_id'),
                        'pio_in' => $this->input->post('pio_in'),
                        'doc_id' => $this->input->post('doc_id'),
                        'po_name' => $this->input->post('po_name'),
                        'po_desc' => $this->input->post('po_desc'),
                        'po_result' => $this->input->post('po_result'),
                        'po_remark' => $this->input->post('po_remark'),
                        'po_regdate' => $this->input->post('po_regdate'),
                        'po_regtime' => $this->input->post('po_regtime'),
                        'po_by' => $this->input->post('po_by'),
                        
                        'po_regdate' => $date,
                        'po_regtime' => $time,
                    );
                    
                    $this->MasterModel->insertOperation($data);
                    echo "<script>alert('Operation Added Successfully');
    window.location.href='viewOperationMst';</script>";
                }
                
                
                
                public function showOperationList(){
                    
                    $data['patient_operation_data']=$this->MasterModel->showOperationList();
                    return $data['patient_operation_data'];
                    
                    
                }
                
                public function fetchOperationBypo_id($po_id){
                    
                    $data = $this->MasterModel->fetchOperationBypo_id($po_id);
                    echo json_encode($data);
                    
                }
                
                public function updateOperation() {
                    $po_id = $this->input->post('po_id');
                    
                    $data = array(
                        
                        
                        'pio_in' => $this->input->post('edit_pio_in'),
                        'doc_id' => $this->input->post('edit_doc_id'),
                        'po_name' => $this->input->post('edit_po_name'),
                        'po_desc' => $this->input->post('edit_po_desc'),
                        'po_result' => $this->input->post('edit_po_result'),
                        'po_remark' => $this->input->post('edit_po_remark'),
                        
                    );
                    
                    $this->MasterModel->updateOperation($data, $po_id);
                    echo "<script>alert('Operation Updated Successfully'); window.location.href='viewOperationMst';</script>";
                }
                
                
                
                public function deleteOperation(){
                    
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-Y');
                    $time = date("h:i A");
                    
                    $po_id  =$this->input->post('remove_po_id');
                    
                    $data = array(
                        'po_status' => 0,                
                    );
                    
                    $this->MasterModel->updateOperation($data,$po_id);
                    
                    echo "<script>alert('Operation  Deleted Successfully');
          window.location.href='viewOperationMst';</script>";
                    
                }
















                public function viewVisitorMst(){
                    
                    $this->load->view("hms_master/viewVisitorMst");
                    
                }
                
                
                public function insertVisitor() {
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-Y');
                    $time = date("h:i A");

                    $p_id = $this->input->post('p_id');


                    $patient = $this->MasterModel->getPatientDetails($p_id);

                    // Check if patient data exists before inserting
                    if (!$patient) {
                        echo "<script>alert('Error: Patient not found!'); window.location.href='viewVisitorMst';</script>";
                        return;
                    }

                    
                    $data = array(
                        // Do not include 'po_id' in the column list if it's auto-incrementing
                        // 'po_id' => $this->input->post('po_id'),
                        'visitor_id' => $this->input->post('visitor_id'),
                        'visitor_name' => $this->input->post('visitor_name'),
                        'patient_id' => $this->input->post('patient_id'),
                        'p_fname' => $patient->p_fname, 
                        'p_lname' => $patient->p_lname,
                        'visit_date' => $this->input->post('visit_date'),
                        'rel_with_patient' => $this->input->post('rel_with_patient'),
                        'c_no' => $this->input->post('c_no'),
                    
                    );
                    
                    $this->MasterModel->insertVisitor($data);
                    echo "<script>alert('visitor Added Successfully');
    window.location.href='viewVisitorMst';</script>";
                }
                
                
                
                public function showVisitorList(){
                    
                    $data['visitor_data']=$this->MasterModel->showVisitorList();
                    return $data['visitor_data'];
                    
                    
                }
                
                public function fetchVisitorByvisitor_id($visitor_id){
                    
                    $data = $this->MasterModel->fetchVisitorByvisitor_id($visitor_id);
                    echo json_encode($data);
                    
                }
                
                public function updateVisitor() {
                    
                    $visitor_id = $this->input->post('visitor_id');
                    $data = array(
                        
                        
                        'visitor_name' => $this->input->post('edit_visitor_name'),
                        'patient_id' => $this->input->post('edit_patient_id'),
                        'p_fname' => $this->input->post('edit_p_fname'),
                        'p_lname' => $this->input->post('edit_p_lname'),
                        'visit_date' => $this->input->post('edit_visit_date'),
                        'rel_with_patient' => $this->input->post('edit_rel_with_patient'),
                        'c_no' => $this->input->post('edit_c_no'),
                        
                        
                    );
                    
                    $this->MasterModel->updateVisitor($visitor_id, $data);
                    echo "<script>alert('visitor Updated Successfully'); window.location.href='viewVisitorMst';</script>";
                }
                
                
                
                public function deleteVisitor(){
                    
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-Y');
                    $time = date("h:i A");
                    
                    $visitor_id  =$this->input->post('remove_visitor_id');
                    
                    
                    
                    $this->MasterModel->deleteVisitor($visitor_id);
                    
                    echo "<script>alert('Visitor  Deleted Successfully');
          window.location.href='viewVisitorMst';</script>";
                    
                }


            }                






                



                
            
               