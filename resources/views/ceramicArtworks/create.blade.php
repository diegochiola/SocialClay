@extends('layout/template')
@section('title', 'CeramicArtwork | SocialClay')  


@section ('content') 

<body style="background-color: #FCEC91; color: #C8AEFF;">
 <!-- nav bar -->
 <nav class="navbar navbar-expand-lg" style="background-color: #C8AEFF; color: #2e4a19;">
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

<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="container py-4">
        <h2>New CeramicArtwork</h2>
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
            <div class="mb-3 row">
                <label for="title" class="col-form-label"> Title:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" required>
                </div>
            </div>
            <div clas="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ceramic_technique" class="col-sm-10 col-form-label">Ceramic Technique:</label>
                <div class="col-sm-5">
                    <select class="form-select" name="ceramic_technique" id="ceramic_technique" required>
                        <option value="">Select a technique</option>
                        <option value="Handbuilding">Handbuilding</option>
                        <option value="Wheel_throwing">Wheel throwing</option>
                        <option value="Slab_building">Slab building</option>
                        <option value="Coiling">Coiling</option>
                        
                    </select>
                </div>
            </div>
            <!-- Creation Date -->
            <div class="mb-3 row">
                <label for="creation_date" class="col-sm-10 col-form-label">Creation Date:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="creation_date" id="creation_date" value="{{old('creation_date')}}" required>
                </div>
            </div>
            <script>
                $(function() {
                    $("#creation_date").datepicker();
                });
            </script>

            <div clas="mb-3 row">
                <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
                </div>
                
            </div>
            <div clas="mb-3 row">
                <button type="submit" class="btn btn-success" style="background-color: #C8AEFF;">Submit</button>
            </div>
        </form>
    </div>
</main>
