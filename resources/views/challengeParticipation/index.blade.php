@extends('layout/template')

@section('title','Challenge Participation | SocialClay')

@section('content')
<body style="background-color: #A6957E; color: #d0f779;">
    <div class="container py-4" style="font-family: Clearface-Serial-Light-RegularItalic;">
            <h2>Challenges Participation:</h2>
            <ul class="list-group" >
                @foreach($challenges as $challenge)
                    <li class="list-group-item" style="background-color: #d0f779">
                        <div class="row">
                            <div class="col-md-1">
                                <img src="{{ asset('images/challenge_participation.png') }}" alt="base img" style="margin-bottom: 10px;">
                                
                                </div>
                            <div class="col-md-6">
                                <h4>Title: {{ $challenge->title }}</h4>
                                <h5>Participants:</h5>
                                <ul>
                                    @foreach($challenge->users as $user)
                                        <li>{{ $user->name }}</li>
                                        <ul>
                                            @foreach($user->ceramicArtworksForChallenge($challenge->id) as $artwork)
                                                <li>Artwork title: {{ $artwork->title }}</li>
                                                <img src="data:image/jpeg;base64,{{ base64_encode($artwork->photo) }}" alt="Artwork Photo" >
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection