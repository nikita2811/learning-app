<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Access the data using $this->resource
        $response = [
            'name' => $this->name,
            'priority' => $this->priority,
            'status' => $this->status,

        ];

        // // Customize the response structure
        // $response = [
        //     'data' => $data,
        //     // 'meta' => [
        //     //     'additional_info' => 'Custom additional information',
        //     // ],
        // ];

        return $response;
    }
}
