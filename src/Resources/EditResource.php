<?php

namespace Www\Upload\Resources;

use Illuminate\Http\Resources\Json\Resource;
class EditResource extends Resource
{

    public function toArray($request)
    {
        return $this->resource;
    }

    public function with($request){
        if (empty($this->resource) || !is_string($this->resource)) {

            $this->resource = 'SUCCESS';
        }

        list($code,$msg) = config("code.$this->resource");
        return [
            'code' => $code,
            'msg' => $msg
        ];

    }
}