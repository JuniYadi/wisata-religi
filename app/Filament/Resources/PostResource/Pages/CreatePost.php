<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        // // get image banner
        // $bannerData = Storage::get($data['banner']);
        // $banner = imagecreatefromstring($bannerData);
        // $banner_filter = $data['banner_filter'];

        // // convert image based on filter
        // if($banner_filter == "grayscale") {
        //     $banner = imagefilter($banner, IMG_FILTER_GRAYSCALE);
        // } else if($banner_filter == "brightness") {
        //     $banner = imagefilter($banner, IMG_FILTER_BRIGHTNESS, 50);
        // } else if($banner_filter == "contrast") {
        //     $banner = imagefilter($banner, IMG_FILTER_CONTRAST, -50);
        // }

        // // save image
        // Storage::put($data['banner'], imagepng($banner));

        return $data;
    }
}
