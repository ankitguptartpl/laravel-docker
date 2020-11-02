<?php

namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * createdByUser()
     *
     * @purpose : This function is used for get created_by user data
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * updatedByUser()
     *
     * @purpose : This function is used for get updated_by user data
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
