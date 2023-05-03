<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $name
 * @property string $cn_title
 * @property string $contact_type
 * @property string $fax
 * @property string $zip_code
 * @property string $city
 * @property string $degree
 * @property string $speciality
 * @property string $mobile
 * @property integer $role_id
 * @property string $cv
 * @property string $phone
 * @property string $img
 * @property string $address
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Category[] $categories
 * @property Folder[] $folders
 * @property JournalMember[] $journalMembers
 * @property Journal[] $journals
 * @property Keyword[] $keywords
 * @property Research[] $researches
 * @property Version[] $versions
 */




class User extends Authenticatable
{
    use Notifiable;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */

    /**
     * @var array
     */
    protected $fillable = ['name', 'cn_title', 'contact_type', 'fax', 'zip_code', 'city', 'degree', 'speciality', 'mobile', 'role_id', 'cv', 'phone', 'img', 'address', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function folders()
    {
        return $this->hasMany('App\Folder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journalMembers()
    {
        return $this->hasMany('App\JournalMember');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journals()
    {
        return $this->hasMany('App\Journal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keywords()
    {
        return $this->hasMany('App\Keyword');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function researches()
    {
        return $this->hasMany('App\Research');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany('App\Version');
    }
}
