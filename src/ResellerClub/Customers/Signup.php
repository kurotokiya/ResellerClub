<?php

namespace ResellerClub\Customers;

class Signup extends ResellerClub {

  /**
   * Username for the Customer Account. Username should be an email address.
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function username($value){
    return $this->param('username', $value);
  }

  /**
   * Password for the Customer Account.
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function passwd($value){
    return $this->param('passwd', $value);
  }

  /**
   * Name of the Customer
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function name($value){
    return $this->param('name', $value);
  }

  /**
   * Name of the Customer's company
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function company($value){
    return $this->param('company', $value);
  }

  /**
   * Address line 1 of the Customer's address
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function address_line_1($value){
    return $this->param('address-line-1', $value);
  }

  /**
   * City
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function city($value){
    return $this->param('city', $value);
  }

  /**
   * State.
   * In case the State information is not available, you need to pass the value for this parameter as Not Applicable.
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function state($value){
    return $this->param('state', $value);
  }

  /**
   * Country Code as per ISO 3166-1 alpha-2
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function country($value){
    return $this->param('country', $value);
  }

  /**
   * ZIP code
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function zipcode($value){
    return $this->param('zipcode', $value);
  }

  /**
   * Telephone number Country Code
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function phone_cc($value){
    return $this->param('phone-cc', $value);
  }

  /**
   * Phone number
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function phone($value){
    return $this->param('phone', $value);
  }

  /**
   * Language Code as per ISO
   *
   * @param string $value
   *
   * @return ResellerClub\Customers\Signup $obj
   */
  public function lang_pref($value){
    return $this->param('lang-pref', $value);
  }

  /**
   * Post data and get response
   *
   * @return string $result
   *   Creates a Customer Account and returns the Customer ID (Integer) of the newly added Customer.
   *   In case of any errors, a status key with value as ERROR alongwith an error message will be returned.
   */
  public function response(){
    return $this->auth()->get('customers/signup')->result();
  }

}
