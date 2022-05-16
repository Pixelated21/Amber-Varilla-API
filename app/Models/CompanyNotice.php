<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyNotice
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\CompanyNoticeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyNotice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyNotice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'title',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediumable');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
