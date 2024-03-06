@extends('layout/template')

@section('title','Ceramic Artworks | SocialClay')

@section('content')


<body style="background-color: #FCEC91; ">
    <div class="container">
        <h1 class="mt-5 mb-4">Ceramic Artworks</h1>
        <div class="row">
            @foreach ($artworks as $artwork)
            <div class="col-md-4 mb-4">
                <div class="card">
                <img src="{{ asset($artwork->photo) }}" class="card-img-top" alt="Artwork Photo">
                    <div class="card-body">
                        <h5 class="card-title">Title: {{ $artwork->title }}</h5>
                        <p class="card-text">Description: {{ $artwork->description }}</p>
                        <p class="card-text"><small class="text-muted">Created by: {{ $artwork->created_by }}</small></p>
                        <div class="btn-group" role="group" aria-label="Artwork Actions">
                            <a href="{{ route('ceramicArtworks.edit', $artwork->id) }}" class="btn btn-primary rounded-pill">Edit</a>
                            <form action="{{ route('ceramicArtworks.destroy', $artwork->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                            </form>
                        </div> 

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection