<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioProjects extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function technicalSkills()
    {
        return $this->hasMany(TechnicalSkills::class);
    }

    public function skillPassports()
    {
        return $this->hasMany(SkillPassport::class);
    }

    public function softSkills()
    {
        return $this->hasMany(SoftSkills::class);
    }
}
