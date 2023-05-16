<?php


namespace Www\Upload\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Http\Resources\ErrorResource;
use Curl\StrService\FileService;
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

            return new BaseResource($res);
        }

        return new ErrorResource([]);
    }
}