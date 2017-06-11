<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    /**
     * @var string
     */
    protected $table = 'habilidades';
    /**
     * @var array
     */
    protected $fillable = ['id', 'nome'];

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
