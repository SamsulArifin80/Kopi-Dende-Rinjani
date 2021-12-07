<?php
//$target = '/../storage/app/public';
//$shortcut = '/../public/storage';
//symlink($target, $shortcut);
Route::get('/command',function(){
    Artisan::call('storage:link');
  });
?>
