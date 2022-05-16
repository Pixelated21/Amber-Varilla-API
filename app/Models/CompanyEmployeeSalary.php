<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompanyEmployeeSalary
 *
 * @property int $id
 * @property int $company_employee_id
 * @property int $salary
 * @property bool $negotiable
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\CompanyEmployee $companyEmployee
 * @method static \Database\Factories\CompanyEmployeeSalaryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary whereCompanyEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary whereNegotiable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeSalary whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyEmployeeSalary extends Model
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
        'salary',
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

    public function companyEmployee()
    {
        return $this->belongsTo(CompanyEmployee::class);
    }
}
