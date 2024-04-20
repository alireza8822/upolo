<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = ['name', 'email', 'company_id','note'];

    // Define relationships or other customizations here

    /**
     * Get the company that owns the contact.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
