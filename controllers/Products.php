<?php
require_once "models/Product.php";
class Products{
    public function __construct(){}

    public function main(){
        require_once "views/company/header.view.php";
        require_once "views/company/index.view.php";
        require_once "views/company/footer.view.php";
    }

    # CU001 - Crear Producto
    public function createProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/create_product.view.php";            
            require_once "views/roles/admin/footer.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new Product(
                $_POST['productCode'],
                $_POST['productName'],
                $_POST['productPriceSale'],
                $_POST['productIvaSale'],
                $_POST['productUnit'],
                $_POST['productMeasure'],
                $_POST['productStock']
            );
            $product->createProduct();
            header("Location:?c=Products&a=readProduct");
        }
    }

    # CU002 - Consultar Productos
    public function readProduct(){
        $products = new Product;
        $products = $products->readProduct();            
        require_once "views/roles/admin/header.view.php";            
        require_once "views/modules/01_users/read_product.view.php";
        require_once "views/roles/admin/footer.view.php";
    }

    # CU003 - Actualizar Productos
    public function updateProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/update_product.view.php";            
            require_once "views/roles/admin/footer.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new Product(
                $_POST['productCode'],
                $_POST['productName'],
                $_POST['productPriceSale'],
                $_POST['productIvaSale'],
                $_POST['productUnit'],
                $_POST['productMeasure'],
                $_POST['productStock']
            );
            $product->updateProduct();
            header("Location:?c=Products&a=readProduct");
        }
    }

    # CU004 - Eliminar Productos
    public function deleteProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/delete_product.view.php";            
            require_once "views/roles/admin/footer.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = new Product(
                $_POST['productCode']
            );
            $product->deleteProduct();
            header("Location:?c=Products&a=readProduct");
        }
    }

    # CU005 - Create Category
    public function createCategory(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once "views/roles/admin/header.view.php";
            require_once "views/modules/01_users/create_category.view.php";            
            require_once "views/roles/admin/footer.view.php";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $category = new Product(
                $_POST['categoryCode'],
                $_POST['categoryName']
            );
            $category->createCategory();
            header("Location:?c=Products&a=readCategory");
        }
    }

    # CU006 - Read Category 
    public function readCategory(){
        $category = new Product;
        $category = $category->readCategory();            
        require_once "views/roles/admin/header.view.php";            
        require_once "views/modules/01_users/read_category.view.php";
        require_once "views/roles/admin/footer.view.php";
    }


}