<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps  = true;
    protected $table = 'permissions';
    protected $fillable = ['name', 'description'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- RELACIONAMENTO COM PERFIS (One to Many) ------------------------------
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    //- PESQUISA DE PERMISSÕES -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $permissions = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('description', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $permissions = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                    $query->OrWhere('description', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $permissions;
    }
}
