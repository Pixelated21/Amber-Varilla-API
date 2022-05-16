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
 * App\Models\CompanyAdmin
 *
 * @property int $id
 * @property string $email
 * @property int $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property int $status
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CompanyEmployee[] $companyEmployees
 * @property-read int|null $company_employees_count
 * @property-read \App\Models\UserDetail|null $userDetail
 * @method static \Database\Factories\CompanyAdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyAdmin whereUuid($value)
 * @mixin \Eloquent
 */
class CompanyAdmin extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'status',
        'uuid',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email_verified_at' => 'timestamp',
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


    public function userDetail()
    {
        return $this->morphOne(UserDetail::class, 'userdetailable');
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function companyEmployees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }
}
