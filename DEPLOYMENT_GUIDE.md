# دليل النشر على الهوست

## 📋 المتطلبات الأساسية

1. **PHP 8.0+** مع Extensions:
   - BCMath
   - Ctype
   - Fileinfo
   - JSON
   - Mbstring
   - OpenSSL
   - PDO
   - Tokenizer
   - XML

2. **Composer** مثبت على الهوست
3. **MySQL** قاعدة بيانات
4. **SSH Access** أو **cPanel Terminal**

## 🚀 خطوات النشر

### 1. رفع الملفات
```bash
# رفع جميع ملفات المشروع إلى الهوست
# تأكد من رفع جميع الملفات بما في ذلك:
# - vendor/ (أو تشغيل composer install)
# - .env
# - storage/
# - bootstrap/cache/
```

### 2. إعداد البيئة
```bash
# نسخ ملف البيئة
cp .env.example .env

# تعديل ملف .env حسب إعدادات الهوست
nano .env
```

### 3. تثبيت التبعيات
```bash
# تثبيت Composer Dependencies
composer install --no-dev --optimize-autoloader
```

### 4. إعداد Laravel
```bash
# توليد مفتاح التطبيق
php artisan key:generate

# تشغيل Migrations
php artisan migrate --force

# تشغيل Seeders
php artisan db:seed --force

# تشغيل Seeders للموديولات
php artisan module:seed --all --force
```

### 5. تحسين الأداء
```bash
# تنظيف Cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# إنشاء Cache محسن
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6. تعيين الصلاحيات
```bash
# تعيين صلاحيات المجلدات
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chmod -R 755 public/storage
```

## 🔧 أوامر مفيدة للهوست

### تشغيل Migrations فقط
```bash
php artisan migrate --force
```

### تشغيل Seeders فقط
```bash
php artisan db:seed --force
```

### تشغيل Seeders للموديولات فقط
```bash
php artisan module:seed --all --force
```

### إعادة تعيين قاعدة البيانات
```bash
php artisan migrate:fresh --seed --force
```

### تشغيل موديول محدد
```bash
php artisan module:seed ModuleName --force
```

## ⚠️ ملاحظات مهمة

1. **استخدم `--force`** في الإنتاج لتجنب رسائل التأكيد
2. **تأكد من نسخ احتياطي** لقاعدة البيانات قبل التشغيل
3. **اختبر على بيئة التطوير** أولاً
4. **تحقق من إعدادات قاعدة البيانات** في ملف .env
5. **تأكد من وجود جميع الملفات** المطلوبة

## 🆘 حل المشاكل الشائعة

### خطأ في الصلاحيات
```bash
chmod -R 755 storage bootstrap/cache
```

### خطأ في قاعدة البيانات
```bash
# تحقق من إعدادات .env
php artisan config:clear
php artisan config:cache
```

### خطأ في الموديولات
```bash
php artisan module:list
php artisan module:seed ModuleName --force
```

## 📞 الدعم

إذا واجهت مشاكل، تأكد من:
- إصدار PHP المتوافق
- إعدادات قاعدة البيانات الصحيحة
- صلاحيات الملفات والمجلدات
- وجود جميع التبعيات المطلوبة
