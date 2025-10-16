<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TechnicalSkills extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function softSkills()
    {
        return $this->hasMany(SoftSkills::class);
    }

    public function skillPassports()
    {
        return $this->hasMany(SkillPassport::class);
    }

    public function portfolioProjects()
    {
        return $this->hasMany(PortfolioProjects::class);
    }
}
