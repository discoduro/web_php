<div class="borde controles">
    <a href="?c=Users&a=createUser" class="borde">Crear Usuario</a>
    <a href="?c=Users&a=createSeller" class="borde">Crear Vendedor</a>
    <a href="?c=Users&a=createAdmin" class="borde">Crear Admin</a>
    <a href="?c=Users&a=readUser" class="borde">Consultar Usuarios</a>
</div>
<form action="" method="" class="borde">
    <div class="borde form-header">
        <h2>Crear Cliente</h2>
    </div>
    <div class="borde form-body">
        <div class="form-control">
            <label for="">Código Usuario</label>
            <input type="text" disabled>
        </div>
        <div class="form-control">
            <label for="">Foto</label>
            <input type="file" class="file-select">
        </div>
        <div class="form-control">
            <label for="">Identificación</label>
            <input type="text" placeholder="Número de Identificación">
        </div>
        <div class="form-control">
            <label for="">Nombres</label>
            <input type="text" placeholder="Nombres">
        </div>
        <div class="form-control">
            <label for="">Apellidos</label>
            <input type="text" placeholder="Apellidos">
        </div>
        <div class="form-control">
            <label for="">Email</label>
            <input type="text" placeholder="Email">
        </div>
        <div class="form-control">
            <label for="">Fecha de Ingreso</label>
            <input type="date">
        </div>
        <div class="form-control">
            <label for="">Contraseña</label>
            <input type="text" placeholder="Contraseña">
        </div>
        <div class="form-control">
            <label for="">Confirmación</label>
            <input type="text" placeholder="Confirmación de Contraseña">
        </div>
        <div class="form-control">
            <label for="">Estado</label>
            <select>
                <option value="0" class="option">Inactivo</option>
                <option value="1">Activo</option>
            </select>
        </div>
    </div>
    <div class="borde form-footer">
        <a href="?" class="borde">Cancelar</a>
        <input type="submit" value="Crear" class="borde">
    </div>
</form>