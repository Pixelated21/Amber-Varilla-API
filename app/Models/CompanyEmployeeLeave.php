<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\CompanyEmployeeLeave
 *
 * @property int $id
 * @property int $company_employee_id
 * @property int $leave_id
 * @property \Illuminate\Support\Carbon $startDate
 * @property \Illuminate\Support\Carbon $endDate
 * @property int $totalDays
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CompanyEmployee $companyEmployee
 * @method static \Database\Factories\CompanyEmployeeLeaveFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereCompanyEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereLeaveId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereTotalDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyEmployeeLeave whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompanyEmployeeLeave extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_employee_id',
        'leave_id',
        'startDate',
        'endDate',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_employee_id' => 'integer',
        'leave_id' => 'integer',
    ];

    public function startDate():Attribute
    {
        return new Attribute(
            get: static fn($value) => Carbon::parse($value)->format('d,F Y'),
        );
    }

    public function endDate():Attribute
    {
        return new Attribute(
            get: static fn($value) => Carbon::parse($value)->format('d,F Y'),
        );
    }
    public function companyEmployee()
    {
        return $this->belongsTo(CompanyEmployee::class)->with('companyEmployeeData');
    }

    public function leave()
    {
        return $this->belongsTo(\App\Models\Leave::class);
    }
}
