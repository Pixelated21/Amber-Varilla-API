<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Leave
 *
 * @property int $id
 * @property string $leaveName
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployeeLeave[] $companyEmployeeLeaves
 * @property-read int|null $company_employee_leaves_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployee[] $companyEmployees
 * @property-read int|null $company_employees_count
 * @method static \Database\Factories\LeaveFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave newQuery()
 * @method static \Illuminate\Database\Query\Builder|Leave onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave query()
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereLeaveName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Leave whereTotal($value)
 * @method static \Illuminate\Database\Query\Builder|Leave withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Leave withoutTrashed()
 * @mixin \Eloquent
 */
class Leave extends Model
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
        'leaveName',
        'total',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function companyEmployeeLeaves()
    {
        return $this->hasMany(CompanyEmployeeLeave::class);
    }
}
