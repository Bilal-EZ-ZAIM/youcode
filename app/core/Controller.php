<?php

class Controller
{
    public function view($name, $data)
    {
        $filename = "../app/views/" . $name . ".view.php";

        if (file_exists($filename)) {
            // استخراج مفاتيح البيانات كمتغيرات في النطاق المحلي
            extract($data);

            // تحميل ملف العرض
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}
