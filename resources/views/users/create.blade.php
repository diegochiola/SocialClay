@extends('layout/template')

@section('name','Users | SocialClay')

@section('content')

<body style="background-color: rgb(200, 174, 255); color: #2e4a19">
<main style="display: flex; justify-content: center; align-items: center;">
<div class="container py-4 text-8xl" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h2>New User</h2>
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
	
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 row">
                <label for="name" class="col-sm-10 col-form-label"> Name:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="surname" class="col-sm-10 col-form-label">Surnmame:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="surname" id="surname" value="{{old('surname')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date_of_birth" class="col-sm-10 col-form-label">Date of birth:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-10 col-form-label">Email:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="passwrod" class="col-sm-10 col-form-label">Password:</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-10 col-form-label" for="password_confirmation">Confirm Password:</label>
                <div class="col-sm-5">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone_number" class="col-sm-10 col-form-label">Phone Number:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{old('phone_number')}}" required>
                </div>
            </div>
            <!-- Select Role-->
            <div class="mb-3 row">
                <label for="role" class="col-sm-10 col-form-label">Role:</label>
                <div class="col-sm-5">
                    <select class="form-select" name="role" id="role" required>
                        <option value="">Select a Role:</option>
                        <option value="artist">Artist</option>
                        <option value="enthusiast">Enthusiast</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="location" class="col-sm-10 col-form-label">Location:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="location" id="location" value="{{old('location')}}" required>
                </div>
            </div>

            <div class="mb-3 row" style="padding-bottom: 20px;">
                <label for="photo" class="col-sm-10 col-form-label">Photo:</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
                </div>   
            </div>
            <button type="submit" class="btn rounded-pill " style="background-color:#d0f779; color:#2e4a19;">Submit</button>
        </form>
    </div>

</body>


@endsection
