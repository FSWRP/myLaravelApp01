@extends('layout')

@section('title', 'ดูข้อมูลอะไหล่')

@section('content')
    <div class="container mt-5">
        <h1>ข้อมูลอะไหล่</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ชื่ออะไหล่</th>
                    <th>จำนวน</th>
                    <th>ยี่ห้อ</th>
                    <th>รุ่น</th>
                    <th>สี</th>
                    <th>ราคา</th>
                    <th>ปี</th>
                    <th>ประเภทอะไหล่</th>
                    <th>รูปภาพ</th>
                    <th>แก้ไขข้อมูลอะไหล่</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($spareParts as $sparePart)
                    <tr>
                        <td>{{ $sparePart->part_name }}</td>
                        <td>{{ $sparePart->amount }}</td>
                        <td>{{ $sparePart->brand }}</td>
                        <td>{{ $sparePart->model }}</td>
                        <td>{{ $sparePart->color }}</td>
                        <td>{{ number_format($sparePart->price, 2) }}</td>
                        <td>{{ $sparePart->year }}</td>
                        <td>{{ $sparePart->type_spare }}</td>
                        <td>
                            @if ($sparePart->image)
                                <img src="{{ asset('storage/' . $sparePart->image) }}" alt="{{ $sparePart->part_name }}"
                                    style="width: 100px; height: auto;">
                            @else
                                ไม่มีรูปภาพ
                            @endif
                        </td>
                        
                        <td>
                            <form action="{{ route('spare_parts.destroy', $sparePart->part_id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('คุณแน่ใจว่าต้องการลบข้อมูลนี้หรือไม่?')">ลบข้อมูล</button>
                            </form>
                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="9">ไม่มีข้อมูลอะไหล่</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mb-2">
            <a href="{{ url('/home') }}" role="button" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
    </div>
@endsection
