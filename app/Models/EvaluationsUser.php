<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EvaluationsUser
 *
 * @property int $id
 * @property int $research_id
 * @property int $evaluator_id
 *
 * @package App\Models
 */
class EvaluationsUser extends Model
{
    protected $table = 'evaluations_users';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
        'research_application_id' => 'int',
        'evaluator_id' => 'int'
    ];

    protected $fillable = [
        'id',
        'research_application_id',
        'evaluator_id'
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User', 'id', 'user_id');
    }
  public function evaluators()
    {
        return $this->hasOne('App\Models\User', 'id', 'evaluator_id');
    }
    public function research()
    {
        return $this->belongsTo('App\Models\Research');
    }
}
