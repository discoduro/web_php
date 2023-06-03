<?php
    class Credential extends User{        
        protected $credentialPhoto;
        protected $credentialId;
        protected $credentialStartDate;
        protected $credentialPass;
        protected $credentialStatus;
        public function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        }
        public function __construct5($credentialPhoto,$credentialId,$credentialStartDate,$credentialPass,$credentialStatus){            
            $this->credentialPhoto = $credentialPhoto;
            $this->credentialId = $credentialId;
            $this->credentialStartDate = $credentialStartDate;
            $this->credentialPass = $credentialPass;
            $this->credentialStatus = $credentialStatus;
        }
        # Foto de Credencial
        public function setCredentialPhoto($credentialPhoto){
            $this->credentialPhoto = $credentialPhoto;
        }
        public function getCredentialPhoto(){
            return $this->credentialPhoto;
        }               
        # Identificación de la Credencial
        public function setCredentialId($credentialId){
            $this->credentialId = $credentialId;
        }
        public function getCredentialId(){
            return $this->credentialId;
        }               
        # Fecha de Ingreso de la Credencial
        public function setCredentialStartDate($credentialStartDate){
            $this->credentialStartDate = $credentialStartDate;
        }
        public function getCredentialStartDate(){
            return $this->credentialStartDate;
        }               
        # Contraseña de la Credencial
        public function setCredentialPass($credentialPass){
            $this->credentialPass = $credentialPass;
        }
        public function getCredentialPass(){
            return $this->credentialPass;
        }               
        # Estado de la Credencial
        public function setCredentialStatus($credentialStatus){
            $this->credentialStatus = $credentialStatus;
        }
        public function getCredentialStatus(){
            return $this->credentialStatus;
        }
        # CU01 - Iniciar Sesión
        public function login(){}
        # CU03 - Cerrar Sesión
        public function logout(){}
        # CU02 - Recuperar Contraseña
        public function forgotLogin(){}
        # CU08 - Registrarse
        public function register(){}
        # CU15 - Editar Perfil
        public function editProfile(){}
    }
?>