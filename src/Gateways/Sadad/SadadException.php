<?php

namespace Dena\IranPayment\Gateways\Sadad;

use Dena\IranPayment\Exceptions\GatewayException;

class SadadException extends GatewayException
{
    public static array $errors = [
        -1      => 'پارامترهای ارسالی صحیح نیست و يا تراکنش در سیستم وجود ندارد',
        0       => 'تراکنش موفق',
        3 		=> 'پذيرنده کارت فعال نیست لطفا با بخش امورپذيرندگان, تماس حاصل فرمائید.',
        23 		=> 'پذيرنده کارت نامعتبر است لطفا با بخش امورذيرندگان, تماس حاصل فرمائید.',
        58 		=> 'انجام تراکنش مربوطه توسط پايانه ی انجام دهنده مجاز نمی باشد.',
        61 		=> 'مبلغ تراکنش از حد مجاز بالاتر است.',
        101     => 'مهلت ارسال تراکنش به پایان رسیده است',
        1000 	=> 'ترتیب پارامترهای ارسالی اشتباه می باشد, لطفا مسئول فنی پذيرنده با بانکماس حاصل فرمايند.',
        1001 	=> 'لطفا مسئول فنی پذيرنده با بانک تماس حاصل فرمايند,پارامترهای پرداختاشتباه می باشد.',
        1002 	=> 'خطا در سیستم- تراکنش ناموفق',
        1003 	=> 'آی پی پذیرنده اشتباه است. لطفا مسئول فنی پذیرنده با بانک تماس حاصل فرمایند.',
        1004 	=> 'لطفا مسئول فنی پذيرنده با بانک تماس حاصل فرمايند,شماره پذيرندهاشتباه است.',
        1005 	=> 'خطای دسترسی:لطفا بعدا تلاش فرمايید.',
        1006 	=> 'خطا در سیستم',
        1011 	=> 'درخواست تکراری- شماره سفارش تکراری می باشد.',
        1012 	=> 'اطلاعات پذيرنده صحیح نیست,يکی از موارد تاريخ,زمان يا کلید تراکنش
            اشتباه است.لطفا مسئول فنی پذيرنده با بانک تماس حاصل فرمايند.',
        1015 	=> 'پاسخ خطای نامشخص از سمت مرکز',
        1017 	=> 'مبلغ درخواستی شما جهت پرداخت از حد مجاز تعريف شده برای اين پذيرنده بیشتر است',
        1018 	=> 'اشکال در تاريخ و زمان سیستم. لطفا تاريخ و زمان سرور خود را با بانک هماهنگ نمايید',
        1019 	=> 'امکان پرداخت از طريق سیستم شتاب برای اين پذيرنده امکان پذير نیست',
        1020 	=> 'پذيرنده غیرفعال شده است.لطفا جهت فعال سازی با بانک تماس بگیريد',
        1023 	=> 'آدرس بازگشت پذيرنده نامعتبر است',
        1024 	=> 'مهر زمانی پذيرنده نامعتبر است',
        1025 	=> 'امضا تراکنش نامعتبر است',
        1026 	=> 'شماره سفارش تراکنش نامعتبر است',
        1027 	=> 'شماره پذيرنده نامعتبر است',
        1028 	=> 'شماره ترمینال پذيرنده نامعتبر است',
        1029 	=> 'آدرس IP پرداخت در محدوده آدرس های معتبر اعلام شده توسط پذيرنده نیست .لطفا مسئول فنی پذيرنده با بانک تماس حاصل فرمايند',
        1030 	=> 'آدرس Domain پرداخت در محدوده آدرس های معتبر اعلام شده توسط پذيرنده نیست .لطفا مسئول فنی پذيرنده با بانک تماس حاصل فرمايند',
        1031 	=> 'مهلت زمانی شما جهت پرداخت به پايان رسیده است.لطفا مجددا سعی بفرمايید .',
        1032 	=> 'پرداخت با اين کارت . برای پذيرنده مورد نظر شما امکان پذير نیست.لطفا از کارتهای مجاز که توسط پذيرنده معرفی شده است . استفاده نمايید.',
        1033 	=> 'به علت مشکل در سايت پذيرنده. پرداخت برای اين پذيرنده غیرفعال شده
            است.لطفا مسوول فنی سايت پذيرنده با بانک تماس حاصل فرمايند.',
        1036 	=> 'اطلاعات اضافی ارسال نشده يا دارای اشکال است',
        1037 	=> 'شماره پذيرنده يا شماره ترمینال پذيرنده صحیح نمیباشد',
        1053 	=> 'خطا: درخواست معتبر, از سمت پذيرنده صورت نگرفته است لطفا اطلاعات پذيرنده خود را چک کنید.',
        1055 	=> 'مقدار غیرمجاز در ورود اطلاعات',
        1056 	=> 'سیستم موقتا قطع میباشد.لطفا بعدا تلاش فرمايید.',
        1058 	=> 'سرويس پرداخت اينترنتی خارج از سرويس می باشد.لطفا بعدا سعی بفرمايید.',
        1061 	=> 'اشکال در تولید کد يکتا. لطفا مرورگر خود را بسته و با اجرای مجدد مرورگر « عملیات پرداخت را انجام دهید )احتمال استفاده از دکمه Back » مرورگر(',
        1064 	=> 'لطفا مجددا سعی بفرمايید',
        1065 	=> 'ارتباط ناموفق .لطفا چند لحظه ديگر مجددا سعی کنید',
        1066 	=> 'سیستم سرويس دهی پرداخت موقتا غیر فعال شده است',
        1068 	=> 'با عرض پوزش به علت بروزرسانی . سیستم موقتا قطع میباشد.',
        1072 	=> 'خطا در پردازش پارامترهای اختیاری پذيرنده',
        1101 	=> 'مبلغ تراکنش نامعتبر است',
        1103 	=> 'توکن ارسالی نامعتبر است',
        1104 	=> 'اطلاعات تسهیم صحیح نیست',
        1105    => 'مهلت زمانی به پايان رسیده است'
    ];

    public static function error(int $error_code, string $desc = null)
    {
        if ($error_code == -1 && !empty($desc)) {
            return new self($desc, $error_code);
        }
        return new self(self::$errors[$error_code] ?? self::$errors[-100], $error_code);
    }
}
