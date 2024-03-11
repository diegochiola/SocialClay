@extends('layout/template')
@section('title', 'Add CeramicArtwork | SocialClay')  

@section ('content') 
<body style="background-color: #2e4a19; color: #d0f779;">

<div class="container py-4" style="font-family: Clearface-Serial-Light-RegularItalic;">
    <h2>New Ceramic Artwork</h2>
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
	
    <form  action="{{url('ceramicArtworks')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

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
            <label for="created_by" class="col-sm-2 col-form-label">Created by:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="created_by" id="created_by" value="{{old('created_by')}}" required>
            </div>
        </div>
        <div clas="mb-3 row" style="padding-bottom: 20px;">
            <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="photo" id="photo" accept="image/*" required>
            </div>
        </div>
        <div clas="mb-3 row">
            <button type="submit" class="btn btn-success rounded-pill" style="background-color: #C8AEFF;">Submit</button>
        </div>
       <!--
        <div class="col-md-3">
            <div>
                <img src="{{ asset('images/newCeramicartwork.png') }}" alt="newCeramicArtwork img" class="img-fluid">
            </div>
            </div>
        --> 
    </form>
</div>
@endsection
