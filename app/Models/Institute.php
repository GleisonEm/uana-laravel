<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public $timestamps  = true;
    protected $table = 'institutes';
    protected $fillable = ['name'];

    public static function boot()
    {
        //parent::userRegister();
    }

    //- PESQUISA DE INSTITUTOS -----------------------------------------------
    public function search(array $data, $totalPage)
    {
        if ($totalPage != null) {
            $institutes = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->paginate($totalPage);
        } else {
            $institutes = $this->where(function ($query) use ($data) {
                if (isset($data['texto'])) {
                    $query->Where('name', 'like', '%' . $data['texto'] . '%');
                }
            })
                ->orderBy('name', 'asc')
                ->get();
        }
        return $institutes;
    }
}
