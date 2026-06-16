<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capa extends Model
{
    public function insiden()
    {
        return $this->belongsTo(LaporanInsiden::class, 'insiden_id');
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function penanggungJawab()
    {
        return $this->belongsTo(User::class, 'penanggung_jawab');
    }
}
