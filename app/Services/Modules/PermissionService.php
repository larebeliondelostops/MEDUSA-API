<?php

namespace App\Services\Modules;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\PermissionInterface;
use Spatie\Permission\Models\Permission;
use App\Http\Request\RolesPermisos\savePermisoRequest;
use App\Http\Request\RolesPermisos\AssignPermissionsRequest;
use App\Models\User;
use Exception;

/**
 * Servicio de manejo de permisos en el sistema.
 *
 * Implementa la interfaz PermissionInterface para definir las operaciones necesarias
 * para la gestión de permisos.
 *
 * @package App\Services\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class PermissionService implements PermissionInterface{

    /**
     * Crea un nuevo permiso en el sistema.
     *
     * @param Collection $permission Datos del permiso a crear.
     * @return Collection Datos del nuevo permiso creado.
     */
    public function createNewPermission(Collection $permission): Collection
    {
        $newPermission = Permission::create(['name' => $permission['name']]);
        return collect($newPermission);
    }

    /**
     * Asigna un permiso a un usuario existente.
     *
     * @param int $permissionId Identificador unido del permiso a asignar.
     *  @param Collection $user Collection con la informacion del usuairo a agregarle los permisos.
     */
    public function assignPermissionsToUser(int $permissionId, Collection $user)
    {
        $permissions = Permission::where('id', $permissionId)->get();
        $userGot = new User($user->toArray());
        $userGot->givePermissionTo($permissions);
    }
}
