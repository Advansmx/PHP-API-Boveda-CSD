# advans/php-api-boveda-csd

[![Latest Stable Version](https://img.shields.io/packagist/v/advans/php-api-boveda-csd?style=flat-square)](https://packagist.org/packages/advans/php-api-boveda-csd)
[![Total Downloads](https://img.shields.io/packagist/dt/advans/php-api-boveda-csd?style=flat-square)](https://packagist.org/packages/advans/php-api-boveda-csd)

## Instalación usando Composer

```sh
$ composer require advans/php-api-boveda-csd
```

## Ejemplo

````
$service_boveda = new \Advans\Api\BovedaCSD\BovedaCSD([
    'base_url' => '*************************',
    'key' => '**********************'
]);

$co = '||4.0|CPA-N1|4|2022-10-30T23:59:59|30001000000400002335|0|XXX|0|P|01|77527|CACX7605101P8|OPERADORA PUEBLO BONITO SUNSET BEH|610|XEXX010101000|BOOKIT.COM|77527|616|CP01|84111506|1|ACT|Pago|0|0|01|2.0|75722.39|75722.63|2022-10-23T23:59:59|03|MXN|1|75722.63|FFFFFFFF-7B25-45FC-9725-F0154D6E3D54|FAG-N1|826|USD|0.049523|1|3750.00|3750.00|0|02|3750.00|002|Exento|75722.39|002|Exento||'
$serial = '30001000000400002335';
$response = $service_boveda->sellar($co, $serial);
````

## Configuración

| Parámetro | Valor por defecto | Descripción |
| :--- | :--- | :--- |
| base_url | null | URL de la API |
| key | null | API Key |
