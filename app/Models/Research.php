<?php

namespace App\Models;

use Doctrine\DBAL\Driver\IBMDB2\DB2Driver;
use Illuminate\Database\Eloquent\Model;
use App\Models\Researcher;
/**
 * @property integer $id
 * @property integer $category_id
 * @property integer $version_id
 * @property integer $user_id
 * @property string $res_title
 * @property string $res_summary
 * @property string $res_link
 * @property string $page_from
 * @property string $page_to
 * @property string $keywords
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Category $category
 * @property User $user
 * @property Version $version
 * @property Researcher[] $researchers
 */
class Research extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $table = 'researches';
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'version_id', 'user_id', 'res_title', 'res_summary', 'res_link', 'page_from', 'page_to', 'keywords', 'created_at', 'updated_at', 'deleted_at'];

    public function setkeywordsAttribute($value)
    {


        return $this->attributes['keywords'] = json_encode(explode('-', $value));

    }

    public function getkeywordsAttribute($value)
    {
        if ($value==null){
            return null;
        }

          return  $this->attributes['keywords'] = implode('-', json_decode($value));

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsToMany('App\Models\User',Researcher::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function version()
    {
        return $this->belongsTo('App\Models\Version');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function researchers()
    {

        return $this->hasMany('App\Models\Researcher');
    }
}
