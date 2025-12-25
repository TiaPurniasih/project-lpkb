<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Laravel\Facades\Image;

trait FileUploadTrait
{
    /**
     * Upload file + thumbnail (if image)
     */
    public function uploadFile(UploadedFile $file, $column, $customFolder = null, $returnPath = false, $dbSave = true)
    {
        $table  = $this->getTable();
        $folder = "uploads/$table".$customFolder;
        $ext    = strtolower($file->getClientOriginalExtension());
        $name   = $column . '_' . time() . '_' . uniqid() . '.' . $ext;

        // Save File
        $path = $file->storeAs($folder, $name, 'public');

        // Generate Thumbnail If Image
        if ($this->isImage($ext)) {
            $this->generateRetinaThumbnail($file, $folder, $column, $name);
        }

        // Save to DB field column
        if($dbSave){
            $this->{$column} = $name;
            $this->save();
        }

        if($returnPath){
            return $path;
        }else{
            return $name;
        }

    }

    /**
     * Check if extension is image
     */
    private function isImage($ext)
    {
        return in_array($ext, ['jpg','jpeg','png','gif','webp']);
    }

    /**
     * Generate thumbnail retina
     */
    private function generateRetinaThumbnail($file, $folder, $column, $name)
    {
        $sizes = $this->uploadThumbnailSizes[$column] ?? ['width' => 300, 'height' => null];

        $img = Image::read($file); // gunakan read() untuk v3

        $w = $sizes['width'];
        $h = $sizes['height'];

        // Normal thumbnail
        $normal = clone $img;
        $normal = $this->resize($normal, $w, $h);
        Storage::disk('public')->put("$folder/thumb_$name", $normal->encode());

        // Retina thumbnail (2x)
        $retina = clone $img;
        $retina = $this->resize($retina, $w * 2, $h ? $h * 2 : null);
        Storage::disk('public')->put("$folder/thumb@2x_$name", $retina->encode());
    }

    private function resize($image, $width, $height = null)
    {
        return $image->resize(
            $width,
            $height,
            function ($c) {
                $c->aspectRatio();
                $c->upsize(); // mencegah zoom berlebihan jika gambar kecil
            }
        )->orient();
    }

    /**
     * Delete file and thumbnail
     */
    public function deleteFile($column, $customFolder = null)
    {
        if (!$this->{$column}) return;

        $table  = $this->getTable();
        $folder = $customFolder ?? "uploads/$table";
        $name   = $this->{$column};

        Storage::disk('public')->delete([
            "$folder/$name",
            "$folder/thumb_$name",
            "$folder/thumb@2x_$name"
        ]);

        $this->{$column} = null;
        $this->save();
    }

    /**
     * Getter: File URL
     */
    public function getFileUrl($column)
    {
        if (!$this->{$column}) return null;

        $table = $this->getTable();
        return asset("storage/uploads/$table/" . $this->{$column});
    }

    /**
     * Getter: Thumbnail URL
     */
    public function getThumbnailUrl($column, $retina = false)
    {
        if (!$this->{$column}) return null;

        $table  = $this->getTable();
        $prefix = $retina ? 'thumb@2x_' : 'thumb_';

        return asset("storage/uploads/$table/" . $prefix . $this->{$column});
    }
}
