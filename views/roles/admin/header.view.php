<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="assets/css/styles_dashboard.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="borde logo">
                <a href="">
                    <img src="assets/img/logo_appweb.png" alt="">
                </a>
            </div>
            <div class="borde navegacion">
                <div class="inicio">
                    <a href="?c=Dashboard">Inicio</a>
                </div>
                <div class="navega">
                    <!-- <a href=""></a> -->
                </div>
            </div>
            <div class="borde ingreso">
                <a href="?c=Logout">Cerrar Sesión</a>
            </div>
        </nav>
        <main>
            <aside class="borde">
                <div class="modulo">
                    <h1>Perfil</h1>
                    <a href="?c=Users&a=editProfile">Editar Perfil</a>
                    <a href="?c=Messages&a=readMessageProfile">Mis Mensajes</a>
                </div>
                <div class="modulo">
                    <h1>Usuarios</h1>
                    <a href="?c=Roles&a=createRol">Crear Rol</a>
                    <a href="?c=Roles&a=readRol">Consultar Roles</a>
                    <a href="?c=Users&a=createUser">Crear Usuario</a>
                    <a href="?c=Users&a=readUser">Consultar Usuarios</a>
                    <a href="?c=Messages&a=createMessage">Crear Mensaje</a>
                    <a href="?c=Messages&a=readMessage">Consultar Mensajes</a>
                </div>
                <div class="modulo">
                    <h1>Módulo Principal</h1>
                    <a href="?c=Ordenes&a=createOrder">Crear Ordenes</a>
                    <a href="?c=Ordenes&a=readOrder">Consultar Ordenes</a>
                    <!-- <a href="?c=Ordenes&a=updateOrder">Actualizar Ordenes</a>
                    <a href="?c=Ordenes&a=deleteOrder">Eliminar Ordenes</a> -->
                    <a href="?c=Products&a=createCategory">Crear Categoria</a>
                    <a href="?c=Products&a=readCategory">Consulatar Categorias</a>
                    <!-- <a href="?c=Products&a=updateCategory">Actualizar Categorias</a>
                    <a href="?c=Products&a=deleteCategory">Eliminar Categorias</a> -->
                    <a href="?c=Products&a=createProduct">Crear Producto</a>
                    <a href="?c=Products&a=readProduct">Consultar Productos</a>
                    <!-- <a href="?c=Products&a=updateProduct">Actualizar Productos</a>
                    <a href="?c=Products&a=deleteProduct">Eliminar Productos</a> -->
                    <a href="?c=Buy&a=createBuy">Crear Compra</a>
                    <a href="?c=Buy&a=updateBuy">Consulatar Compra</a>
                    <!-- <a href="?c=Buy&a=updateBuy">Actualizar Compra</a>
                    <a href="?c=Buy&a=deleteBuy">Eliminar Compra</a> -->



                </div>
                <div class="modulo">
                    <h1>Reportes</h1>
                    <a href="?c=Reports&a=printedUserReport">Impreso Usuarios</a>
                    <a href="?c=Reports&a=graphicUserReport">Gráfico Usuairos</a>
                </div>
            </aside>
            <section class="borde">
                <div class="borde migas">Inicio / ...</div>
                <div class="borde principal">