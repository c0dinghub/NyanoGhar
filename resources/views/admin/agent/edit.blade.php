@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.agent.index') }}" class="btn btn-secondary shadow">Back to Agents</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Agent Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('agents.update', $agent->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $agent->name }}" required>
                    <div class="invalid-feedback">Please enter the agent's name.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $agent->email }}" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $agent->phone }}">
                </div>
                <button type="submit" class="btn btn-success shadow">Update Agent</button>
            </form>
        </div>
    </div>
</div>
@endsection
