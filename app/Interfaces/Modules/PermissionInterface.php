<?php

namespace App\Interfaces\Modules;

use Illuminate\Support\Collection;

/**
 * Interfaz para gestionar operaciones relacionadas con las permisos en el sistema.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface PermissionInterface {

    /**
     * Crea un nuevo permiso.
     *
     * @param Collection $permission La información del permiso a ser creada.
     * @return Collection El permiso creada.
     */
    public function createNewPermission(Collection $permission): Collection;

    /**
     * Asigna un permiso a un usuario existente.
     *
     * @param int $permission Identificador unico del permiso.
     * @param Collection $user Collection con la informacion del usuairo a agregarle los permisos.
     */
    public function assignPermissionsToUser(int $permissionId, Collection $user);
}
