<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SparePart;

class SparePartController extends Controller
{
    public function create()
{
    return view('spare_parts.create');
}


public function store(Request $request)
{
    $request->validate([
        'part_name' => 'required|string|max:255',
        'amount' => 'required|integer',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'price' => 'required|numeric',
        'year' => 'required|integer',
        'type_spare' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images/spare_parts', 'public');
    }

    // Create new SparePart with image path if available
    SparePart::create([
        'part_name' => $request->part_name,
        'amount' => $request->amount,
        'brand' => $request->brand,
        'model' => $request->model,
        'color' => $request->color,
        'price' => $request->price,
        'year' => $request->year,
        'type_spare' => $request->type_spare,
        'image' => $imagePath,
    ]);

    return redirect()->route('spare_parts.create')->with('success', 'Spare part added successfully!');
}

public function index()
{
    $spareParts = SparePart::all();
    return view('spare_parts.index', compact('spareParts'));
}
public function edit($part_id)
{
    $sparePart = SparePart::where('part_id', $part_id)->firstOrFail();
    return view('spare_parts.edit', compact('sparePart'));
}

public function update(Request $request, $part_id)
{
    $request->validate([
        'part_name' => 'required|string|max:255',
        'amount' => 'required|integer',
        'brand' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'price' => 'required|numeric',
        'year' => 'required|integer',
        'type_spare' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $sparePart = SparePart::where('part_id', $part_id)->firstOrFail();

    $imagePath = $sparePart->image; // Preserve existing image path
    if ($request->hasFile('image')) {
        if ($sparePart->image) {
            // Delete old image
            Storage::disk('public')->delete($sparePart->image);
        }
        $imagePath = $request->file('image')->store('images/spare_parts', 'public');
    }

    $sparePart->update([
        'part_name' => $request->part_name,
        'amount' => $request->amount,
        'brand' => $request->brand,
        'model' => $request->model,
        'color' => $request->color,
        'price' => $request->price,
        'year' => $request->year,
        'type_spare' => $request->type_spare,
        'image' => $imagePath,
        
    ]);

    return redirect()->route('spare_parts.index')->with('success', 'Spare part updated successfully!');
}
public function destroy($id)
    {
        try {
            // หาอะไหล่ที่ต้องการลบโดยใช้ ID
            $sparePart = SparePart::findOrFail($id);

            // ลบรูปภาพถ้ามี
            if ($sparePart->image) {
                $imagePath = public_path('storage/' . $sparePart->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // ลบอะไหล่ออกจากฐานข้อมูล
            $sparePart->delete();

            // คืนค่า redirect พร้อมกับข้อความสำเร็จ
            return redirect()->route('spare_parts.index')->with('success', 'ลบข้อมูลอะไหล่สำเร็จแล้ว');
        } catch (\Exception $e) {
            // คืนค่า redirect พร้อมกับข้อความแสดงข้อผิดพลาด
            return redirect()->route('spare_parts.index')->with('error', 'เกิดข้อผิดพลาดในการลบข้อมูล');
        }
    }
   public function homep()
{
    $spareParts = SparePart::all();
    return view('homep', compact('spareParts'));
}

}