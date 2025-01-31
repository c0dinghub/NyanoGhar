@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('agents.create') }}" class="btn btn-primary shadow">+ Add Agent</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Agent List</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agents as $agent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $agent->name }}</td>
                            <td>{{ $agent->email }}</td>
                            <td>{{ $agent->phone ?? 'N/A' }}</td>
                            <td class="text-center">
                                <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-sm btn-warning shadow-sm me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No agents found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if ($agents->isNotEmpty())
        {{-- <div class="card-footer d-flex justify-content-center">
            {{ $agents->links('pagination::bootstrap-4') }}
        </div> --}}
        @endif
    </div>
</div>
@endsection
