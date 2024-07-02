<?php

namespace App\Models\Supplier;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\Supplier\EmailVerificationNotification;
use App\Notifications\Supplier\SupplierResetPasswordNotification;

class Supplier extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone', 'store_name', 'status', 'type', 'wilaya_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SupplierResetPasswordNotification($token));
    }
    //
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerificationNotification);
    }
    //supplier relashing shep
    public function wilaya()
    {
        return $this->belongsTo('App\Models\Wilaya\Wilaya');
    }
    
}
