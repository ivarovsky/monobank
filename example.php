<?php 
require_once("monobank.class.php");
$monobank = new monobank;

$params = [
    "amount" => 4200,
    "ccy" => 980,
    "merchantPaymInfo" => [
        "reference" => $data['reference'],
        "destination" => $data['reference'],
        "comment" => $data['comment'],
        "customerEmails" => $data,
        "basketOrder" => [
            [
                "name" => "Табуретка",
                "qty" => 2,
                "sum" => 2100,
                "icon" => "string",
                "unit" => "шт.",
                "code" => "d21da1c47f3c45fca10a10c32518bdeb",
                "barcode" => "string",
                "header" => "string",
                "footer" => "string",
                "tax" => [],
                "uktzed" => "string",
                "discounts" => [
                    [
                        "type" => "DISCOUNT",
                        "mode" => "PERCENT",
                        "value" => "PERCENT",
                    ],
                ],
            ],
        ],
    ],
    "redirectUrl" => "https://example.com/your/website/result/page",
    "webHookUrl" =>
        "https://example.com/mono/acquiring/webhook/maybesomegibberishuniquestringbutnotnecessarily",
    "validity" => 3600,
    "paymentType" => "debit",
    "qrId" => "XJ_DiM4rTd5V",
    "code" => "0a8637b3bccb42aa93fdeb791b8b58e9",
    "saveCardData" => [
        "saveCard" => true,
        "walletId" => "69f780d841a0434aa535b08821f4822c",
    ],
];
$xtoken = ""; //ADD YOUR TOKEN HERE

create_payment_button($params,$xtoken);

