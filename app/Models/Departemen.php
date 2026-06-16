<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departemen extends Model
{
    protected $table = 'departemen';

    public function templateForm(): HasMany
    {
        return $this->hasMany(TemplateForm::class);
    }

    public function penugasanForm(): HasMany
    {
        return $this->hasMany(PenugasanForm::class);
    }
}