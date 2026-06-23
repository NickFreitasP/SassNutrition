<?php


namespace App\Domain\Services;

class ImcCalculator
{

   public function calculate(float $height , float $weight) : float
   {

       return round($weight / ($height * $height ) );

   }

 public function classify(float $imc): string
{
    return match (true) {
        $imc < 18.5 => 'Abaixo do peso',
        $imc < 25   => 'Peso normal',
        $imc < 30   => 'Sobrepeso',
        $imc < 35   => 'Obesidade grau I',
        $imc < 40   => 'Obesidade grau II',
        default     => 'Obesidade grau III',
    };
}


}
