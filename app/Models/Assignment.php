<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public $timestamps  = true;
    protected $table = 'assignments';
    protected $fillable = ['name', 'key'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- PESQUISA DE FUNÇÕES -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $assignments = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $assignments = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $assignments;
    }
}
