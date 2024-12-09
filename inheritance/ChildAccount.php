<?php

include 'BankAccount.php';

class Account1 extends BankAccount{
    private $interest_rate;

    public function emailAccount()
    {
      return "john@gmail.com";
    }

    public function getEmailAddress()
    {
      return $this->emailAccount();
    }

    public function setInterestRate($interest_rate)
    {
      $this->interest_rate = $interest_rate;
    }

    public function addInterestRate()
    {
      $interest = $this->interest_rate * $this->getBalance();

      $this->depositAmount($interest);
    }

    
}

# create an obj

$account_1 = new Account1("John Doe", "321-32343-231");

echo "Account name: " . $account_1->getAccountName() ."<br>";
echo "Account Number: " . $account_1->getAccountNumber() ."<br>";
$account_1->depositAmount(500);
$account_1->setInterestRate(0.05);
$account_1->addInterestRate();
echo "Balance: " . $account_1->getBalance() ."<br>";
echo "Email Address: " . $account_1->getEmailAddress() ."<br>";


?>