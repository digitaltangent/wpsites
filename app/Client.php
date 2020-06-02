<?php

// Client.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['company', 'firstname', 'lastname'];
}
