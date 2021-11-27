<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;
    
    protected $table = "tblwisata";

    protected $fillable = ["kodepos","nama","alamat"];

    protected $primaryKey = "kodepos";

    protected $keyType="string";
}
