@extends('layout/template')

@section('title','Ceramic Artworks | SocialClay')

@section('content')




<body style="background-color: #FCEC91; color: #d0f779;">
<main style="height: 80vh; display: flex; justify-content: center; align-items: center;">
<div class="row">
    @foreach ($artworks as $artwork)
            <div class="col-md-4 mb-4">
                <div class="card mb-3">
                    <img src="{{ $artwork->photo }}" class="card-img-top" alt="Artwork Photo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artwork->title }}</h5>
                        <p class="card-text">{{ $artwork->description }}</p>
                        <p class="card-text"><small class="text-muted">Created by: {{ $artwork->created_by }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</main>
</body>


@endsection