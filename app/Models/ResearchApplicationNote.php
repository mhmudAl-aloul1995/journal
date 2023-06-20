<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ResearchApplicationNote
 *
 * @property int $id
 * @property string $note
 * @property string $is_done
 * @property int $research_application_id
 * @property int $evaluator_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property ResearchApplication $research_application
 *
 * @package App\Models
 */
class ResearchApplicationNote extends Model
{
    use SoftDeletes;

    protected $table = 'research_application_notes';

    protected $casts = [
        'research_application_id' => 'int',
        'evaluator_id' => 'int'
    ];

    protected $fillable = [
        'note',
        'note_file',
        'is_done',
        'research_application_id',
        'evaluator_id'
    ];
    protected $appends = ['note_file_updated'];

    public function evaluator()
    {
        return $this->belongsTo(User::class, 'evaluator_id');
    }

    public function research_application()
    {
        return $this->belongsTo(ResearchApplication::class);
    }

    public function getNoteFileUpdatedAttribute()
    {

        return $this->note_file ? url('storage/app/note_file') . '/' . $this->note_file : null;
    }
}
