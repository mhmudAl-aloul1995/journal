<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ResearchApplication;
use App\Models\Researcher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $keyType = 'integer';

    /**
     * @var array
     */

    /**
     * @var array
     */
    protected $fillable = ['sp_code', 'title', 'gender', 'name', 'cn_title', 'contact_type', 'fax', 'zip_code', 'city', 'degree', 'speciality', 'mobile', 'cv', 'phone', 'img', 'address', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'];
    protected $appends = ['cn_title_updated', 'gender_updated', 'sp_code_updated', 'contact_type_updated', 'degree_updated'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function getCnTitleUpdatedAttribute()
    {
        $cn_title = ['', ' الدكتور', 'السيد', 'السيدة'];


        return array_key_exists($this->cn_title, $cn_title) ? $cn_title[$this->cn_title] : null;
    }

    public function getContactTypeUpdatedAttribute()
    {

        $contact_type = ['', ' دكتوراه', 'مرشح للدكتوراه', 'ماجستير', ' طالب ماجستير', ' بكالوريوس', 'طبیب', ' غير ذلك'];

        return array_key_exists($this->contact_type, $contact_type) ? $contact_type[$this->contact_type] : null;
    }

    public function getDegreeUpdatedAttribute()
    {

        $degree = ['', ' أستاذ', 'أستاذ مشارك', 'أستاذ مساعد', 'مدرس', ' غير ذلك'];

        return array_key_exists($this->degree, $degree) ? $degree[$this->degree] : null;
    }

    public function getGenderUpdatedAttribute()
    {
        $this->gender == null ? 0 : $this->gender;

        $gender = ['', 'ذكر', 'أنثى'];

        return $gender[$this->gender];
    }

    public function getSpCodeUpdatedAttribute()
    {
        $this->sp_code == null ? 0 : $this->sp_code;

        $sp_code = ['', 'إدارة الأعمال', 'الإقتصاد', 'العلوم السياسية', 'المحاسبة'];

        return $sp_code[$this->sp_code];
    }

    public function getAvatarAttribute()
    {
        if ($this->img == null) {
            return url('assets/pages/profile_user.jpg');
        }
        return url('storage/app/avatar') . '/' . $this->img;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function folders()
    {
        return $this->hasMany('App\Models\Folder');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function keywords()
    {
        return $this->hasMany('App\Models\Keyword');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function researches()
    {
        return $this->hasMany('App\Models\Research');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function versions()
    {
        return $this->hasMany('App\Models\Version');
    }

    public function researchers()
    {

        return $this->hasMany(Researcher::class);
    }

    public function application_research()
    {

        return $this->hasMany(ResearchApplication::class, 'user_id');
    }

    public function proofreader()
    {

        return $this->hasMany(ResearchApplication::class, 'proofreader_id');
    }

}
