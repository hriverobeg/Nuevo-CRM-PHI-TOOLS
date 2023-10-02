<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileTrait {
    protected $extensiones = array('pdf', 'xls', 'xlsx', 'doc', 'docx', 'csv', 'pptx');

    protected function isFile($extension)
    {
        return in_array($extension, $this->extensiones);
    }

    protected function saveFile($file)
    {
        $filename = $this->createSlugText($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();

        Storage::disk('documents')->putFileAs(
        '/',
        $file,
        $filename
        );
        return $filename;
    }

    protected function deleteFile($file)
    {
        Storage::disk('documents')->delete($file);
    }

    protected function createSlugText($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
