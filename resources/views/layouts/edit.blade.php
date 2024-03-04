

<body style="background: #000000;">

@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="color: white">Edit User</h3>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                {{-- <input type="text" name="level" value="{{ $user->level }}" class="form-control"> --}}
                <select name="level" id="level" class="form-control">
                    <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->level == 'user' ? 'selected' : '' }}>User</option>
                    <!-- Add other options as needed -->
                </select>
            </div>

            <button type="submit" class="btn btn-pink" style="--bs-btn-bg: #e75e8d;color: white;margin-top: 15px">Update</button>
        </form>

    </div>
@endsection

<style>
    .form-group {
        margin-top: 15px
    }

    label {
        color: hotpink;
    }

    .btn-pink {
    background-color: #ff69b4; /* Pink color code */
    color: #fff; /* Text color */
    border-color: #ff69b4; /* Border color */
}

    .btn-pink:hover {
    background-color: #ff1493; /* Lighter pink color code on hover */
    border-color: #ff1493; /* Border color on hover */
}
</style>

</body>


