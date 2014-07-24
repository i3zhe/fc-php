<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Twitter
		 */
    'Twitter' => array(
        'client_id'     => 'krdI5H9QUqTHGeTTPUiPSK4LW',
        'client_secret' => 'Z1QDJeImqXjre8OsuxkVqtPIEjXz3l69E3E7s89tDGjtBzFoBN',
        // 'scope'         => array(),
    ),		

    /**
     * Github
     */
    'Github' => array(
        'client_id'     => '69090fd5c61bfc878245',
        'client_secret' => 'a26014b5e0ade38be4759561af8b7419d15fa64a',
        'scope'         => array("user:email"),
    ),

	)

);