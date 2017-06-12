<?php

namespace App\Permissions;

use App\{Role, Permission};


trait HasPermissionsTrait
{

	public function hasRole(... $roles)
	{
		foreach($roles as $role){

			if($this->roles->contains('name', $role)){

				return true;
			}
		}

		return false;
	}

	public function givePermissionTo(... $permissions)
	{

		
		$permissions = $this->getPermissions(array_flatten($permissions));

		if ($permissions === null) {

			return $this;
		}

		$this->permissions()->saveMany($permissions);

		return $this;
	}

	public function revokePermissionTo(... $permissions)
	{

		$permissions = $this->getPermissions(array_flatten($permissions));

		$this->permissions()->detach($permissions);

		return $this;
	}

	public function updatePermissions(...$permissions)
	{
		//detach all
		$this->permissions()->detach();

		return $this->givePermissionTo($permissions);
		

		
	}

	protected function getPermissions(array $permissions)
	{

		return Permission::WhereIn('name', $permissions)->get();
	}
	public function hasPermissionTo($permission)
	{
		return $this->hasPermissionRole($permission) || $this->hasPermission($permission);
	}

		//vérifie si un rôle à la permission de faire une action
	protected function hasPermissionRole($permission)
	{
		foreach($permission->roles as $role){

			if($this->roles->contains($role)){

				return true;
			}
		}

		return false;
	}

	protected function hasPermission($permission)
	{

		return (bool) $this->permissions->where('name', $permission->name)->count();
	}




    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
}