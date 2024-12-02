<?php
// Mở composer.json
// Thêm vào trong "autoload-dev" chuỗi sau
// "files": [
//         "app/function/cloud_name.php"
// ]
// Chạy cmd : composer  dumpautoload
function cloud_name(){
    return env("CLOUD_NAME");
}
