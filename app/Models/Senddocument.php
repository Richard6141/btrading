<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Senddocument extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = [];
}