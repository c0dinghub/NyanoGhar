@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid py-4 px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('admin.allUsers.index') }}">All Users</a>
                </li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title font-semibold">All Users</h5>
                <div class="card-tools">
                    {{-- <a href="{{ route('admin.pages.addUser') }}" class="btn btn-primary">Add New User</a> --}}
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No.</th>
                                <th>ID</th>
                                <th>Profile Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allUsers as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->id ?? 'N/A' }}</td>
                                    <td>
                                        <img src="{{ $user->photo ?? 'N/A' }}"
                                             alt="Profile Photo" class="img-thumbnail object-cover" style="width: 120px; height: 90px;">
                                    </td>
                                    <td>{{ $user->name ?? 'N/A' }}</td>
                                    <td>{{ $user->email ?? 'N/A' }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    {{-- <td>{{ ucwords(str_replace('_', ' ', $user->role ?? 'N/A')) }}</td> --}}
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('admin.allUsers.show', ['id' => $user->id]) }}" class="btn btn-primary btn-sm" title="View User">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('admin.allUsers.destroy', ['id' => $user->id]) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                {{-- <div class="mt-4 d-flex justify-content-center">
                    {{ $allUsers->links('vendor.pagination.bootstrap-5') }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
