<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','cep','endereco', 'numero', 'bairro', 'cidade', 'estado'];

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }
}
