<?php

declare(strict_types=1);

namespace Lightit\Shared\App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int                             $id
 * @property int                             $employee_id
 * @property string                          $title
 * @property string                          $description
 * @property string                          $status
 * @property string                          $assignedUser
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereAssignedUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 *
 * @property-read \Lightit\Shared\App\Employee|null $employee
 *
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected $fillable = ['title', 'description', 'status'];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
