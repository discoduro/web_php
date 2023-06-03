<?php
    require_once "models/User.php";
    class Users{
        public function __construct(){}
        public function main(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/roles/admin/admin.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU09 - Crear Usuario
        public function createUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/01_users/create_user.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $userCode = new User;
                $userCode = $userCode->createUserCode();
                $user = new User(
                    null,
                    $userCode,
                    $_POST['userName'],
                    $_POST['userLastName'],
                    $_POST['userEmail']
                );
                $user->createUser();
                header("Location: ?c=Users&a=readUser");
            }
        }
        # CU10 - Crear Administrador
        public function createAdmin(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/create_admin.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU011 - Crear Cliente
        public function createCustomer(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/create_customer.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU012 - Crear Vendedor
        public function createSeller(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/create_seller.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU13 - Consultar Usuarios
        public function readUser(){
            $users = new User;
            $users = $users->readUser();
            require_once "views/roles/admin/header.view.php";            
            require_once "views/modules/01_users/read_user.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU14 - Actualizar Usuario
        public function updateUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $user = new User;
                $user = $user->getUserByCode($_GET['userCode']);
                require_once "views/roles/admin/header.view.php";                
                require_once "views/modules/01_users/update_user.view.php";
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                $user = new User(
                    null,
                    $_POST['userCode'],
                    $_POST['userName'],
                    $_POST['userLastName'],
                    $_POST['userEmail']
                );
                $user->updateUser();
                header('Location: ?c=Users&a=readUser');
            }
        }
        # CU15 - Editar Perfil
        public function editProfile(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/edit_profile.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU16 - Eliminar Usuario
        public function deleteUser(){
            $user = new User;
            $user->deleteUser($_GET['userCode']);
            header('Location: ?c=Users&a=readUser');
        }
    }
?>