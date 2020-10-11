<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BindingAccount extends Model
{
    protected $table = 'binding_accounts';
    protected $fillable = ['user_id'];

}
