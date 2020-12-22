<?php

namespace App\Validations;

class PatientRules
{
    public function CPF(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/','',$cpf);

        if(strlen($cpf) != 11 || preg_match('/^([0-9])\1+$/', $cpf))
        {
            return false;
        }

        // 9 primeiros digitos do cpf
        $digit = substr($cpf, 0, 9);

        // calculo dos 2 digitos verificadores
        for($j=10; $j <= 11; $j++)
        {
            $sum = 0;
            for($i=0; $i< $j-1; $i++)
            {
                $sum += ($j-$i) * ((int) $digit[$i]);
            }

            $summod11 = $sum % 11;
            $digit[$j-1] = $summod11 < 2 ? 0 : 11 - $summod11;
        }

        return $digit[9] == ((int)$cpf[9]) && $digit[10] == ((int)$cpf[10]);
    }


    public function CNS($cns): bool
    {
        $cns = filter_var($cns, FILTER_SANITIZE_NUMBER_INT);
        $cns = str_replace(' ', '', $cns);

        // CNSs definitivos começam em 1 ou 2 / CNSs provisórios em 7, 8 ou 9
        if (preg_match("/[1-2][0-9]{10}00[0-1][0-9]/", $cns) || preg_match("/[7-9][0-9]{14}/", $cns)) {
            return $this->somaPonderadaCns($cns) % 11 == 0;
        }

        return false;
    }

    private function somaPonderadaCns($value): int
    {
        $soma = 0;

        for ($i = 0; $i < mb_strlen($value); $i++) {
            $soma += $value[$i] * (15 - $i);
        }

        return $soma;
    }
}