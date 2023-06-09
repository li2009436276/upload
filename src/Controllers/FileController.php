<?php


namespace Www\Upload\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\ErrorResource;
use Www\Upload\Resources\EditResource;
use Www\Upload\Services\FileService;
use Illuminate\Http\Request;

class FileController
{

    private $fileService;
    public function __construct(FileService $fileService) {

        $this->fileService = $fileService;
    }

    /**
     * 上传接口
     * @param Request $request
     * @return BaseResource|ErrorResource
     */
    public function upload(Request $request){

        $res = $this->fileService->upload(collect($request->files)->toArray(),env('IMG_BUCKET'));

        if ($res) {

            return new BaseResource(count($res) == 1 ? $res[0] : $res);
        }

        return new ErrorResource([]);
    }

    /**
     * layui上传图片
     * @param Request $request
     * @return BaseResource|ErrorResource
     */
    public function layuiEditUpload(Request $request){

        $res = $this->fileService->upload(collect($request->files)->toArray(),env('IMG_BUCKET'));

        if ($res) {

            return new EditResource(count($res) == 1 ? $res[0] : $res);
        }

        return new ErrorResource([]);
    }
}