<?php
namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\Project\ProjectObserverAssignContractInterface;
use App\Services\Modules\Observer\ObservableWithDataBase;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Modules\Viper\ProjectUserRole;
use App\Interfaces\Modules\Viper\ProjectContractInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class ProjectContractService extends ObservableWithDataBase Implements ProjectContractInterface {

    private FolderInterface $folderInterface;

    public function __construct( FolderInterface $folderInterface, ProjectObserverAssignContractInterface $projectObserverAssignContractInterface )
    {
        $this->folderInterface = $folderInterface;
        $this->addObserver($projectObserverAssignContractInterface);
    }

    public function createNewProjectContract(Collection $projectContract)
    {
        $imageName = null;
        if ($projectContract->has('avatar')) {

            $image_64 = $projectContract['avatar']; //your base64 encoded data

            $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

            $replace = substr($image_64, 0, strpos($image_64, ',')+1); 

            // find substring fro replace here eg: data:image/png;base64,

            $image = str_replace($replace, '', $image_64); 

            $image = str_replace(' ', '+', $image); 

            $imageName = Uuid::uuid4()->toString().'.'.$extension;

            Storage::disk('public')->put('avatar/' . $imageName, base64_decode($image));
        }

        // Crear el usuario
        $user = new User();
        $user->name = $projectContract['name'];
        $user->email = $projectContract['email'];
        $user->phone_number = $projectContract['phone_number'];
        $user->address = $projectContract['address'];
        $user->avatar = $imageName;
        $user->password = bcrypt($projectContract['password']);
        $user->save();
        
        $projectUserRole = new ProjectUserRole();
        $projectUserRole->project_id = $projectContract['bpin']; 
        $projectUserRole->user_id = $user->id;

        $rol = Role::where('name', $projectContract['rol'])->first();

        $projectUserRole->rol_id = $rol->id;
        $projectUserRole->save();
        
        $this->folderInterface->createFolderContract($projectContract['rol'], $projectContract['bpin'],  $user->id);
        $this->notifyAll($projectUserRole->toArray());
    }
}
