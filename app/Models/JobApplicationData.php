<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JobApplicationData
 *
 * @property int $id
 * @property int $job_application_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\JobApplication $jobApplication
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\JobApplicationDataFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData whereJobApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplicationData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JobApplicationData extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_application_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'job_application_id' => 'integer',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediumable');
    }

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }
}
