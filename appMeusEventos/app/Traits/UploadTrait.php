<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    public function multipleFilesUpload(array $files, string $folder, string $column)
    {
        $uploadFiles = [];

        foreach ($files as $file) {
            $uploadFiles[] = [$column => $this->upload($file, $folder)];
        }
        return $uploadFiles;
    }
    public function upload(UploadedFile $file, string $folder)
    {
        return $file->store($folder, 'public');
    }
}
