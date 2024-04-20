<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email'];
    /**
     * Get the contacts for the company.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
