<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResearcherEvaluation
 *
 * @property int $id
 * @property string $finel_response
 * @property int $research_application_id
 * @property int $evaluator_id
 * @property string $answer_evaluation_1
 * @property string $answer_evaluation_2
 * @property string $answer_evaluation_3
 * @property string $answer_evaluation_4
 * @property string $answer_evaluation_5
 * @property string $note_evaluation_1
 * @property string $note_evaluation_2
 * @property string $note_evaluation_3
 * @property string $note_evaluation_4
 * @property string $note_evaluation_5
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property ResearchApplication $research_application
 *
 * @package App\Models
 */
class ResearcherEvaluation extends Model
{
	use SoftDeletes;
	protected $table = 'researcher_evaluations';

	protected $casts = [
		'research_application_id' => 'int',
		'evaluator_id' => 'int'
	];

	protected $fillable = [
		'finel_response',
		'research_application_id',
		'evaluator_id',
		'answer_evaluation_1',
		'answer_evaluation_2',
		'answer_evaluation_3',
		'answer_evaluation_4',
		'answer_evaluation_5',
		'answer_evaluation_6',
		'note_evaluation_1',
		'note_evaluation_2',
		'note_evaluation_3',
		'note_evaluation_4',
		'note_evaluation_5'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'evaluator_id');
	}

	public function research_application()
	{
		return $this->belongsTo(ResearchApplication::class,'research_application_id');
	}
}
