<?php

namespace App\Models;

use Illuminate\Support\Arr;
use App\Contracts\ImageableContract;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Imageable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model implements ImageableContract
{
    use HasFactory;
    use Imageable;


    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'array',
    ];

    public function uploadFolder(): string
    {
        return 'settings';
    }

    public function heroDescription(): ?string
    {
        return Arr::get($this->data, 'hero_description');
    }


    public function aboutDescription(): ?string
    {
        return Arr::get($this->data, 'about_description');
    }

    public function address(): ?string
    {
        return Arr::get($this->data, 'address');
    }

    public function phone(): ?string
    {
        return Arr::get($this->data, 'phone');
    }

    public function email(): ?string
    {
        return Arr::get($this->data, 'email');
    }

    public function googleMapUrl(): ?string
    {
        return Arr::get($this->data, 'google_map_url');
    }
}
