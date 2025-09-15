#!/bin/bash

# سكريبت لتشغيل seeders الموديولات فقط
# استخدم: bash seed-modules.sh

echo "🌱 تشغيل Seeders للموديولات..."

# قائمة الموديولات
modules=(
    "AdminManagement"
    "ServiceManagement"
    "SliderManagement"
    "ClientManagement"
    "TeamManagement"
    "StaticPages"
    "ContactUs"
    "ProjectManagement"
    "SettingManagement"
    "FaqManagement"
    "ReviewManagement"
    "Appointment"
    "PackageManagement"
    "Newsletters"
    "AreaManagement"
    "TrainerManagement"
    "ReportManagement"
    "TestimonialManagement"
    "JoinUs"
    "BlogManagement"
    "TwitterIntefrationManagement"
)

# تشغيل seeders لكل موديول
for module in "${modules[@]}"; do
    echo "📚 تشغيل seeder للموديول: $module"
    php artisan module:seed "$module" --force
    if [ $? -eq 0 ]; then
        echo "✅ تم بنجاح: $module"
    else
        echo "❌ خطأ في: $module"
    fi
done

echo "🎉 تم تشغيل جميع seeders الموديولات!"
