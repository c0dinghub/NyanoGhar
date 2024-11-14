@extends('admin.layouts.app')
@section('content')
<div class="py-6 px-8">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.allUsers.index') }}">All Users</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.allUsers.show', ['id' => $user->id]) }}">User Profile</a>
            </li>
        </ol>
    </nav>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 ml-10 p-4">
    <div>
        <label class="block text-lg font-medium text-black">Full Name:</label>
        <p class="mt-1 text-gray-700">{{ $user->name ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Email:</label>
        <p class="mt-1 text-gray-700">{{ $user->email ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Phone:</label>
        <p class="mt-1 text-gray-700">{{ $user->phone ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Date of Birth:</label>
        <p class="mt-1 text-gray-700">{{ $user->date_of_birth ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Address:</label>
        <p class="mt-1 text-gray-700">{{ $user->address ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Profile Photo:</label>
        @if ($user->photo)
            <img src="{{ $user->photo }}" alt="Current Profile Photo"
                 class="rounded-lg shadow-md w-32 h-32 object-contain mt-2">
        @else
            <p class="mt-1 text-gray-700">No photo available</p>
        @endif
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Facebook URL:</label>
        <p class="mt-1 text-gray-700">{{ $user->facebook_url ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Instagram URL:</label>
        <p class="mt-1 text-gray-700">{{ $user->instagram_url ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">WhatsApp:</label>
        <p class="mt-1 text-gray-700">{{ $user->whatsapp ?? 'N/A' }}</p>
    </div>

    <div>
        <label class="block text-lg font-medium text-black">Twitter URL:</label>
        <p class="mt-1 text-gray-700">{{ $user->twitter_url ?? 'N/A' }}</p>
    </div>
</div>

@endsection
