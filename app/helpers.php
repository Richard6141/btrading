<?php

use App\Models\TypeService;

function upload($request)
{
    $file = $request->file('image');
    $filename = now() . $file->getClientOriginalName();
    $file->move(public_path('image'), $filename);
    return $filename;
}