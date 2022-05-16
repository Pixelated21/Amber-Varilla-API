<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UserDetail
 *
 * @property int $id
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $sex
 * @property \Illuminate\Support\Carbon|null $birthDate
 * @property string $resource_type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $userdetailable_id
 * @property string $userdetailable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $userdetailable
 * @method static \Database\Factories\UserDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newQuery()
 * @method static \Illuminate\Database\Query\Builder|UserDetail onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereResourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUserdetailableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUserdetailableType($value)
 * @method static \Illuminate\Database\Query\Builder|UserDetail withTrashed()
 * @method static \Illuminate\Database\Query\Builder|UserDetail withoutTrashed()
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'sex',
        'birthDate',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'birthDate' => 'date',
    ];

    public function userdetailable()
    {
        return $this->morphTo();
    }
}
