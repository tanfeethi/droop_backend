<?php
if (in_array('mod_rewrite', apache_get_modules())) {
    echo "✅ mod_rewrite مفعل على السيرفر";
} else {
    echo "❌ mod_rewrite غير مفعل على السيرفر";
}
?>
