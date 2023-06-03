<?php
    class User{
        private $dbh; // Manejador de la base de datos es privado para que no se pueda acceder desde las clases que heredan de esta clase
        protected $rolCode; // Código de Rol es protegido para que se pueda acceder desde las clases que heredan de esta clase
        protected $rolName;
        protected $userCode;
        protected $userName;
        protected $userLastName;
        protected $userEmail;
        private $message ;
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }        
        public function __construct2($rolCode,$rolName){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
        }
        public function __construct5($rolCode,$userCode,$userName,$userLastName,$userEmail){
            $this->rolCode = $rolCode;            
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
        }
        public function __construct6($rolCode,$rolName,$userCode,$userName,$userLastName,$userEmail){
            $this->rolCode = $rolCode;
            $this->rolName = $rolName;
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
        }
        public function __construct8($userCode,$userName,$userLastName,$userEmail,$messageDate, $messageTo,$messageSubject,$messageDescription){            
            $this->userCode = $userCode;
            $this->userName = $userName;
            $this->userLastName = $userLastName;
            $this->userEmail = $userEmail;
            $this->message = new Message($userCode, $messageDate, $messageTo, $messageSubject, $messageDescription);
        }       
        # Código del Rol
        public function setRolCode($rolCode){
            $this->rolCode = $rolCode;
        }
        public function getRolCode(){
            return $this->rolCode;
        }
        # Nombre del Rol
        public function setRolName($rolName){
            $this->rolName = $rolName;
        }
        public function getRolName(){
            return $this->rolName;
        }
        # Código de Usuario
        public function setUserCode($userCode){
            $this->userCode = $userCode;
        }
        public function getUserCode(){
            return $this->userCode;
        }
        # Nombres de Usuario
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function getUserName(){
            return $this->userName;
        }
        # Apellidos de Usuario
        public function setUserLastName($userLastName){
            $this->userLastName = $userLastName;
        }
        public function getuserLastName(){
            return $this->userLastName;
        }
        # Email de Usuario
        public function setUserEmail($userEmail){
            $this->userEmail = $userEmail;
        }
        public function getUserEmail(){
            return $this->userEmail;
        }
        # Mensaje del Usuario        
        public function getMessageDate(){
            return $this->message->getMessageDate();
        }
        public function getMessageTo(){
            return $this->message->getMessageTo();
        }
        public function getMessageSubject(){
            return $this->message->getMessageSubject();
        }
        public function getMessageDescription(){
            return $this->message->getMessageDescription();
        }
        public function sendMessageUser(){
            $this->message->createMessageUser();
        }

/*  ---------------------------------------------------------------------------  */
/*  ------------------------------- CASOS DE USO ------------------------------  */
/*  ---------------------------------------------------------------------------  */
        
        # CU04 - Crear Rol
        public function createRol(){
            try {                
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';                
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());                
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU05 - Consultar Roles
        public function readRol(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {
                    $rolList[] = new User(
                        $rol['rol_code'],
                        $rol['rol_name']
                    );
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU06_01 - Obtener el código del Rol
        public function getRolByCode($rolCode){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_code=:rolCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new User(
                    $rolDb['rol_code'],
                    $rolDb['rol_name']
                );
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU06 - Actualizar Rol
        public function updateRol(){
            try {                
                $sql = 'UPDATE ROLES SET
                            rol_code = :rolCode,
                            rol_name = :rolName
                        WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU07 - Eliminar Rol
        public function deleteRol($rolCode){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }            
        }
        # CU09_01 - Crear el consecutivo de usuario
        public function createUserCode(){
            try {
                $sql = "SELECT * FROM USERS ORDER BY user_code DESC LIMIT 1";
                $stmt = $this->dbh->prepare($sql);                
                $stmt->execute();                
                $userCode = $stmt->fetch();
                if ($userCode) {
                    $userCode = explode("-",$userCode['user_code']);
                    $userCode = (int)$userCode[1] + 1;
                    if ($userCode < 10) {
                        $userCode = "user-00000" . $userCode;
                    } elseif ($userCode < 100 && $userCode >= 10) {
                        $userCode = "user-0000" . $userCode;
                    } elseif ($userCode < 1000 && $userCode >= 100) {
                        $userCode = "user-000" . $userCode;
                    } elseif ($userCode < 10000 && $userCode >= 1000) {
                        $userCode = "user-00" . $userCode;
                    } elseif ($userCode < 100000 && $userCode >= 10000) {
                        $userCode = "user-0" . $userCode;
                    } 
                } else {
                    $userCode = "user-000001";
                }
                return $userCode; 
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }         
        # CU09 - Crear Usuario
        public function createUser(){
            try {
                $sql = "INSERT INTO USERS VALUES (
                    :rolCode,
                    :userCode,
                    :userName,
                    :userLastName,
                    :userEmail
                )";                
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', 2);
                $stmt->bindValue('userCode', $this->getUserCode()); 
                $stmt->bindValue('userName', $this->getUserName());                
                $stmt->bindValue('userLastName', $this->getUserLastName());                
                $stmt->bindValue('userEmail', $this->getUserEmail());                
                $stmt->execute();                
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU13 - Consultar Usuarios
        public function readUser(){
            try {
                $userList = [];
                $sql = 'SELECT * FROM USERS';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userList[] = new User(
                        $user['rol_code'],
                        $user['user_code'],
                        $user['user_name'],
                        $user['user_lastname'],
                        $user['user_email']
                    );
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU014_01 - Obtener el código del Usuario
        public function getUserByCode($userCode){
            try {
                $sql = "SELECT * FROM USERS WHERE user_code=:userCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new User(
                    $userDb['rol_code'],
                    $userDb['user_code'],
                    $userDb['user_name'],
                    $userDb['user_lastname'],
                    $userDb['user_email']
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU14 - Actualizar Usuario
        public function updateUser(){
            try {
                $sql = 'UPDATE USERS SET                                
                                user_name = :userName,
                                user_lastname = :userLastName,
                                user_email = :userEmail
                            WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);                
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastName', $this->getUserLastName());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        # CU16 - Eliminar Usuario
        public function deleteUser($userCode){
            try {
                $sql = 'DELETE FROM USERS WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }        
    }
?>