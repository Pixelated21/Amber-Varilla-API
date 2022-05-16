<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyEmployeeData
 *
 * @property int $id
 * @property int $company_employee_id
 * @property string $firstName
 * @property string $lastName
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\CompanyEmployee $companyEmployee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\CompanyEmployeeDataFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData whereCompanyEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyEmployeeData extends Model
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
        'company_employee_id',
        'firstName',
        'lastName',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_employee_id' => 'integer',
    ];

    public function media()
    {
        return $this->morphMany(Media::class, 'mediumable');
    }

    public function companyEmployee()
    {
        return $this->belongsTo(CompanyEmployee::class);
    }
}
