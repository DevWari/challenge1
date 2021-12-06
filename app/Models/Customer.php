<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_customer';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',    
        'gender',
        'company',
        'city',
        'title'
    ];
    
}
