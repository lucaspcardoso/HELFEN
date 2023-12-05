<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'sub_categoria';
    use HasFactory;

    public function subCat()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_subcat');
    }
    public function servico()
    {
        return $this->hasOne(Servico::class, 'fk_id_subCat'); // 'fk_id_subCat' é a chave estrangeira na tabela 'servicos'
    }
}
