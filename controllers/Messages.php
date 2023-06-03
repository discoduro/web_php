<?php
    require_once "models/User.php";
    require_once "models/Message.php";
    class Messages{
        private $prueba;
        public function __construct(){}
        public function main(){
            require_once "views/company/header.view.php";
            require_once "views/company/index.view.php";
            require_once "views/company/footer.view.php";
        }
        # CU017 - Crear Mensaje Usuario
        public function createMessageUser(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/company/header.view.php";
                require_once "views/company/contact.view.php";            
                require_once "views/company/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                $userCode = new User;
                $userCode = $userCode->createUserCode();                
                $messageUser = new User(                    
                    $userCode,
                    $_POST['userName'],
                    $_POST['userLastName'],
                    $_POST['userEmail'],
                    null,
                    "profealbeiro2020@gmail.com",
                    $_POST['messageSubject'],
                    $_POST['messageDescription']
                );
                $messageUser->createUser();
                $messageUser->sendMessageUser();
                header("Location:?c=Messages&a=createMessageUser");                
            }
        }
        # CU018 - Crear Mensaje
        public function createMessage(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/create_message.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU19 - Consultar mis Mensajes
        public function readMessageProfile(){
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/read_message_profile.view.php";
            require_once "views/roles/admin/footer.view.php";
        }
        # CU20 - Consultar Mensajes
        public function readMessage(){
            $messages = new Message;
            $messages = $messages->readMessage();            
            require_once "views/roles/admin/header.view.php";            
            require_once "views/modules/01_users/read_message.view.php";
            require_once "views/roles/admin/footer.view.php";
        }        
        # CU21 - Eliminar Mensaje
        public function deleteMessage(){
            $message = new Message;
            $message->deleteMessage($_GET['userCode']);
            header('Location: ?c=Messages&a=readMessage');
        }
    }
?>