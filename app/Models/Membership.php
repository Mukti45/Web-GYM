<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'memberships';

    // Tentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'name',
        'email',
        'start_date',
        'end_date',
        'status',
    ];

    // Tentukan tipe data untuk kolom tertentu, jika diperlukan
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    use SoftDeletes;

    // Kolom yang akan digunakan untuk soft delete
    protected $dates = ['deleted_at']; 
    
    // Jika ingin menambahkan metode tambahan, seperti untuk menghitung durasi membership
    public function getDurationAttribute()
    {
        $start = \Carbon\Carbon::parse($this->start_date);
        $end = \Carbon\Carbon::parse($this->end_date);
        return $start->diffInDays($end); // Menghitung durasi membership dalam hari
    }

    public static function updateMembershipStatus()
    {
        $memberships = Membership::where('end_date', '<', Carbon::now())
                                  ->where('status', 'active')
                                  ->get();

        foreach ($memberships as $membership) {
            $membership->status = 'inactive';
            $membership->save();
        }
    }
}
