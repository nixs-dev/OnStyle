<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Posters extends Model
{
    public static function getAll()
    {
        $posters = Storage::allFiles('posters');

        for ($i = 0; $i <= count($posters) - 1; $i++) {
            $posters[$i] = Storage::url($posters[$i]);
        }

        return $posters;
    }
}
