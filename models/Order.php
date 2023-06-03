<?php

    class Order{
        private $dbh;
        protected $orderCode; 
        protected $customerCode;
        protected $sellerCode;
        protected $orderDate;
        protected $orderCity;
        protected $orderAddress;
        protected $productCode;
        protected $productQuantityOrder;
        protected $orderPartial;
        protected $orderIva;
        protected $orderTotal;
        protected $orderStatus;   
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();
                $a = func_get_args();                                               // Obtener un array de parámetros de una función  
                $i = func_num_args();                                               // Obtener el número de parámetros pasados a la función   
                if (method_exists($this, $f = '__construct' . $i)) {                // Compruebe si un método existe en la clase de un objeto 
                    call_user_func_array(array($this, $f), $a);                     // Llamar a un método de una clase dada con un array de parámetros 
                }
            } catch (Exception $e) {                                                // Excepción de captura 
                die($e->getMessage());                                              // Imprimir mensaje de error 
            }
        }

        public function __construct9($customerCode,$sellerCode,$orderDate,$orderCity, $orderAddress, $orderPartial,$orderIva,$orderTotal,$orderStatus){
            $this->customerCode = $customerCode;
            $this->sellerCode = $sellerCode;
            $this->orderDate = $orderDate;
            $this->orderCity = $orderCity;
            $this->orderAddress = $orderAddress;
            $this->orderPartial = $orderPartial;
            $this->orderIva = $orderIva;
            $this->orderTotal = $orderTotal;
            $this->orderStatus = $orderStatus;

        }


        # Código de Orden
        public function setOrderCode($orderCode){
            $this->orderCode = $orderCode;
        }
        public function getOrderCode(){
            return $this->orderCode;
        }

        # Código de Cliente
        public function setCustomerCode($customerCode){
            $this->customerCode = $customerCode;
        }
        public function getCustomerCode(){
            return $this->customerCode;
        }

        # Código de Vendedor
        public function setSellerCode($sellerCode){
            $this->sellerCode = $sellerCode;
        }
        public function getSellerCode(){
            return $this->sellerCode;
        }

        # Fecha de Orden
        public function setOrderDate($orderDate){
            $this->orderDate = $orderDate;
        }
        public function getOrderDate(){
            return $this->orderDate;
        }

        # Ciudad de Orden
        public function setOrderCity($orderCity){
            $this->orderCity = $orderCity;
        }
        public function getOrderCity(){
            return $this->orderCity;
        }

        # Dirección de Orden
        public function setOrderAddress($orderAddress){
            $this->orderAddress = $orderAddress;
        }
        public function getOrderAddress(){
            return $this->orderAddress;
        }

        # Código de Producto
        public function setProductCode($productCode){
            $this->productCode = $productCode;
        }
        public function getProductCode(){
            return $this->productCode;
        }

        # Cantidad de Producto
        public function setProductQuantityOrder($productQuantityOrder){
            $this->productQuantityOrder = $productQuantityOrder;
        }
        public function getProductQuantityOrder(){
            return $this->productQuantityOrder;
        }

        # Parcial de Orden
        public function setOrderPartial($orderPartial){
            $this->orderPartial = $orderPartial;
        }
        public function getOrderPartial(){
            return $this->orderPartial;
        }

        # Iva de Orden
        public function setOrderIva($orderIva){
            $this->orderIva = $orderIva;
        }
        public function getOrderIva(){
            return $this->orderIva;
        }

        # Total de Orden
        public function setOrderTotal($orderTotal){
            $this->orderTotal = $orderTotal;
        }
        public function getOrderTotal(){
            return $this->orderTotal;
        }

        # Estado de Orden
        public function setOrderStatus($orderStatus){
            $this->orderStatus = $orderStatus;
        }
        public function getOrderStatus(){
            return $this->orderStatus;
        }




        /*  ---------------------------------------------------------------------------  */
        /*  ------------------------------- CASOS DE USO ------------------------------  */
        /*  ---------------------------------------------------------------------------  */


        # Cu00 - Crear Orden 

        public function createOrder(){
            try{
                // en esta consulta se le pasan los mismos parametros de la entidad a la que pertenece en la base de datos
                $sql = 'INSERT INTO orders  VALUES (
                    :customerCode,
                    :sellerCode,
                    :orderDate,
                    :orderCity,
                    :orderAddress,
                    :orderPartial,
                    :orderIva,
                    :orderTotal,
                    :orderStatus
                    )';
                $query = $this->dbh->prepare($sql);
                $query->bindValue('customerCode', $this->getCustomerCode()); // BINDVALUE: Vincula un parámetro al valor especificado
                $query->bindValue('sellerCode', $this->getSellerCode());
                $query->bindValue('orderDate', $this->getOrderDate());
                $query->bindValue('orderCity', $this->getOrderCity());
                $query->bindValue('orderAddress', $this->getOrderAddress());
                $query->bindValue('orderPartial', $this->getOrderPartial());
                $query->bindValue('orderIva', $this->getOrderIva());
                $query->bindValue('orderTotal', $this->getOrderTotal());
                $query->bindValue('orderStatus', $this->getOrderStatus());
                $query->execute();
                // return true;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        # Cu01 - Consultar Orden 
        public function readOrder(){ // se crea un metodo para leer los datos de la tabla de la base de datos 
            try{
                $orderList = []; // se crea un array para almacenar los datos de la tabla
                $sql = 'SELECT * FROM ORDERS'; // se crea una consulta para seleccionar todos los datos de la tabla
                $sql = $this->dbh->query($sql); // se crea una variable para almacenar la consulta, query sirve para ejecutar una consulta
                    foreach($sql->fetchAll() as $order){ // se crea un foreach para recorrer la consulta y almacenar los datos en el array, fercAll sirve para obtener todas las filas de un conjunto de resultados
                        $orderList[] = new Order( // se crea un array para almacenar los datos de la tabla
                            $order [ 'customer_code'],
                            $order [ 'order_code' ],
                            $order [ 'order_date' ],
                            $order [ 'order_city' ],
                            $order [ 'order_address' ],
                            $order [ 'order_partial' ],
                            $order [ 'order_iva' ],
                            $order [ 'order_total' ],
                            $order [ 'order_status' ]
                        );
                    }
                return $orderList;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        

        # Cu02 - Actualizar Orden
        public function updateOrder(Type $void = null)
        {
            try{
                $sql = 'UPDATE orders SET 
                    customerCode = :customerCode,
                    sellerCode = :sellerCode,
                    orderDate = :orderDate,
                    orderCity = :orderCity,
                    orderAddress = :orderAddress,
                    productCode = :productCode,
                    productQuantityOrder = :productQuantityOrder,
                    orderPartial = :orderPartial,
                    orderIva = :orderIva,
                    orderTotal = :orderTotal,
                    orderStatus = :orderStatus
                    WHERE orderCode = :orderCode';
                $query = $this->dbh->prepare($sql);
                $query->bindValue(':orderCode', $this->orderCode);
                $query->bindValue(':customerCode', $this->customerCode);
                $query->bindValue(':sellerCode', $this->sellerCode);
                $query->bindValue(':orderDate', $this->orderDate);
                $query->bindValue(':orderCity', $this->orderCity);
                $query->bindValue(':orderAddress', $this->orderAddress);
                $query->bindValue(':productCode', $this->productCode);
                $query->bindValue(':productQuantityOrder', $this->productQuantityOrder);
                $query->bindValue(':orderPartial', $this->orderPartial);
                $query->bindValue(':orderIva', $this->orderIva);
                $query->bindValue(':orderTotal', $this->orderTotal);
                $query->bindValue(':orderStatus', $this->orderStatus);
                $query->execute();
                return true;
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }


        # Cu03 - Eliminar Orden

        public function deleteOrder(Type $void = null)
        {
            try{
                $sql = 'DELETE FROM orders WHERE orderCode = :orderCode';
                $query = $this->dbh->prepare($sql);
                $query->bindValue(':orderCode', $this->orderCode);
                $query->execute();
                return true;
            }catch(PDOException $e){
                die($e->getMessage());
            }



    }
}
?>