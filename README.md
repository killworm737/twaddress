# twaddress

參考 [台灣戶政編釘及地址解析 III (追加篇). [日常生活研究#3] | by Khalid al-Hazmi | Medium](https://medium.com/@khalid.hazmi/%E5%8F%B0%E7%81%A3%E6%88%B6%E6%94%BF%E7%B7%A8%E9%87%98%E5%8F%8A%E5%9C%B0%E5%9D%80%E8%A7%A3%E6%9E%90-iii-%E8%BF%BD%E5%8A%A0%E7%AF%87-aa4667c3a3ea)

來產生地址陣列

## Installation

```
composer require killworm737/twaddress
```

## Use

```php
use Killworm737\Twaddress\Address;

$rule = new Address();
$str = '桃園市龜山區山頂里2鄰正興街10巷5號';

$arr = $rule->get($str);

```
