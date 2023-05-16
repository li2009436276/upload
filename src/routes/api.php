<?php

//上传文件
Route::post('/file/upload', 'FileController@upload');
Route::post('/file/layuiEditUpload', 'FileController@layuiEditUpload');