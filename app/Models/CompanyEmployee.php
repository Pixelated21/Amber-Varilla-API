<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


/**
 * App\Models\CompanyEmployee
 *
 * @property int $id
 * @property int $company_id
 * @property int $dept_id
 * @property int $position_id
 * @property string $email
 * @property string $employeeNumber
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\CompanyEmployeeAssignedRole|null $companyEmployeeAssignedRole
 * @property-read \App\Models\CompanyEmployeeData|null $companyEmployeeData
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployeeLeave[] $companyEmployeeLeaves
 * @property-read int|null $company_employee_leaves_count
 * @property-read \App\Models\CompanyEmployeeSalary|null $companyEmployeeSalary
 * @property-read \App\Models\Department $dept
 * @property-read \App\Models\Position $position
 * @method static \Database\Factories\CompanyEmployeeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereDeptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereEmployeeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyEmployee extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'dept_id',
        'position_id',
        'status',
        'email',
        'employeeNumber',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'dept_id' => 'integer',
        'position_id' => 'integer',
    ];

    public function password():Attribute
    {
        return new Attribute(
            set: static fn($value) => \Hash::make($value),
        );

    }

    public function createdAt():Attribute
    {
        return new Attribute(
            get: static fn($value) => Carbon::parse($value)->format('d,F Y'),
        );
    }


    public function companyEmployeeSalary()
    {
        return $this->hasOne(CompanyEmployeeSalary::class);
    }

    public function companyEmployeeData()
    {
        return $this->hasOne(CompanyEmployeeData::class);
    }

    public function companyEmployeeAssignedRole()
    {
        return $this->hasOne(CompanyEmployeeAssignedRole::class)->with('companyRoles');
    }

    public function companyEmployeeLeaves()
    {
        return $this->hasMany(CompanyEmployeeLeave::class)->with('leave');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function dept()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
