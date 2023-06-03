<?php
    class Buy{
        private $dbh;
            protected $buyCode; 
            protected $buyDate;
            protected $productCode;
            protected $productPriceBuy;
            protected $productIvaBuy;
            protected $productQuantityBuy;
            protected $buyPartial;
            protected $buyIva;
            protected $buyTotal;
            protected $buyInvoice;
            public function __construct(){
                try {
                    $this->dbh = Database::connection();
                    $a = func_get_args(); // Obtener los parámetros enviados
                    $i = func_num_args(); // Obtener el número de parámetros enviados
                    if (method_exists($this,$f='__construct'.$i)) { // Verificar si existe un constructor con ese número de parámetros
                        call_user_func_array(array($this,$f),$a); // Llamar al constructor con los parámetros enviados
                    }
                } catch (exception $e) {
                    die($e->getMessage());
                }
            }

            public function __construct8($buyCode, $buyDate, $productCode, $productPriceBuy, $productIvaBuy, $productQuantityBuy, $buyPartial, $buyIva, $buyTotal, $buyInvoice){
                $this->buyCode = $buyCode;
                $this->buyDate = $buyDate;
                $this->productCode = $productCode;
                $this->productPriceBuy = $productPriceBuy;
                $this->productIvaBuy = $productIvaBuy;
                $this->productQuantityBuy = $productQuantityBuy;
                $this->buyPartial = $buyPartial;
                $this->buyIva = $buyIva;
                $this->buyTotal = $buyTotal;
                $this->buyInvoice = $buyInvoice;
            }

            # Código de Compra
            public function setBuyCode($buyCode){
                $this->buyCode = $buyCode;
            }
            public function getBuyCode(){
                return $this->buyCode;
            }

            # Fecha de Compra
            public function setBuyDate($buyDate){
                $this->buyDate = $buyDate;
            }
            public function getBuyDate(){
                return $this->buyDate;
            }

            # Código de Producto
            public function setProductCode($productCode){
                $this->productCode = $productCode;
            }
            public function getProductCode(){
                return $this->productCode;
            }

            # Precio de Compra
            public function setProductPriceBuy($productPriceBuy){
                $this->productPriceBuy = $productPriceBuy;
            }
            public function getProductPriceBuy(){
                return $this->productPriceBuy;
            }

            # IVA de Compra
            public function setProductIvaBuy($productIvaBuy){
                $this->productIvaBuy = $productIvaBuy;
            }
            public function getProductIvaBuy(){
                return $this->productIvaBuy;
            }

            # Cantidad de Compra
            public function setProductQuantityBuy($productQuantityBuy){
                $this->productQuantityBuy = $productQuantityBuy;
            }
            public function getProductQuantityBuy(){
                return $this->productQuantityBuy;
            }

            # Parcial de Compra
            public function setBuyPartial($buyPartial){
                $this->buyPartial = $buyPartial;
            }
            public function getBuyPartial(){
                return $this->buyPartial;
            }

            # IVA de Compra
            public function setBuyIva($buyIva){
                $this->buyIva = $buyIva;
            }
            public function getBuyIva(){
                return $this->buyIva;
            }

            # Total de Compra
            public function setBuyTotal($buyTotal){
                $this->buyTotal = $buyTotal;
            }
            public function getBuyTotal(){
                return $this->buyTotal;
            }

            # Factura de Compra
            public function setBuyInvoice($buyInvoice){
                $this->buyInvoice = $buyInvoice;
            }
            public function getBuyInvoice(){
                return $this->buyInvoice;
            }



        /*  ---------------------------------------------------------------------------  */
        /*  ------------------------------- CASOS DE USO ------------------------------  */
        /*  ---------------------------------------------------------------------------  */


        

            # CU027 - Registrar compra
            public function createBuy(){
                try {
                    $query = $this->dbh->prepare("INSERT INTO buys (buyCode, buyDate, productCode, productPriceBuy, productIvaBuy, productQuantityBuy, buyPartial, buyIva, buyTotal, buyInvoice) VALUES (?,?,?,?,?,?,?,?,?,?)");
                    $query->bindParam(1, $this->buyCode);
                    $query->bindParam(2, $this->buyDate);
                    $query->bindParam(3, $this->productCode);
                    $query->bindParam(4, $this->productPriceBuy);
                    $query->bindParam(5, $this->productIvaBuy);
                    $query->bindParam(6, $this->productQuantityBuy);
                    $query->bindParam(7, $this->buyPartial);
                    $query->bindParam(8, $this->buyIva);
                    $query->bindParam(9, $this->buyTotal);
                    $query->bindParam(10, $this->buyInvoice);
                    $query->execute();
                } catch (exception $e) {
                    die($e->getMessage());
                }
            }

            # CU028 - Consultar compra
            public function readBuy(){
                try {
                    $query = $this->dbh->prepare("SELECT * FROM buys");
                    $query->execute();
                    return $query->fetchAll();
                } catch (exception $e) {
                    die($e->getMessage());
                }
            }

            # CU029 - Actualizar compra
            public function updateBuy(){
                try {
                    $query = $this->dbh->prepare("UPDATE buys SET buyDate = ?, productCode = ?, productPriceBuy = ?, productIvaBuy = ?, productQuantityBuy = ?, buyPartial = ?, buyIva = ?, buyTotal = ?, buyInvoice = ? WHERE buyCode = ?");
                    $query->bindParam(1, $this->buyDate);
                    $query->bindParam(2, $this->productCode);
                    $query->bindParam(3, $this->productPriceBuy);
                    $query->bindParam(4, $this->productIvaBuy);
                    $query->bindParam(5, $this->productQuantityBuy);
                    $query->bindParam(6, $this->buyPartial);
                    $query->bindParam(7, $this->buyIva);
                    $query->bindParam(8, $this->buyTotal);
                    $query->bindParam(9, $this->buyInvoice);
                    $query->bindParam(10, $this->buyCode);
                    $query->execute();
                } catch (exception $e) {
                    die($e->getMessage());
                }
            }

            # CU030 - Eliminar compra
            public function deleteBuy(){
                try {
                    $query = $this->dbh->prepare("DELETE FROM buys WHERE buyCode = ?");
                    $query->bindParam(1, $this->buyCode);
                    $query->execute();
                } catch (exception $e) {
                    die($e->getMessage());
                }
            }
}