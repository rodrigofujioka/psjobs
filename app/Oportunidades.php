<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidades extends Model
{
    /**
     * @var string
     */
    protected $table = 'oportunidades';
    /**
     * @var array
     */
    protected $fillable = ['id', 'titulo', 'resumo', 'dt_inicio', 'dt_fim'];
    /**
     * @author Vinícius Enéas Bezerra <vinicius.eneas@gmail.com>
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this
            ->belongsTo('App\User');
    }
}
