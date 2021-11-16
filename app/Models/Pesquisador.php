<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pesquisador extends Model
{
    protected $table = 'pesquisadores';

    public function situacao()
    {
        if ($this->situacao==0){
           return '<span class="badge badge-secondary">Solicitado</span>';
        } else if($this->situacao==1) {
           return '<span class="badge badge-success">Aprovado</span>';
        } else if ($this->situacao==2){
            return '<span class="badge badge-danger">Negado</span>';
        }
      return '<span class="badge badge-warning">Situação indefinida</span>';


    }
}
