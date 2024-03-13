@extends('layout/template')

@section('title', 'Participate in Ceramic Challenge')

@section('content')

<body style="background-color: #A6957E; color: #d0f779;">
    <div class="container" style="font-family: Clearface-Serial-Light-RegularItalic;">
        <h1 class="mt-5 mb-4 text-center">Participate in a Ceramic Challenge</h1>
        <div class="card" style="background-color: #d0f779">
            <div class="card-body">
                @if ($ceramicChallenge)
                    <h4 class="card-title">Ceramic Challenge: {{ $ceramicChallenge->title }}</h4>
                    <p class="card-text">Description: {{ $ceramicChallenge->description }}</p>
                    <p class="card-text">Start Date: {{ $ceramicChallenge->start_date }}</p>
                    <p class="card-text">End Date: {{ $ceramicChallenge->end_date }}</p>
                   
                    <form action="{{ route('challengeParticipation.store', $ceramicChallenge->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-5">
                        <label for="user_id" style="margin-bottom:5px">Select your User name:</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="">Select User:</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Select user artwork id -->
                    <div clas="mb-3 row">
                        <label for="ceramic_artwork_id" class="col-sm-2 col-form-label">Select Artwork:</label>
                        <div class="col-sm-5">
                            <select class="form-select" name="ceramic_artwork_id" id="ceramic_artwork_id" required>
                                <option value="">Select a Ceramic Artwork:</option>
                                @foreach($ceramicArtworks as $artwork)
                                    <option value="{{ $artwork->id }}">{{ $artwork->title }}</option>
                                @endforeach
                            </select>            
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill" style="background-color: #C8AEFF; margin-top:10px">Participate</button>
                </form>
                @else
                    <div class="container py-4 text-center" style="font-family: Clearface-Serial-Light-RegularItalic;">
                        <h2>No challenges created yet.</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection
