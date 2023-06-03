<?php   
    require_once "models/Order.php";
    class Ordenes{
        private $prueba; // Variable de prueba para verificar la conexión a la base de datos 
        public function __construct(){}
        public function main(){
            require_once "views/company/header.view.php";
            require_once "views/company/index.view.php";
            require_once "views/company/footer.view.php";
        }

        # CU022 - Crear Orden
        public function createOrder(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/01_users/create_order.view.php";            
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {                
                // $orderCode = new Order;
                // $orderCode = $orderCode->createOrder();                
                $order = new Order(  
                    // $_POST['orderCode'],
                    $_POST['customerCode'],
                    $_POST['sellerCode'],
                    $_POST['orderDate'],
                    $_POST['orderCity'],
                    $_POST['orderAddress'],
                    // $_POST['productCode'],
                    // $_POST['productQuantityOrder'],
                    $_POST['orderPartial'],
                    $_POST['orderIva'],
                    $_POST['orderTotal'],
                    $_POST['orderStatus']
                );
                print_r($order);
                $order->createOrder();
                // $order->sendOrder(); 
                header("Location:?c=Ordenes&a=readOrder");                
            }
        }

        # CU023 - Consultar Ordenes
        public function readOrder(){
            $orders = new Order;
            $orders = $orders->readOrder();            
            require_once "views/roles/admin/header.view.php";            
            require_once "views/modules/01_users/read_order.view.php";
            require_once "views/roles/admin/footer.view.php";
        }

        # CU024 - Actualizar Ordenes
        public function updateOrder(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/01_users/update_order.view.php";            
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $order = new Order(
                    $_POST['orderCode'],
                    $_POST['orderName'],
                    $_POST['orderLastName'],
                    $_POST['orderEmail'],
                    $_POST['orderPhone'],
                    $_POST['orderAddress'],
                    $_POST['orderCity'],
                    $_POST['orderCountry'],
                    $_POST['orderPostalCode'],
                    $_POST['orderState'],
                    $_POST['orderDescription']
                );
                $order->updateOrder();
                header("Location:?c=Ordenes&a=readOrder");
            }
        }

        # CU025 - Eliminar Ordenes
        public function deleteOrder(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/admin/header.view.php";
                require_once "views/modules/01_users/delete_order.view.php";            
                require_once "views/roles/admin/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $order = new Order(
                    $_POST['orderCode'],
                    $_POST['orderName'],
                    $_POST['orderLastName'],
                    $_POST['orderEmail'],
                    $_POST['orderPhone'],
                    $_POST['orderAddress'],
                    $_POST['orderCity'],
                    $_POST['orderCountry'],
                    $_POST['orderPostalCode'],
                    $_POST['orderState'],
                    $_POST['orderDescription']
                );
                $order->deleteOrder();
                header("Location:?c=Ordenes&a=readOrder");
            }
        }
    }