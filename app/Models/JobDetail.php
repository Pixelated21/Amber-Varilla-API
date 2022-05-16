<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JobDetail
 *
 * @property int $id
 * @property int $job_id
 * @property string $jobTitle
 * @property string $jobDescription
 * @property string $jobModality
 * @property string $jobType
 * @property float $jobSalary
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Job $job
 * @method static \Database\Factories\JobDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobModality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereJobType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JobDetail extends Model
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
        'job_id',
        'jobTitle',
        'jobDescription',
        'jobModality',
        'jobType',
        'jobSalary',
        'negotiable'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'job_id' => 'integer',
        'jobSalary' => 'float',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
