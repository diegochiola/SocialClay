@extends('layout/template')

@section('title', 'Confirmation Message')

@section('content')
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
        <h2>Validation message</h2>
        <div class="text-center text-gray-500 mb-4">
            <p>{{ $msg }}</p>
        </div>
    </div>
</main>
@endsection