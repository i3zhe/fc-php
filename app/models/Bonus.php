<?php
class Bonus extends Eloquent
{
  protected $table = "bonus";
  protected $guarded = ["id"];
  protected $softDelete = true;

  public function orderItem()
  {
    return $this->belongsTo("OrderItem");
  }
  
}