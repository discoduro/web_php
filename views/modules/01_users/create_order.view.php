<div class="borde controles">
    <a href="?c=Ordenes&a=readOrder" class="borde">Consultar Ordenes</a>
</div>
<form action="" method="post" class="borde">
    <div class="borde form-header">
        <h2>Crear Orden</h2>
    </div>
    <div class="borde form-body">  
        <div class="form-control">
            <label for="">code</label>
            <input type="text" name="orderCode" placeholder="Nombres">
        </div> 
         <div class="form-control">
            <label for="">Nombres Cliente</label>
            <input type="text" name="customerCode" placeholder="Nombres">
        </div>
        <div class="form-control">
            <label for="">Nombre Vendedor</label>
            <input type="text" name="sellerCode" placeholder="Nombres">
        </div>
        <div class="form-control">
            <label for="">Fecha Orden</label>
            <input type="date" name="orderDate" placeholder="Fecha">
        </div>
        <div class="form-control">
            <label for="">Ciudad</label>
            <input type="text" name="orderCity" placeholder="Ciudad">
        </div>
        <div class="form-control">
            <label for="">Direccion</label>
            <input type="text" name="orderAddress" placeholder="Direccion">
        </div>
        <div class="form-control">
            <label for="">Referencia Producto</label>
            <input type="text" name="productCode" placeholder="Referencia Producto">
        </div>
        <div class="form-control">
            <label for="">Cantidad de Productos</label>
            <input type="text" name="productQuantityOrder" placeholder="Cantidad Productos">
        </div>
        <div class="form-control">
            <label for="">Orden Parcial</label>
            <input type="text" name="orderPartial" placeholder="Orden parcial">
        </div>
        <div class="form-control">
            <label for="">Iva</label>
            <input type="text" name="orderIva" placeholder="Iva">
        </div>
        <div class="form-control">
            <label for="">Total</label>
            <input type="text" name="orderTotal" placeholder="Total">
        </div>
        <div class="form-control">
            <label for="">Estado</label>
            <input type="text" name="orderStatus" placeholder="Estado">
        </div>
    </div>
    <div class="borde form-footer">
        <a href="?" class="borde">Cancelar</a>
        <input type="submit" value="Crear" class="borde">
    </div>
</form>