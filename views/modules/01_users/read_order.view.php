<div class="borde controles">
    <a href="?c=Roles&a=createRol" class="borde">Crear Orden</a>
</div>
<div class="borde table-header">
    <h2>Consultar Ordenes</h2>
</div>
<table class="borde">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Nombre Cliente</th>
            <th>Nombre Vendedor</th>
            <th>Fecha Orden</th>
            <th>Ciudad</th>
            <th>Direccion</th>
            <th>Referencia</th>
            <th>Cantidad</th>
            <th>Orden Partial</th>
            <th>Iva</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Opcion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?php echo $order->getOrderCode(); ?></td>
                <td><?php echo $order->getCustomerCode(); ?></td>
                <td><?php echo $order->getSellerCode(); ?></td>
                <td><?php echo $order->getOrderDate(); ?></td>
                <td><?php echo $order->getOrderCity(); ?></td>
                <td><?php echo $order->getOrderAddress(); ?></td>
                <td><?php echo $order->getProductCode(); ?></td>
                <td><?php echo $order->getProductQuantityOrder(); ?></td>
                <td><?php echo $order->getOrderPartial(); ?></td>
                <td><?php echo $order->getOrderIva(); ?></td>
                <td><?php echo $order->getOrderTotal(); ?></td>
                <td><?php echo $order->getOrderStatus(); ?></td>
                <td>
                    <a href="?c=Roles&a=updateRol&rolCode=<?php echo $rol->getCustomerCode() ?>">Editar</a>
                    <a href="?c=Roles&a=deleteRol&rolCode=<?php echo $rol->getCustomerCode() ?>">Eliminar</a>
                <td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>