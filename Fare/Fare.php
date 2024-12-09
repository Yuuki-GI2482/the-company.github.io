<?php
 class FareCalculator{

  private $baseFare = 8;
  private $perKmCharge = 1; 
  private $discountRate = 0.20;
  
  public function calculateFare($age, $distance) {
    $totalFare = $this->baseFare;
  
    if ($distance > 4) {
      $totalFare += ($distance - 4) * $this->perKmCharge;
  }
  if ($age >= 60) {
    $totalFare *= (1 - $this->discountRate);
  }

  return $totalFare;
}
  
  
  }
   
?>