<?php
class OrderController extends BaseController
{
  public function indexAction()
  {
    $query = Order::with([
      "account",
      "orderItems",
      "orderItems.product",
      "orderItems.product.category"
    ]);
    $account = Input::get("account");
    if ($account)
    {
      $query->where("account_id", $account);
    }
    return $query->get();
  }
}