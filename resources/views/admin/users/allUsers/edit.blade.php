@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit User Role</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit User Role</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="agent" {{ $user->role == 'agent' ? 'selected' : '' }}>Agent</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
