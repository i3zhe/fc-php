<?php

class Category extends Eloquent
{
  protected $table = "lottery_category";
  protected $guarded = ["id"];
  protected $softDelete = true;
  
  public function lotteries()
  {
    return $this->hasMany("Lottery");
  }
}

?>