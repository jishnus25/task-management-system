@extends('layouts.admin-header')
@extends('layouts.admin-nav')
@extends('layouts.admin-footer')

@section('admin-content')
<div class="container">
    <h2 class="my-4">Admin List</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->created_at->format('Y-m-d H:i') }}</td>
                
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.admin-footer')
