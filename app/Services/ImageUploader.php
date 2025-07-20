<?php

namespace App\Services;

use Illuminate\Http\Request;

class ImageUploader
{
    /**
     * Handles file upload if it exists in the request.
     *
     * @param Request $request
     * @param string $key
     * @param string $folder
     * @param string $disk
     * @return string|null
     */
    public function handleUpload(Request $request, string $key = 'image', string $folder = 'products', string $disk = 'public'): ?string
    {
        if ($request->hasFile($key)) {
            return $request->file($key)->store($folder, $disk);
        }

        return null;
    }
}
