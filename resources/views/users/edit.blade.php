@extends('layout/template')
@section('name', 'Edit User | SocialClay')  


@section ('content') 

<body style="background-color: rgb(200, 174, 255); color: #2e4a19">

    <div class="container py-4" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h2 class="text mb-4">Edit User</h2>
        @if($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row justify-content-center">
                <form action="{{ url('users/' . $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="name" class="col-form-label"> Name:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                    </div>
                </div>

                <div clas="mb-3 row">
                    <label for="surname" class="col-sm-10 col-form-label">Surname:</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="surname" id="surname" value="{{ $user->surname }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date_of_birth" class="col-sm-10 col-form-label">Date of birth:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}" required>
                    </div>
                </div>
                
                <div clas="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div clas="mb-3 row">
                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" required>
                    </div>
                </div>
                <div clas="mb-3 row">
                    <label class="col-sm-2 col-form-label" for="password_confirmation">Confirm Password:</label>
                    <div class="col-sm-5">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div clas="mb-3 row">
                    <label for="phone_number" class="col-sm-2 col-form-label">Phone Number:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="role" class="col-sm-10 col-form-label">Role:</label>
                    <div class="col-sm-5">
                        <select class="form-select" name="role" id="role" required>
                            <option value="">Select a Role:</option>
                            <option value="artist" {{ $user->role == 'artist' ? 'selected' : '' }}>artist</option>
                            <option value="enthusiast" {{ $user->role == 'enthusiast' ? 'selected' : '' }}>enthusiast</option>
                            <option value="administrator" {{ $user->role == 'administrator' ? 'selected' : '' }}>administrator</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="location" class="col-sm-10 col-form-label">Location:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="location" id="location" value="{{ $user->location }}" required>
                    </div>
                </div>
                <!-- Campo imposible de editar la foto
                <div class="mb-3 row">
                    <label for="photo" class="col-sm-10 col-form-label">Photo:</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                    </div>
                </div>
                -->

                <div clas="mb-3 row">
            <button type="submit" class="btn btn-success rounded-pill" style="background-color: #d0f779; color: #2e4a19;">Submit</button>
        </div>
            
                </form>
            </div>

    </div>
@endsection