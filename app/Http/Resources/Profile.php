<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Profile extends JsonResource
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
            'id'            => $this->id, 
            'user_id'       => $this->user_id, 
            'theme_id'      => $this->theme_id, 
            'location'      => $this->location, 
            'bio'           => $this->bio, 
            'url'           => $this->url, 
            'phone'         => $this->phone, 
            'mobile'        => $this->mobile, 
            'date_of_birth' => $this->date_of_birth, 
            'gender'        => $this->gender, 
            'twitter'       => $this->twitter, 
            'facebook'      => $this->facebook, 
            'googleplus'    => $this->googleplus, 
            'linkedin'      => $this->linkedin, 
            'github'        => $this->github, 
            'avatar'        => $this->avatar, 
            'avatar_status' => $this->avatar_status, 
            'created_at'    => $this->created_at, 
            'updated_at'    => $this->updated_at, 
        ];
    }
}
