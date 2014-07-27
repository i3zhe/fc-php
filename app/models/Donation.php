<?php
class Donation extends Eloquent
{
  protected $table = "donation";
  protected $guarded = ["id"];
  protected $softDelete = true;

  public function account()
  {
    return $this->belongsTo("account");
  }
  
}