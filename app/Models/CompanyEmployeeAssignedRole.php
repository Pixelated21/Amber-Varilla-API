<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyEmployeeAssignedRole
 *
 * @property int $id
 * @property int $company_employee_id
 * @property int $company_roles_id
 * @property-read \App\Models\CompanyEmployee $companyEmployee
 * @property-read \App\Models\CompanyRole $companyRoles
 * @method static \Database\Factories\CompanyEmployeeAssignedRoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeAssignedRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeAssignedRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeAssignedRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeAssignedRole whereCompanyEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeAssignedRole whereCompanyRolesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeAssignedRole whereId($value)
 * @mixin \Eloquent
 */
class CompanyEmployeeAssignedRole extends Model
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
        'company_roles_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_employee_id' => 'integer',
        'company_roles_id' => 'integer',
    ];

    public function companyEmployee()
    {
        return $this->belongsTo(CompanyEmployee::class);
    }

    public function companyRoles()
    {
        return $this->belongsTo(CompanyRole::class);
    }
}
