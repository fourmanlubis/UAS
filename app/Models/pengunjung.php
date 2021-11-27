<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    use HasFactory;
protected $table = "tblpengunjung";

    protected $fillable = ["kodepos","lokasi_id","pengunjung"];

    /**
     * Get the lokasi that owns the Nilai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lokasi()
    {
        return $this->belongsTo(\App\Models\wisata::class);
    }

    /**
     * Get the wisata that owns the pengunjung
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wisata()
    {
        return $this->belongsTo(\App\Models\wisata::class, 'nim', 'nim');
    }
}

