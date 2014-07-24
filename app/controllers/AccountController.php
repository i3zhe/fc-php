<?php
class AccountController extends BaseController
{
  public function authenticateAction()
  {
    $credentials = [
      "email"    => Input::get("email"),
      "password" => Input::get("password")
    ];
    if (Auth::attempt($credentials))
    {
      return Response::json([
        "status"  => "ok",
        "account" => Auth::user()->toArray()
      ]);
    }
    return Response::json([
      "status" => "error"
    ]);
  }

  public function getIndex() {
    $accounts = Account::all();


  }

  public function getCreate() {
    $account = new Account;


  }

  public function postStore() {
    $email = Input::get('email');
    $name = Input::get('name');
    $nick_name = Input::get('nick_name');
    $password = Input::get('password');

    $account = Account::create(
      array(
        'id' => null,
        'email' => $email,
        'name'  => $name,
        'nick_name' => $nick_name,
        'password' => md5($password),
      )
    );


  }

  public function getShow($id) {
    $account = Account::findOrFail($id);

  }

  public function getEdit($id) {
    $account = Account::findOrFail($id);
  }

  public function putUpdate($id) {
    $account = Account::findOrFail($id);
  }

  public function deleteDestroy($id) {
    Account::findOrFail($id)->delete();
  }

  public function loginWithTwitter() {

    // get data from input
    $token = Input::get( 'oauth_token' );
    $verify = Input::get( 'oauth_verifier' );

    // get twitter service
    $tw = OAuth::consumer( 'Twitter' );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $token ) && !empty( $verify ) ) {

        // This was a callback request from twitter, get the token
        $token = $tw->requestAccessToken( $token, $verify );

        // Send a request with it
        $result = json_decode( $tw->request( 'account/verify_credentials.json' ), true );
        
        $provider_id = "Twitter_".$result['id_str'];

        $account = Account::where('provider_id', '=', $provider_id);

        if (count($account->get()) == 0) {
          # TODO: ask user for email
          $account = Account::create(
            array(
              'id' => null,
              'name'  => $result['name'],
              'nick_name' => $result['screen_name'],
              'provider_id' => $provider_id,
              'avatar_url' => $result['profile_image_url'],
            )
          );

        }
        
        # TODO: sign in the registered user
        

    }
    // if not ask for permission first
    else {
        // get request token
        $reqToken = $tw->requestRequestToken();

        // get Authorization Uri sending the request token
        $url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

        // return to twitter login url
        return Redirect::to( (string)$url );
    }
  }

  public function loginWithGithub() {

    // get data from input
    $token = Input::get( 'code' );

    // get twitter service
    $github = OAuth::consumer( 'Github' );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $token )) {

        // This was a callback request from twitter, get the token
        $token = $github->requestAccessToken( $token);

        // Send a request with it
        $result = json_decode( $github->request( '/user' ), true );
        
        $provider_id = "Github_".$result['id'];

        $gravatar_url = "https://www.gravatar.com/avatar/" . $result['gravatar_id'] ."?size=60&default=wavatar";

        $account = Account::where('provider_id', '=', $provider_id);

        if (count($account->get()) == 0) {
          # TODO: ask user for email
          $account = Account::create(
            array(
              'id' => null,              
              'email' => $result['email'],
              'nick_name' => $result['login'],
              'provider_id' => $provider_id,
              'avatar_url' => $gravatar_url,
            )
          );

        }

        # TODO: sign in the registered user

    } 
    // if not ask for permission first
    else {

        // get Authorization Uri sending the request token
        $url = $github->getAuthorizationUri();

        // return to twitter login url
        return Redirect::to( (string)$url );
    }
  }
}