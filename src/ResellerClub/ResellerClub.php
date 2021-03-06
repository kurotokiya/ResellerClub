<?php

namespace ResellerClub;

class ResellerClub {

  private $userid;
  private $apikey;
  private $client;
  private $params = [];
  private $response;
  private $error;

  /**
   * Initialization API
   *
   * @param string $userid
   * @param string $apikey
   */
  public function __construct($userid, $apikey){
    $this->userid = $userid;
    $this->apikey = $apikey;
    $this->client = new \GuzzleHttp\Client([
      'base_uri' => 'https://httpapi.com/api/',
      'timeout' => 300
    ]);
  }

  /**
   * Attach auth information to postvars
   *
   * @return ResellerClub\ResellerClub $obj
   */
  public function auth(){
    return $this->param('auth-userid', $this->userid)
                ->param('api-key', $this->apikey);
  }

  /**
   * Attach param to postvars
   *
   * @param string $key
   * @param string $value
   *
   * @return ResellerClub\ResellerClub $obj
   */
  public function param($key, $value){
    $this->params[] = $key.'='.$value;
    return $this;
  }

  /**
   * Post to API via GET method
   *
   * @param string $action
   * @param string $format
   *
   * @return ResellerClub\ResellerClub $obj
   */
  public function get($action, $format = 'json'){
    $uri = $action . '.' . $format . '?' . implode('&', $this->params);
    try{
      $this->response = $this->client->get($uri);
    }catch(\Exception $e){
      $this->error = $e->getMessage();
      return $this;
    }
    return $this;
  }

  /**
   * Post to API via POST method
   *
   * @param string $action
   * @param string $format
   *
   * @return ResellerClub\ResellerClub $obj
   */
  public function post($action, $format = 'json'){
    $uri = $action . '.' . $format . '?' . implode('&', $this->params);
    try{
      $this->response = $this->client->post($uri);
    }catch(\Exception $e){
      $this->error = $e->getMessage();
      return $this;
    }
    return $this;
  }

  /**
   * Fetch the result
   *
   * @return string $result
   */
  public function result(){
    if(!$this->response) return $this->error;
    $body = $this->response->getBody();
    $result = '';
    while(!$body->eof()){
      $result .= $body->read(1024);
    }
    return $result;
  }

}
