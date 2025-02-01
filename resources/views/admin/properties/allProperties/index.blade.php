@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid py-4 px-8">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('admin.allProperties.index') }}">All Properties</a>
                </li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title font-semibold">All Properties</h5>
                <div class="card-tools">
                    <a href="{{route('admin.pages.addProperty')}}" class="btn btn-primary">Add New Property</a>
                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>S.No.</th>
                                <th>ID</th>
                                <th>Property Photo</th>
                                <th>Property Title</th>
                                <th>Purpose</th>
                                <th>Agent</th>
                                <th>Build Year</th>
                                <th>Property Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allProperties as $property)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $property->id ?? 'N/A' }}</td>
                                    <td>
                                        <img src="{{ $property->property_photo ?? 'path/to/default-image.jpg' }}"
                                             alt="Property Photo" class="img-thumbnail" style="width: 150px; height: 90px;">
                                    </td>
                                    <td>{{ $property->property_title ?? 'N/A' }}</td>
                                    {{-- <td>{{ $property->status ? ucwords(str_replace('_', ' ', $property->status)) : 'N/A' }}</td> --}}
                                    <td>{{ $property->status=='for_sale'?"For Sale":"For Rent"}}</td>
                                    <td>{{ $property->agent ? $property->agent->name : 'Not Assigned' }}</td>
                                    <td>{{ $property->build_year ?? 'N/A' }} {{ strtoupper($property->year_type ?? 'N/A') }}</td>
                                    <td>{{$property->property_status?? 'N/A'}}  </td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route('admin.pages.propertyDetail', ['id' => $property->id]) }}" class="btn btn-primary btn-sm" title="View Property">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.pages.editProperty', ['id' => $property->id]) }}" class="btn btn-success btn-sm" title="Edit Property">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.allProperties.destroy', ['id' => $property->id]) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Property" onclick="return confirm('Are you sure you want to delete this property?');">
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
                    {{ $allProperties->links('vendor.pagination.bootstrap-5') }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
