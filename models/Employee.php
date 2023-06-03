<?php
    class Employee extends Credential{        
        protected $employeeSalary;
        public function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        }
        # Salario del Empleado (Vendedor o Administrador)
        public function setEmployeeSalary($employeeSalary){
            $this->employeeSalary = $employeeSalary;
        }
        public function getEmployeeSalary(){
            return $this->employeeSalary;
        }
        # CU10 - Crear Administrador
        public function createAdmin(){}
        # CU012 - Crear Vendedor
        public function createSeller(){}        
        # CU# - Generar reporte impreso de usuarios
        public function printedUserReport(){}
        # CU# - Generar reporte gráfico de usuarios
        public function graphicUserReport(){}
    }
?>