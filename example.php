<?php 
require_once("monobank.class.php");
$monobank = new monobank;

$params = [
    "amount" => 4200,
    "ccy" => 980,
    "merchantPaymInfo" => [
        "reference" => "84d0070ee4e44667b31371d8f8813947",
        "destination" => "Покупка щастя",
        "comment" => "Покупка щастя",
        "basketOrder" => [
            [
                "name" => "Табуретка",
                "qty" => 2,
                "sum" => 2100,
                "icon" => "string",
                "unit" => "шт.",
                "code" => "d21da1c47f3c45fca10a10c32518bdeb",
            ],
        ],
    ],
    "redirectUrl" => "https://example.com/your/website/result/page",
    "webHookUrl" =>
        "https://example.com/mono/acquiring/webhook/maybesomegibberishuniquestringbutnotnecessarily",
    "validity" => 3600,
    "paymentType" => "debit",
];
$xtoken = ""; //ADD YOUR TOKEN HERE
//LINK FOR TEST TOKEN https://api.monobank.ua/
echo $monobank->create_payment_button($params,$xtoken);
