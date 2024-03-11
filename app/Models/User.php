<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;




class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'teamid',
        'referral',
        'role',
        'admin',
        'companyname',
        'manager',
        'contactperson',
        'street',
        'zipcode',
        'city',
        'phone',
        'website',
        'bankname',
        'iban',
        'bic',
        'taxnumber',
        'financeoffice',
        'socialsecuritynumber',
        'vatid',
        'gisa1',
        'gisa2',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function paymentDetails()
    {
        return $this->hasOne(PaymentDetail::class);
    }
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
public function team()
{
    return $this->belongsTo(Team::class, 'teamid');
}

  public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
    public function vermittlernummern()
    {
        return $this->hasMany(Vermittlernummer::class, 'user_id');
    }
}

