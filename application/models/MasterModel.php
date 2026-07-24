<?php
class MasterModel extends CI_Model {
    
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    public function insertHospital($data) {
        $this->db->insert('hosp_mst', $data);
     }


     public function showHospitalList(){

       
        $this->db->select('*');
        $this->db->from('hosp_mst');
        $this->db->where("hosp_status=1");
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
        
        
     }

     public function fetchHospitalByHosp_id($hosp_id){

        $condition = "hosp_id  =" . "'" . $hosp_id . "'";
        $this->db->select('*');
        $this->db->from('hosp_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
        return $query->row();
        
    }


    public function updateHospital($data,$hosp_id){


        $this->db->where('hosp_id', $hosp_id);
        $this->db->update('hosp_mst',$data);
    
    }




//dropdown 

    public function getHospital() {
            
        $condition = "hosp_status=1";
        $this->db->select('*');
        $this->db->from('hosp_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    
    public function getPatient() {
        
        $condition = "p_status=1";
        $this->db->select('*');
        $this->db->from('patient_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }

    public function getDept() {
            
        $condition = "dept_status=1";
        $this->db->select('*');
        $this->db->from('dept_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }


    // department methods 
    
    public function insertDepartment($data) {
        $this->db->insert('dept_mst', $data);
     }


     public function showDeptList(){

       
        $this->db->select('*');
        $this->db->from('dept_mst dm, hosp_mst hm');
        $this->db->where("dm.hosp_id=hm.hosp_id AND dm.dept_status=1");
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
        
        
     }

     public function fetchDeptByDept_id($dept_id){

        $condition = "dept_id  =" . "'" . $dept_id . "'";
        $this->db->select('*');
        $this->db->from('dept_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
        return $query->row();
        
    }


    public function updateDepartment($data,$dept_id){


        $this->db->where('dept_id', $dept_id);
        $this->db->update('dept_mst',$data);
    
    }


    // Shift methods 
    
    public function insertShift($data) {
        $this->db->insert('shift_mst', $data);
     }


     public function showShiftList(){

       
        $this->db->select('*');
        $this->db->from('shift_mst sm, hosp_mst hm');
        $this->db->where("sm.hosp_id=hm.hosp_id AND sm.shift_status=1");
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
        
        
     }

     public function fetchShiftByShift_id($shift_id){

        $condition = "shift_id  =" . "'" . $shift_id . "'";
        $this->db->select('*');
        $this->db->from('shift_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
        return $query->row();
        
    }


    public function updateShift($data,$shift_id){


        $this->db->where('shift_id', $shift_id);
        $this->db->update('shift_mst',$data);
    
    }

    // employee master


    
    public function insertEmp($data) {
        $this->db->insert('emp_mst', $data);
     }


     public function showEmpList(){

       
        $this->db->select('*');
        $this->db->from('emp_mst em,dept_mst dm, hosp_mst hm');
        $this->db->where("em.hosp_id=hm.hosp_id AND em.dept_id = dm.dept_id AND em.emp_status=1");
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
        
        
     }

     public function fetchEmpByEmp_id($emp_id){

        $condition = "emp_id  =" . "'" . $emp_id . "'";
        $this->db->select('*');
        $this->db->from('emp_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        
        return $query->row();
        
    }


    public function updateEmp($data,$emp_id){


        $this->db->where('emp_id', $emp_id);
        $this->db->update('emp_mst',$data);
    
    }
    
    
    //shirt matrix
    
    
    //shift employee function
    
    public function insertSem($data) {
        $this->db->insert('shift_emp_matrix	', $data);
    }
    
    
    public function showSemList(){
        
        
        $this->db->select('*');
        $this->db->from('shift_emp_matrix sem, emp_mst em, shift_mst sm');
        $this->db->where("sem.emp_id=em.emp_id AND sem.shift_id=sm.shift_id AND sem.sem_status=1");
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
        
        
    }
    
    public function fetchSemBySem_id($sem_id){
        
        $condition = "sem_id  =" . "'" . $sem_id . "'";
        $this->db->select('*');
        $this->db->from('shift_emp_matrix');
        $this->db->where($condition);
        $query = $this->db->get();
        
        return $query->row();
        
    }
    
    
    public function updateSem($data,$sem_id){
        
        
        $this->db->where('sem_id', $sem_id);
        $this->db->update('shift_emp_matrix',$data);
        
    }
    
    
    
    public function getShift() {
        
        $condition = "shift_status=1";
        $this->db->select('*');
        $this->db->from('shift_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
        }
    }
    
    public function getEmployee() {
        
        $condition = "emp_status=1";
        $this->db->select('*');
        $this->db->from('emp_mst');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query;
        } else {
            return false;
            }
        }
        
        
        
        //code for Patient
        public function insertPatient($data) {
            $this->db->insert('patient_mst', $data);
        }
        
        
        public function showPatientList(){
            
            
            $this->db->select('*');
            $this->db->from('patient_mst');
            $this->db->where("p_status=1");
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query;
            } else {
                return false;
            }
            
            
        }
        
        public function fetchPatientByPatient_id($p_id){
            
            
            $condition = "p_id  =" . "'" . $p_id . "'";
            $this->db->select('*');
            $this->db->from('patient_mst');
            $this->db->where($condition);
            $query = $this->db->get();
            
            return $query->row();
            
        }
        
        
        public function updatePatient($data,$p_id){
            $this->db->where('p_id',$p_id);
            $this->db->update('patient_mst',$data);
        }
        
        
        // patient in out master 
        
        public function insertPio($data) {
            $this->db->insert('patient_in_out', $data);
        }
        
        
        public function showPioList(){
            
            
            $this->db->select('*');
            $this->db->from('patient_in_out pi, patient_mst pm');
            $this->db->where("pi.p_id=pm.p_id AND pi.pio_status=1 ");
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query;
            } else {
                return false;
            }
            
            
        }
        
        public function fetchPioByPio_in($pio_in){
            
            $condition = "pio_in  =" . "'" . $pio_in . "'";
            $this->db->select('*');
            $this->db->from('patient_in_out');
            $this->db->where($condition);
            $query = $this->db->get();
            
            return $query->row();
            
        }
        
        
        public function updatePio($data,$pio_in){
            
            
            $this->db->where('pio_in', $pio_in);
            $this->db->update('patient_in_out',$data);
            
        }
        
        //php code for ward
        public function insertWard($data)
        {
          $this->db->insert('ward_mst',$data);
        }
        
        public function showWardList(){
            $this->db->select('*');
            $this->db->from('ward_mst');
            $this->db->where("ward_status=1");
            $query = $this->db->get();
            if($query->num_rows() >=1){
                return $query;
            }
            else{
                return false;
            }
        }
        
        public function fetchWardByWard_id($ward_id){
            $conditon = "ward_id =". "'" . $ward_id . "'";
            $this->db->select('*');
            $this->db->from('ward_mst');
            $this->db->where($conditon);
            $query = $this->db->get();
            return $query->row();
        }
        
        public function updateWard($data,$ward_id){
            $this->db->where('ward_id',$ward_id);
            $this->db->update('ward_mst',$data);
        }
        public function getWard() {
            
            $condition = "ward_status=1";
            $this->db->select('*');
            $this->db->from('ward_mst');
            $this->db->where($condition);
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query;
            } else {
                return false;
            }
        }
        
        
        
        // bed code  is
        
        //here
        public function showBedList(){
            
            
            $this->db->select('*');
            $this->db->from('bed_mst');
            $this->db->where("bed_status=1");
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query;
            } else {
                return false;
            }
            
            
        }
        
        public function insertBed($data) {
            $this->db->insert('bed_mst', $data);
        }
        
        
        public function updateBed($data,$bed_id){
            $this->db->where('bed_id',$bed_id);
            $this->db->update('bed_mst',$data);
        }
        
        public function fetchBedByBed_id($bed_id){
            $condition = "bed_id  =" . "'" . $bed_id . "'";
            $this->db->select('*');
            $this->db->from('bed_mst');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->row();
        }
        
        
        public function showShiftDoctorMatList(){
            
                

            $this->db->select('*');
            $this->db->from('shift_doc_matrix');
            $this->db->where("sdm_status=1");
            $query = $this->db->get();
            if ($query->num_rows() >= 1) {
                return $query;
            } else {
                return false;
            }
        }


        // =========================
        // ADD THESE FUNCTIONS HERE
        // =========================

            public function insertShiftDoctorMat($data)
             {
                   $this->db->insert('shift_doc_matrix', $data);
                }

             public function fetchShiftDoctorMatBysdm_id($sdm_id)
                {
                  $this->db->where('sdm_id', $sdm_id);
                  $query = $this->db->get('shift_doc_matrix');
                  return $query->row();
                 }

              public function updateShiftDoctorMat($data, $sdm_id)
              {
                 $this->db->where('sdm_id', $sdm_id);
                  $this->db->update('shift_doc_matrix', $data);
                 }

            
            public function showPassList(){
                $this->db->select('*');
                $this->db->from('patient_assign_mat pa, bed_mst bm, doctor_mst dm, ward_mst wm, patient_mst pm');
                $this->db->where("pam_status = 1 AND pa.p_id = pm.p_id AND pa.ward_id = wm.ward_id AND pa.bed_id = bm.bed_id AND pa.doc_id = dm.doc_id");
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
            }
            
            public function insertPam($data) {
                $this->db->insert('patient_assign_mat', $data);
            }
            
            
            public function getBed() {
                
                $condition = "bed_status=1";
                $this->db->select('*');
                $this->db->from('bed_mst');
                $this->db->where($condition);
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
            }
            
            public function getDoctor() {
                
                $condition = "doc_status=1";
                $this->db->select('*');
                $this->db->from('doctor_mst');
                $this->db->where($condition);
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
            }

            public function getdoc()
            {
             $this->db->where('doc_status',1);
               return $this->db->get('doctor_mst');
                }

              public function getDocter()
                 {
                  return $this->getdoc();
                   }
            
            
            public function updatePam($data,$pam_id){
                
                
                $this->db->where('pam_id', $pam_id);
                $this->db->update('patient_assign_mat',$data);
                
            }
            
            
            
            public function fetchPamByPam_id($pam_id){
                
                $condition = "pam_id  =" . "'" . $pam_id . "'";
                $this->db->select('*');
                $this->db->from('patient_assign_mat');
                $this->db->where($condition);
                $query = $this->db->get();
                return $query->row();
            }
            
            
            public function insertDoctor($data) {
                $this->db->insert('doctor_mst', $data);
            }
            
            
            
            public function showDoctorList(){
                
                
                $this->db->select('*');
                $this->db->from('doctor_mst dm, hosp_mst hm');
                $this->db->where("dm.hosp_id = hm.hosp_id AND doc_status=1");
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
                
                
            }
            
            public function fetchDoctorByDoc_id($doc_id){
                
                $condition = "doc_id  =" . "'" . $doc_id . "'";
                $this->db->select('*');
                $this->db->from('doctor_mst');
                $this->db->where($condition);
                $query = $this->db->get();
                
                return $query->row();
                
            }
            
            
            public function updateDoctor($data,$doc_id){
                
                $this->db->where('doc_id',$doc_id);
                $this->db->update('doctor_mst',$data);
            }
            
            
            /* Patient prescription Page model */
            
            
            public function insertPP($data) {
                $this->db->insert('patient_prescription', $data);
            }
            
            
            
            public function showPP(){
                
                
                $this->db->select('*');
                $this->db->from('patient_prescription pp,doctor_mst dm');
                $this->db->where("pp.doc_id = dm.doc_id AND pp_status=1");
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
                
                
            }
            
            public function fetchPPByPP_id($pp_id){
                
                $condition = "pp_id  =" . "'" . $pp_id . "'";
                $this->db->select('*');
                $this->db->from('patient_prescription');
                $this->db->where($condition);
                $query = $this->db->get();
                
                return $query->row();
                
            }
            
            //code for Patient Treatmet
            public function insertPTreatment($data) {
                $this->db->insert('patient_treatment', $data);
            }
            
            
            public function showPTreatmentList(){
                
                
                $this->db->select('*');
                $this->db->from('patient_treatment pt,patient_in_out pio, patient_mst pm, doctor_mst dm');
                $this->db->where("pt.pio_in=pio.pio_in  AND pio.p_id=pm.p_id AND pt.doc_id=dm.doc_id AND pt.tretm_status=1");
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
                
                
            }
            
            public function fetchPTreatmentByPaient_id($pt_id){
                
                $condition = "pt_id  =" . "'" . $pt_id . "'";
                $this->db->select('*');
                $this->db->from('patient_treatment');
                $this->db->where($condition);
                $query = $this->db->get();
                
                return $query->row();
                
            }
            
            
            public function updatePatientTreatment($data,$pt_id){
                $this->db->where('pt_id',$pt_id);
                $this->db->update('patient_treatment',$data);
            }
            
            public function getPatientTreatment() {
                
                $condition = "pt.pio_in=pio.pio_in AND pt.tretm_status=1 AND pio.pio_status=1 AND pm.p_status=1";
                $this->db->select('*');
                $this->db->from('patient_treatment pt, patient_in_out pio, patient_mst pm');
                $this->db->where($condition);
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
            }
            
            
            public function insertOperation($data) {
                $this->db->insert('patient_opration', $data);
            }
            
            
            public function showOperationList(){
                
                
                $this->db->select('*');
                $this->db->from('patient_opration po, patient_in_out pio,patient_mst pm, doctor_mst dm');
                $this->db->where("po.pio_in=pio.pio_in AND pio.p_id=pm.p_id AND po.doc_id=dm.doc_id AND po.po_status=1");
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
                
                
            }
            
            public function fetchOperationBypo_id($po_id){
                
                $condition = "po_id =" . "'" . $po_id . "'";
                $this->db->select('*');
                $this->db->from('patient_opration');
                $this->db->where($condition);
                $query = $this->db->get();
                
                return $query->row();
                
            }
            
            
            public function updateOperation($data,$po_id){
                $this->db->where('po_id',$po_id);
                $this->db->update('patient_opration',$data);
            }
            
            public function getOperation() {
                
                $condition = "po_status=1";
                $this->db->select('*');
                $this->db->from('patient_opration');
                $this->db->where($condition);
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
            }



           
           
           
           
           
           
           
           
            public function insertVisitor($data) {
                $this->db->insert('visitor_mst', $data);
            }
            
            
            public function showVisitorList(){
                
                
                $this->db->select('*');
                $this->db->from('visitor_mst');
            
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
                
                
            }
            
            public function fetchVisitorByvisitor_id($visitor_id){
                
                $condition = "visitor_id =" . "'" . $visitor_id . "'";
                $this->db->select('*');
                $this->db->from('visitor_mst');
                $this->db->where('visitor_id',$visitor_id);
                $query = $this->db->get();
                
                return $query->row();
                
            }
            
            
            public function updateVisitor($visitor_id, $data){
                $this->db->where('visitor_id', $visitor_id);
                $this->db->update('visitor_mst', $data);
            }


            public function deleteVisitor($visitor_id){
                $this->db->where('visitor_id', $visitor_id);
                $this->db->delete('visitor_mst');
            }
            
            public function getVisitor() {
                
                $condition = "visitor_id";
                $this->db->select('*');
                $this->db->from('visitor_mst');
                $this->db->where('visitor_id',$visitor_id);
                $query = $this->db->get();
                if ($query->num_rows() >= 1) {
                    return $query;
                } else {
                    return false;
                }
            }

            

            public function getPatientDetails($p_id) {
                $query = $this->db->select('p_fname, p_lname')
                                  ->from('patient_mst')
                                  ->where('p_id', $p_id)
                                  ->get();
                return $query->row(); // Returns a single row
            }
            
        

               
          
}