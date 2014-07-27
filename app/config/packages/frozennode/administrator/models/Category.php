<?php

return array(
  /**
   * Model title
   *
   * @type string
   */
  'title' => 'Lottery Category',

  /**
   * The singular name of your model
   *
   * @type string
   */
  'single' => 'Category',

  /**
   * The class name of the Eloquent model that this config represents
   *
   * @type string
   */
  'model' => 'Category',

  /**
   * The columns array
   *
   * @type array
   */
  'columns' => array(
    'name' => array(
      'title' => 'Name'
    ),
    'description' => array(
      'title' => 'Description',          
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
    'description' => array(
      'title' => 'Description',
      'type' => 'textarea'
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