<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivos extends Model
{
    /**
     * @var string
     */
    protected $table = 'arquivos';
    /**
     * @var array
     */
    protected $fillable = ['id', 'nome', 'arquivo'];

    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this
            ->belongsToMany('App\Pessoas')
            ->withTimestamps();
    }
}
