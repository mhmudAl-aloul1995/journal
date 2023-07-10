<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class ResearchApplication
 *
 * @property int $id
 * @property string $is_commitment
 * @property string $research_file
 * @property string $research_money_file
 * @property string $app_status
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class ResearchApplication extends Model
{
    use SoftDeletes;

    protected $table = 'research_applications';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'is_commitment',
        'research_title',
        'research_file',
        'research_money_file',
        'app_status',
        'user_id',
        'is_pay',
        'research_file_updated',
        'proofreader_id',
        'proofreader_file',
        'research_file_new'
    ];
    protected $appends = ['prf_file', 'res_file', 'res_money', 'res_file_updated','res_file_new_updated'];

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function proofreader()
    {

        return $this->belongsTo(User::class, 'proofreader_id', 'id');
    }

    /**
     * @return string
     */
    public function getResFileAttribute()
    {
        return $this->research_file ? 'storage/app/research_file/' . $this->research_file : $this->research_file;
    }
    public function getResFileNewUpdatedAttribute()
    {
        return $this->research_file_new ? 'storage/app/research_file_new/' . $this->research_file_new : $this->research_file_new;
    }
    public function getPrfFileAttribute()
    {
        return $this->proofreader_file ? 'storage/app/proofreader_file/' . $this->proofreader_file : null;
    }

    public function getResFileUpdatedAttribute()
    {
        return $this->research_file_updated ? 'storage/app/researches_updates/' . $this->research_file_updated : null;
    }

    public function getResMoneyAttribute()
    {
        return $this->research_money_file ? 'storage/app/research_money_file/' . $this->research_money_file : null;
    }

    public function evaluations_users()
    {

        return $this->hasMany(EvaluationsUser::class, 'research_application_id');

    }

    public function researcher_notes()
    {

        return $this->hasMany(ResearchApplicationNote::class, 'research_application_id');

    }

    public function researcher_evaluations()
    {

        return $this->hasMany(ResearcherEvaluation::class, 'research_application_id');

    }

    public function evaluator_evaluations()
    {

        return $this->hasOne(ResearcherEvaluation::class, 'research_application_id')->where('evaluator_id',Auth::id());

    }

}
