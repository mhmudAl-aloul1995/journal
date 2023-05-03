<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $cust_name
 * @property string $cust_address
 * @property string $cust_phone
 * @property string $cust_email
 * @property boolean $cust_type
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Bill[] $bills
 */
class user extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['cust_name', 'cust_address', 'cust_phone', 'cust_email', 'cust_type', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
}
