<?php

namespace App;

use App\Role;
use App\User;



trait HasRolesTrait {

    public function hasRole(...$roles ) {

    foreach ($roles as $role) {
    if ($this->roles->contains('slug', $role)) {
        return true;
    }
    }
    return false;
    }

    public function roles() {

    return $this->belongsToMany(Role::class,'users_roles');

    }

    public function giveRoleTo(... $roles) {

        $roles=$this->getAllRoles($roles);
        // dd($roles);
        $this->roles()->saveMany($roles);
        return $this;
      }

      public function withdrawRoleTo( ... $roles ) {
        $roles=$this->getAllRoles($roles);
        $this->roles()->detach($roles);
        return $this;
    
      }
      protected function getAllRoles(array $roles) {

        return Role::whereIn('name',$roles)->get();
        
      }
      public function resetRoles(){
        $this->roles()->delete();
        $this->giveRoleTo(['User']);
        return $this;
      }
}
?>