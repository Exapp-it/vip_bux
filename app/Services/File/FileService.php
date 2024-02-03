<?php

namespace App\Services\File;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class FileService
{
  public function storeFile(UploadedFile $file, $directory, $options = [])
  {
    $this->validateMimeType($file, $options['allowedMimeTypes'] ?? []);

    $fileName = $options['fileName'] ?? Str::uuid() . '.' . $file->getClientOriginalExtension();
    $disk = $options['disk'] ?? 'public';

    $path = $file->storeAs($directory, $fileName, $disk);

    return $path;
  }

  public function deleteFile($path, $disk = 'public')
  {
    return Storage::disk($disk)->delete($path);
  }

  public function getPublicUrl($path, $disk = 'public')
  {
    if ($this->fileExists($path, $disk)) {
      return Storage::disk($disk)->url($path);
    }

    return null;
  }

  public function fileExists($path, $disk = 'public')
  {
    return Storage::disk($disk)->exists($path);
  }

  public function optimizeImage($path, $width, $height, $disk = 'public')
  {
    $image = Image::load(Storage::disk($disk)->path($path))
      ->width($width)
      ->height($height)
      ->optimize();

    $image->save();

    return $path;
  }


  protected function validateMimeType(UploadedFile $file, $allowedMimeTypes)
  {
    if (!empty($allowedMimeTypes) && !in_array($file->getClientMimeType(), $allowedMimeTypes)) {
      throw new \Exception('Invalid file type. Only specified mime types are allowed.');
    }
  }
}
