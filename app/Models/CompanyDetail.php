<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyDetail
 *
 * @property int $id
 * @property int $company_id
 * @property string $companyEmail
 * @property string $companyWebsite
 * @property string $companyAddress
 * @property string $companyCountry
 * @property string $companyContact
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Media|null $media
 * @method static \Database\Factories\CompanyDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCompanyContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCompanyCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCompanyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCompanyWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyDetail extends Model
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
        'company_id',
        'companyEmail',
        'companyWebsite',
        'companyAddress',
        'companyCountry',
        'companyContact',
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
        return $this->morphOne(Media::class, 'mediumable');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
