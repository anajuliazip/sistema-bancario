<?php
function luhnCheckDigit($number) {
    $sum = 0;
    $shouldDouble = false;

    for ($i = strlen($number) - 1; $i >= 0; $i--) {
        $digit = intval($number[$i]);
        if ($shouldDouble) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
        $shouldDouble = !$shouldDouble;
    }

    return (10 - ($sum % 10)) % 10;
}

function generateCreditCardNumber() {
    $prefix = '400000'; // Visa prefix, por exemplo
    $number = $prefix . str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);
    $number .= luhnCheckDigit($number);
    return $number;
}

// Gera um número de cartão de crédito
$creditCardNumber = generateCreditCardNumber();

// Retorna o número de cartão de crédito como JSON
header('Content-Type: application/json');
echo json_encode(['cardNumber' => $creditCardNumber]);
?>
