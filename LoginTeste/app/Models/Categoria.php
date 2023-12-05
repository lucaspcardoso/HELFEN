<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    use HasFactory;

    public function cat()
    {
        return $this->hasMany(SubCategoria::class, 'fk_id_subcat');
    }

    public function servico()
    {
        return $this->hasOne(Servico::class, 'fk_id_cat'); // 'fk_id_cat' é a chave estrangeira na tabela 'servicos'
    }

}
