<?php
    class Customer extends Credential{        
        protected $customerBirthDate;
        public function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        }
        public function setCustomerBirthDate($customerBirthDate){
            $this->customerBirthDate = $customerBirthDate;
        }
        public function getCustomerBirthDate(){
            return $this->customerBirthDate;
        }
        # CU011 - Crear Cliente
        public function createCustomer(){}
    }
?>