<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\CompanyRole
 *
 * @property int $id
 * @property string $companyRoleName
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployee[] $companyEmployees
 * @property-read int|null $company_employees_count
 * @method static \Database\Factories\CompanyRoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRole newQuery()
 * @method static \Illuminate\Database\Query\Builder|CompanyRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRole whereCompanyRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRole whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyRole whereId($value)
 * @method static \Illuminate\Database\Query\Builder|CompanyRole withTrashed()
 * @method static \Illuminate\Database\Query\Builder|CompanyRole withoutTrashed()
 * @mixin \Eloquent
 */
class CompanyRole extends Model
{
    use HasFactory, SoftDeletes;

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
        'companyRoleName',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function companyEmployees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }
}
