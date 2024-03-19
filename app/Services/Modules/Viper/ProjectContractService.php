<?php

namespace App\Service\Modules\Viper;

use Illuminate\Support\Collection;
use App\Models\Modules\Viper\ProjectUserRole;


Class ProjectContractService Implements ProjectContractInterface {

    public function createProjectContract(Collection $projectContract): Collection
    {
        $imageName = null;
        if ($projectContractt->has('avatar')) {

            $image_64 = $projectContractt['avatar']; //your base64 encoded data

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
        $user->name = $projectContractt['name'];
        $user->email = $projectContractt['email'];
        $user->phone_number = $projectContractt['phone_number'];
        $user->address = $projectContractt['address'];
        $user->avatar = $imageName;
        $user->password = bcrypt($projectContractt['password']);
        $user->save();
        
        $projectUserRole = new ProjectUserRole();
        $projectUserRole->project_id = $projectContract['bpin']; 
        $projectUserRole->user_id = $user->id;
        $projectUserRole->rol_id = $projectContract['rol'];

        
    }
}
