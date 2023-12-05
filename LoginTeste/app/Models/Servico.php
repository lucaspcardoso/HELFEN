<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, "fk_id_usu");
    }

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'fk_id_reg');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fk_id_cat'); // 'fk_id_cat' é a chave estrangeira na tabela 'servicos'
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'fk_id_subCat'); // 'fk_id_subCat' é a chave estrangeira na tabela 'servicos'
    }
}
