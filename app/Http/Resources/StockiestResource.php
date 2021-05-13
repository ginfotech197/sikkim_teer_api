<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * Class StockiestResource
 * @package App\Http\Resources
 */

class StockiestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
//            'id'=>$this->id,
            'user_id' => $this->user_id,
            'user_name'=>$this->stockist_name,
            'email'=>$this->mail_id?$this->mail_id:'not assigned',
            'user_type'=>new UserTypeResource($this->user_type_id)
        ];
    }
}
