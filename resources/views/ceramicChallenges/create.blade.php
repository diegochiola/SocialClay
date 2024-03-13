@extends('layout/template')
@section('title', 'Add CeramicArtwork | SocialClay')  

@section ('content') 
<body style="background-color: #A6957E; color: #d0f779;">

<div class="container py-4" style="font-family: Clearface-Serial-Light-RegularItalic;">
    <h2>New Ceramic Challenge</h2>
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
	
    <form  action="{{url('ceramicChallenges')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="mb-3 row">
            <label for="title" class="col-sm-10 col-form-label"> Title:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-sm-10 col-form-label">Description:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}" required>
            </div>
        </div>
        <!-- start Date -->
        <div class="mb-3 row">
            <label for="start_date" class="col-sm-10 col-form-label">Start Date:</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date')}}" required>
            </div>
        </div>
        <script>
            $(function() {
                $("#start_date").datepicker();
            });
        </script>
        <!-- End Date -->
        <div class="mb-3 row">
                    <label for="end_date" class="col-sm-10 col-form-label">End Date:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{old('end_date')}}" required>
                    </div>
                </div>
                <script>
                    $(function() {
                        $("#end_date").datepicker();
                    });
                </script>

        
        <div clas="mb-3 row">
            <button type="submit" class="btn rounded-pill " style="background-color:#d0f779; color:#2e4a19;">Submit</button>
        </div>
      
    </form>
</div>
@endsection
