<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property int $company_admin_id
 * @property string $companyName
 * @property string $uuid
 * @property int|null $isVerified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CompanyAdmin $companyAdmin
 * @property-read \App\Models\CompanyDetail|null $companyDetail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployeeAssignedRole[] $companyEmployeeAssignedRoles
 * @property-read int|null $company_employee_assigned_roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployee[] $companyEmployees
 * @property-read int|null $company_employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyNotice[] $companyNotices
 * @property-read int|null $company_notices_count
 * @method static \Database\Factories\CompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUuid($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_admin_id',
        'companyName',
        'uuid',
        'isVerified',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_admin_id' => 'integer',
        'isVerified' => 'timestamp',
    ];

    public function companyNotices()
    {
        return $this->hasMany(CompanyNotice::class);
    }

    public function companyEmployees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }

    public function companyEmployeeAssignedRoles()
    {
        return $this->hasMany(CompanyEmployeeAssignedRole::class);
    }

    public function applications(){
        return $this->hasManyThrough(JobApplication::class,Job::class);
    }

    public function companyDetail()
    {
        return $this->hasOne(CompanyDetail::class);
    }

    public function companyAdmin()
    {
        return $this->belongsTo(CompanyAdmin::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->with(['jobDetail'])->withCount('jobApplications');
    }
}
