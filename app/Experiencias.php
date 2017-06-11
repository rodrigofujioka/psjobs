<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencias extends Model
{
    /**
     * @var string
     */
    protected $table = 'experiencias';
    /**
     * @var array
     */
    protected $fillable = ['id', 'titulo', 'cargo', 'resumo', 'dt_inicio', 'dt_fim'];

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
