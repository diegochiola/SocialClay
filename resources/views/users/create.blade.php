@extends('layout/template')

@section('name','Users | SocialClay')

@section('content')

 <!-- nav bar -->
 <nav class="navbar navbar-expand-lg" style="background-color: #d0f779; color: #2e4a19;">
    <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/home')}}">
            <img src="{{ asset('images/SocialClay_logo.png') }}" alt="Logo" width="auto" height="26" class="d-inline-block align-text-top">
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <!-- button join our community -->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/users')}}">Join our community</a>
            </li>
            <!-- button add ceramicArtwork-->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/ceramicArtworks/create')}}">Add Ceramic Artwork</a>
            </li>
            <!-- Be part of our challenges-->
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/challenges')}}">Join our challenges</a>
            </li>
            </ul>
        </div>
    </div>
    </nav>

<body style="background-color: rgb(200, 174, 255); color: #2e4a19;">
<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">


<div class="container py-4">
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
	
        <form action="{{url('ceramicArtworks')}}" method="post">
            @csrf
            password	phone_number	role	location	photo
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"> Name:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required>
                </div>
            </div>
            <div clas="mb-3 row">
                <label for="surname" class="col-sm-2 col-form-label">Surnmame:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="surname" id="surname" value="{{old('surname')}}" required>
                </div>
            </div>
            <div clas="mb-3 row">
                <label for="date_of_birth" class="col-sm-2 col-form-label">Date of birth:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}" required>
                </div>
            </div>
            <div clas="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                </div>
            </div>
            div clas="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                </div>
            </div>
            div clas="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                </div>
            </div>
            <div clas="mb-3 row">
                <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
                <div class="col-sm-5">
                    <input type="photo" class="form-control" name="photo" id="photo" value="{{old('photo')}}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</main>








</main>
</body>


@endsection
