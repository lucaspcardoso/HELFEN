<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    public function subCat()
    {
        return $this->hasMany(SubCategoria::class);
    }

    public function registroCat()
    {
        return $this->hasMany(Categoria::class, 'fk_id_cat');
    }

    public function registroSubCat()
    {
        return $this->hasMany(SubCategoria::class, 'fk_id_subcat');
    }
}
