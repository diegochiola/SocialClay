@extends('layout/template')

@section('title', 'SocialClay')

@section('content') 

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
<body  style="background-color: #2e4a19; color: #d0f779;">
<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div class="text-8xl" style="font-family: Clearface-Serial-Light-RegularItalic;">
      <h2 class="text-center mb-10 font-bold"> Welcome to our Clay community</h2>
        <h4 class="text-center mb-10 font-bold">Find people like you</h4>
        <h6 class="text-center mb-10 font-bold">Become a member of the biggest ceramic community. </h6>
        <div class="d-flex justify-content-center">
          <a href="{{ url('/users') }}" class="btn btn-success btn-lg rounded-pill" style="background-color: #d0f779; color: #2e4a19;">Join our community</a>
        </div>
    </div>
    <div class="w-50 ml-auto d-none d-md-block">
    <img src="{{ asset('images/home.png') }}" alt="home image" class="mx-auto max-w-full h-auto">
    </div>
</main>
</body>


@endsection
