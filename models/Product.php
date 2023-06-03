<?php

class Product{
    private $dbh;
    protected $categoryCode;
    protected $categoryName;
    protected $productCode;
    protected $productName;
    protected $productPriceSale;
    protected $productIvaSale;
    protected $productUnit;
    protected $productMeasure;
    protected $productStock;  
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

    

    // este constructor es para crear un producto nuevo en la base de datos
    public function __construct7($categoryCode, $categoryName, $productCode, $productName,$productPriceSale,$productIvaSale,$productUnit,$productMeasure,$productStock){
    
        $this->categoryName = $categoryName;
        $this->productCode = $productCode;
        $this->productName = $productName;
        $this->productPriceSale = $productPriceSale;
        $this->productIvaSale = $productIvaSale;
        $this->productUnit = $productUnit;
        $this->productMeasure = $productMeasure;
        $this->productStock = $productStock;
    }

    // este constructor es para actualizar un producto en la base de datos
    public function __construct2($categoryCode, $categoryName){

        $this->categoryCode = $categoryCode;
        $this->categoryName = $categoryName;
    }
 
    
    # Código de Categoría
    public function setCategoryCode($categoryCode){
        $this->categoryCode = $categoryCode;
    }
    public function getCategoryCode(){
        return $this->categoryCode;
    }

    # Nombre de Categoría
    public function setCategoryName($categoryName){
        $this->categoryName = $categoryName;
    }
    public function getCategoryName(){
        return $this->categoryName;
    }

    # Código de Producto
    public function setProductCode($productCode){
        $this->productCode = $productCode;
    }
    public function getProductCode(){
        return $this->productCode;
    }

    # Nombre de Producto
    public function setProductName($productName){
        $this->productName = $productName;
    }
    public function getProductName(){
        return $this->productName;
    }

    # Precio de Venta
    public function setProductPriceSale($productPriceSale){
        $this->productPriceSale = $productPriceSale;
    }
    public function getProductPriceSale(){
        return $this->productPriceSale;
    }

    # IVA de Venta
    public function setProductIvaSale($productIvaSale){
        $this->productIvaSale = $productIvaSale;
    }
    public function getProductIvaSale(){
        return $this->productIvaSale;
    }

    # Unidad de Medida
    public function setProductUnit($productUnit){
        $this->productUnit = $productUnit;
    }
    public function getProductUnit(){
        return $this->productUnit;
    }

    # Medida
    public function setProductMeasure($productMeasure){
        $this->productMeasure = $productMeasure;
    }
    public function getProductMeasure(){
        return $this->productMeasure;
    }

    # Stock
    public function setProductStock($productStock){
        $this->productStock = $productStock;
    }
    public function getProductStock(){
        return $this->productStock;
    }

    

    /*  ---------------------------------------------------------------------------  */
    /*  ------------------------------- CASOS DE USO ------------------------------  */
    /*  ---------------------------------------------------------------------------  */

        
    # CU025 - Crear categoría
    public function createCategory(){
        try {
            $sql = "INSERT INTO categories VALUES (
                :categoryCode,
                :categoryName
            )";
            $sql = $this->dbh->prepare($sql);   
            $sql->bindValue('categoryCode', $this->getCategoryCode());
            $sql->bindValue('categoryName', $this->getCategoryName());
            $sql->execute();
            return $sql;
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU026 - Consultar categoría
    public function readCategory(){
        try {
            $query = $this->dbh->prepare("SELECT * FROM categories");
            $query->execute();
            return $query->fetchAll();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU027 - Actualizar categoría
    public function updateCategory(){
        try {
            $query = $this->dbh->prepare("UPDATE categories SET categoryName = ? WHERE categoryCode = ?");
            $query->bindParam(1, $this->categoryName);
            $query->bindParam(2, $this->categoryCode);
            $query->execute();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU028 - Eliminar categoría
    public function deleteCategory(){
        try {
            $query = $this->dbh->prepare("DELETE FROM categories WHERE categoryCode = ?");
            $query->bindParam(1, $this->categoryCode);
            $query->execute();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU029 - Crear producto
    public function createProduct(){
        try {
            $query = $this->dbh->prepare("INSERT INTO products (categoryCode, productCode, productName, productPriceSale, productIvaSale, productUnit, productMeasure, productStock) VALUES (?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->categoryCode);
            $query->bindParam(2, $this->productCode);
            $query->bindParam(3, $this->productName);
            $query->bindParam(4, $this->productPriceSale);
            $query->bindParam(5, $this->productIvaSale);
            $query->bindParam(6, $this->productUnit);
            $query->bindParam(7, $this->productMeasure);
            $query->bindParam(8, $this->productStock);
            $query->execute();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU030 - Consultar producto
    public function readProduct(){
        try {
            $query = $this->dbh->prepare("SELECT * FROM products");
            $query->execute();
            return $query->fetchAll();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU031 - Actualizar producto
    public function updateProduct(){
        try {
            $query = $this->dbh->prepare("UPDATE products SET categoryCode = ?, productName = ?, productPriceSale = ?, productIvaSale = ?, productUnit = ?, productMeasure = ?, productStock = ? WHERE productCode = ?");
            $query->bindParam(1, $this->categoryCode);
            $query->bindParam(2, $this->productName);
            $query->bindParam(3, $this->productPriceSale);
            $query->bindParam(4, $this->productIvaSale);
            $query->bindParam(5, $this->productUnit);
            $query->bindParam(6, $this->productMeasure);
            $query->bindParam(7, $this->productStock);
            $query->bindParam(8, $this->productCode);
            $query->execute();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }

    # CU032 - Eliminar producto
    public function deleteProduct(){
        try {
            $query = $this->dbh->prepare("DELETE FROM products WHERE productCode = ?");
            $query->bindParam(1, $this->productCode);
            $query->execute();
        } catch (exception $e) {
            die($e->getMessage());
        }
    }
    

}


