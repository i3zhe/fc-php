<?php

return array(
  /**
   * Model title
   *
   * @type string
   */
  'title' => 'Lottery',

  /**
   * The singular name of your model
   *
   * @type string
   */
  'single' => 'Lottery',

  /**
   * The class name of the Eloquent model that this config represents
   *
   * @type string
   */
  'model' => 'Lottery',

  /**
   * The columns array
   *
   * @type array
   */
  'columns' => array(
    'name' => array(
      'title' => 'Name'
    ),    
    'price' => array(
      'title' => 'price',          
    ),
    'time_cycle' => array(
      'title' => 'Time Cycle'
    ),
    'drawing_time' => array(
      'title' => 'Drawing Time'
    ),
    'category' => array(
      'title' => 'Category',
      'relationship' => 'Category',
      'select' => 'name',
    ),
  ),

  /**
   * The edit fields array
   *
   * @type array
   */
  'edit_fields' => array(
    'name' => array(
      'title' => 'Name',
      'type' => 'text'
    ),
    'price' => array(
      'title' => 'Price',
      'type' => 'text'
    ),
    'time_cycle' => array(
      'title' => 'Time Cycle',
      'type' => 'text'
    ),
    'drawing_time' => array(
      'title' => 'Drawing Time',
      'type' => 'text'
    ),
    'Category' => array(
      'title' => 'Category',
      'type' => 'relationship'
    ),
  ),

  /**
   * The permission option is the per-model authentication check that lets you define a closure that should return true if the current user
   * is allowed to view this model. Any "falsey" response will result in a 404.
   *
   * @type closure
   */
  'permission'=> function()
  {
    return Auth::check() && Auth::user()->isAdmin();
  },

  /**
   * The validation rules for the form, based on the Laravel validation class
   *
   * @type array
   */
  'rules' => array(
    'name' => 'required',
  ),

  /**
   * The sort options for a model
   *
   * @type array
   */
  'sort' => array(
    'field' => 'name',
    'direction' => 'asc',
  ),
);  

?>