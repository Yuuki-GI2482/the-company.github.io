<?php

# parent Class
class BankAccount {

      # define properties
      private $account_name;
      private $account_number;
      private $account_balance;

      public function __construct($account_name, $account_number)
      {
        $this-> account_name  = $account_name;
        $this-> account_number = $account_number;
        
      }

      #getters
      public function getAccountName()
      {
        return $this-> account_name;
      }

      public function getAccountNumber()
      {
        return $this-> account_number;
      }

      public function getBalance()
      {
        return $this-> account_balance;
      }

      public function depositAmount($amount)
      {
        if($amount > 0 ){
          $this->account_balance += $amount;
        }

        return $this;
      }
}


?>