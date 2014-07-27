<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Account extends Eloquent implements UserInterface, RemindableInterface
{

  use UserTrait, RemindableTrait;
  
  protected $table = "account";
  protected $hidden = ["password"];
  protected $guarded = ["id"];
  protected $softDelete = true;

  protected $fillable = array('name', 'nick_name', 'email','avatar_url', 'provider_id');

  public function getAuthIdentifier()
  {
    return $this->getKey();
  }

  public function getAuthPassword()
  {
    return $this->password;
  }

  public function getReminderEmail()
  {
    return $this->email;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getNickName()
  {
    return $this->nick_name;
  }

  public function getAvatar()
  {
    return $this->avatar_url;
  }

  public function getProvider()
  {
    return $this->provider_id;
  }

  public function isAdmin() {
    return $this->is_admin;
  }

  public function orders()
  {
    return $this->hasMany("Order");
  }

  public function donations() {
    return $this->hasMany("Donation");
  }
}