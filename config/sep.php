<?php

return[
    'url' => 'https://sep.shaparak.ir/MobilePG/MobilePayment', //Payment URL
    'purl' => 'https://sep.shaparak.ir/OnlinePG/OnlinePG', //Submit Token URL
    'vurl' => 'https://verify.sep.ir/Payments/ReferencePayment.asmx?WSDL', //Verify URL
    'terminalId' => '21302778',
    'password' => '5608800',
    'MID' => '21302778',
//    'SEPPayerId' => '0',
    'WageType' => 'None', //None,Percent,Amount
    'WageValue' => 0.5,
//    'SEPWageValue' => 50000,
    'CalcCommissionType' => '-', // +: Add to final amount , -: Final amount leaves untouched and wage subtracts from amount
];
