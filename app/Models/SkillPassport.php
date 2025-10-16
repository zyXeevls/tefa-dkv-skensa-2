<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillPassport extends Model
{
    use HasFactory;

    protected $guarded = []; // Hati-hati menggunakan guarded=[], untuk contoh saja

    public function technicalSkills()
    {
        return $this->hasMany(TechnicalSkills::class);
    }

    public function softSkills()
    {
        return $this->hasMany(SoftSkills::class);
    }

    public function portfolioProjects()
    {
        return $this->hasMany(PortfolioProjects::class);
    }
}
