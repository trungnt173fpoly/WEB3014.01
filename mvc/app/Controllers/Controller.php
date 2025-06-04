<?php 
namespace App\Controllers;
use eftec\bladeone\BladeOne;
class Controller{
    protected function views($nameFile, $data=[]){
        // Xác đinh đường dẫn đến thư mục view
        $view = __DIR__ .'/../../resources/views';
        // Xác định đường dẫn nơi lưu trữ file biên dịch
        $cache = __DIR__.'/../../storage/cache';
        $blade = new BladeOne($view, 
        $cache,
        BladeOne::MODE_DEBUG);
        // Thực thi
        echo $blade->run($nameFile,  $data);
    }
}
?>