<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    /**
     * @var string
     */
    protected $table = 'pessoas';
    /**
     * @var array
     */
    protected $fillable = ['id', 'nome', 'cpf', 'rg', 'dt_nascimento', 'linkedin', 'lattes', 'telefone', 'celular'];
    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }

    public function arquivos()
    {
        return $this
            ->belongsToMany('App\Arquivos')
            ->withTimestamps();
    }

    public function habilidades()
    {
        return $this
            ->belongsToMany('App\Habilidades')
            ->withTimestamps();
    }

    public function experiencias()
    {
        return $this
            ->belongsToMany('App\Experiencias')
            ->withTimestamps();
    }
}
