<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed user_name
 */
class UserResource extends JsonResource
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
            'ID'=>$this->id,
            'userID' => $this->email,
            'userName'=>$this->user_name,
            'email'=>$this->mail_id?$this->mail_id:'not assigned',
            'userType'=>new UserTypeResource($this->user_type)
        ];
    }
}
