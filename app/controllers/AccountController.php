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
        // header("charset=utf-8");
        $message = 'Your unique Twitter user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
        echo $message. "<br/>";

        //Var_dump
        //display whole array().
        dd($result);

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
}