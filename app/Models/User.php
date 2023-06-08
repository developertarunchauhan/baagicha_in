<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'handle',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * Eloquent Relationship
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_user');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }


    /**
     * Mutators : 
     */

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucfirst(strtolower($name));
        $this->attributes['handle'] = Str::slug($name, '-') . '-' . strtolower(Str::random(5));
    }

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password);
    //     $this->attributes['email_verified_at'] = now();
    // }


    /**
     * Using slug instead of id to access the resource
     */
    public function getRouteKeyName(): string
    {
        return 'handle';
    }
}
