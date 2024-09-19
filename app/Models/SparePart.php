<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;

    // ระบุคอลัมน์ primary key
    protected $primaryKey = 'part_id'; 

    // เนื่องจากใช้ 'part_id' เป็น primary key, ไม่ต้องการการ auto-increment
    public $incrementing = true;

    // ตั้งค่า key type
    protected $keyType = 'int';

    // กำหนดคอลัมน์ที่สามารถกรอกข้อมูลได้
    protected $fillable = [
        'part_name',
        'amount',
        'brand',
        'model',
        'color',
        'price',
        'year',
        'type_spare',
        'image',
    ];
}
