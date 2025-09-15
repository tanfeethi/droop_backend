#!/bin/bash

# سكريبت النشر للهوست
# استخدم: bash deploy.sh

echo "🚀 بدء عملية النشر..."

# التحقق من وجود Laravel
if [ ! -f "artisan" ]; then
    echo "❌ خطأ: لم يتم العثور على ملف artisan. تأكد من أنك في مجلد Laravel الصحيح"
    exit 1
fi

# تحديث Composer
echo "📦 تحديث Composer..."
composer install --no-dev --optimize-autoloader

# تنظيف Cache
echo "🧹 تنظيف Cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# تشغيل Migrations
echo "🗄️ تشغيل Migrations..."
php artisan migrate --force

# تشغيل Seeders
echo "🌱 تشغيل Seeders..."
php artisan db:seed --force

# تشغيل Seeders للموديولات
echo "📚 تشغيل Seeders للموديولات..."
php artisan module:seed --all --force

# تحسين التطبيق
echo "⚡ تحسين التطبيق..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# تعيين الصلاحيات
echo "🔐 تعيين الصلاحيات..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

echo "✅ تم النشر بنجاح!"
echo "🌐 يمكنك الآن الوصول لموقعك"
