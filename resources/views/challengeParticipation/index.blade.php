@extends('layout/template')

@section('title','Challenge Participation | SocialClay')

@section('content')
<body style="background-color: #A6957E; color: #d0f779;">
    <div class="container py-4" style="font-family: Clearface-Serial-Light-RegularItalic;">
            <h2>Challenges Participation:</h2>
            <ul class="list-group" >
                @foreach($challenges as $challenge)
                    <li class="list-group-item" style="background-color: #d0f779">
                        <h4>Title: {{ $challenge->title }}</h4>
                        <h5>Participants:</h5>
                        <ul>
                            @foreach($challenge->users as $user)
                                <li>{{ $user->name }}</li>
                                <ul>
                                    @foreach($user->ceramicArtworks as $artwork)
                                        <li>{{ $artwork->title }}</li>
                                        <!-- Aquí puedes mostrar más información sobre la pieza de cerámica si lo deseas -->
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@endsection