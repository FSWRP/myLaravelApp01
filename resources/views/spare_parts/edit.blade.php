@extends('layout')

@section('title', 'แก้ไขข้อมูลอะไหล่')

@section('content')
    <div class="container mt-5">
        <h1>แก้ไขข้อมูลอะไหล่</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('spare_parts.update', $sparePart->part_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="image" class="form-label">อัปโหลดรูปภาพ</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($sparePart->image)
                    <img src="{{ asset('storage/' . $sparePart->image) }}" alt="{{ $sparePart->part_name }}"
                        style="width: 100px; height: auto; margin-top: 10px;">
                @endif
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="part_name" class="form-label">ชื่ออะไหล่</label>
                    <input type="text" name="part_name" id="part_name" class="form-control"
                        value="{{ old('part_name', $sparePart->part_name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="amount" class="form-label">จำนวน</label>
                    <input type="number" name="amount" id="amount" class="form-control"
                        value="{{ old('amount', $sparePart->amount) }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="brand" class="form-label">ยี่ห้อ</label>
                    <input type="text" name="brand" id="brand" class="form-control"
                        value="{{ old('brand', $sparePart->brand) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="model" class="form-label">รุ่น</label>
                    <input type="text" name="model" id="model" class="form-control"
                        value="{{ old('model', $sparePart->model) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="color" class="form-label">สี</label>
                    <input type="text" name="color" id="color" class="form-control"
                        value="{{ old('color', $sparePart->color) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">ราคา</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control"
                        value="{{ old('price', $sparePart->price) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="year" class="form-label">ปี</label>
                    <input type="number" name="year" id="year" class="form-control"
                        value="{{ old('year', $sparePart->year) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="type_spare" class="form-label">ประเภทอะไหล่</label>
                    <select name="type_spare" id="type_spare" class="form-control" required>
                        <option value="">-- กรุณาเลือกประเภทอะไหล่ --</option>
                        <option value="อะไหล่เครื่องยนต์"
                            {{ old('type_spare', $sparePart->type_spare) == 'อะไหล่เครื่องยนต์' ? 'selected' : '' }}>
                            อะไหล่เครื่องยนต์</option>
                        <option value="อะไหล่ช่วงล่าง"
                            {{ old('type_spare', $sparePart->type_spare) == 'อะไหล่ช่วงล่าง' ? 'selected' : '' }}>
                            อะไหล่ช่วงล่าง</option>
                        <option value="อะไหล่ตัวถัง"
                            {{ old('type_spare', $sparePart->type_spare) == 'อะไหล่ตัวถัง' ? 'selected' : '' }}>
                            อะไหล่ตัวถัง</option>
                    </select>
                </div>
            </div>

            <div class="mb-2">
                <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                <a href="{{ url('/spare_parts') }}" role="button" class="btn btn-danger">ย้อนกลับ</a>
            </div>
        </form>

        <!-- ฟอร์มสำหรับลบข้อมูล -->
        <form action="{{ route('spare_parts.destroy', $sparePart->part_id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้หรือไม่?')">ลบข้อมูล</button>
        </form>
    </div>
@endsection
