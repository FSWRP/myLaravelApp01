@extends('layout')

@section('title', 'เพิ่มข้อมูลอะไหล่')

@section('content')

    <body>
        <div class="container mt-5">
            <h1>เพิ่มข้อมูลอะไหล่</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('spare_parts.store') }}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">อัปโหลดรูปภาพ</label>
                    <input type="file" name="image" id="image" class="form-control">


                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="part_name" class="form-label">ชื่ออะไหล่</label>
                        <input type="text" name="part_name" id="part_name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="amount" class="form-label">จำนวน</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="brand" class="form-label">ยี่ห้อ</label>
                        <input type="text" name="brand" id="brand" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="model" class="form-label">รุ่น</label>
                        <input type="text" name="model" id="model" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="color" class="form-label">สี</label>
                        <input type="text" name="color" id="color" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">ราคา</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="year" class="form-label">ปี</label>
                        <input type="number" name="year" id="year" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="type_spare" class="form-label">ประเภทอะไหล่</label>
                        <select name="type_spare" id="type_spare" class="form-control" required>
                            <option value="">-- กรุณาเลือกประเภทอะไหล่ --</option>
                            <option value="อะไหล่เครื่องยนต์">อะไหล่เครื่องยนต์</option>
                            <option value="อะไหล่ช่วงล่าง">อะไหล่ช่วงล่าง</option>
                            <option value="อะไหล่ตัวถัง">อะไหล่ตัวถัง</option>
                        </select>
                    </div>
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                    <a href="{{ url('/home') }}" role="button" class="btn btn-danger">ย้อนกลับ</a>
                </div>
            </form>
        </div>
    @endsection
