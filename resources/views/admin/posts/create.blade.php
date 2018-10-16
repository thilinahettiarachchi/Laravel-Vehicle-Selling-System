@extends('layouts.app')


@section('content')

@if(count($errors) > 0)
<ul class="list-group">
    @foreach($errors->all() as $error)
    <li class="list-group-item text-danger">
        
        {{ $error }}
        
    </li>
    @endforeach
</ul>
@endif

<div class="panel panel-default">
    <div class="panel-heading">
    Create a new post
    </div>

<div class="panel-body">
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="model_year">Model Year</label>
            <input type="number" name="model_year" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="featured">Featured image</label>
            <input type="file" name="featured" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="category">Select a Category</label>
            <select name="category_id" id="category" class="form-control">
                
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                
            </select>
        </div>
        
        <div class="form-group">
        <label for="conditon">Condition</label>
            <div class="radio">
                <label><input type="radio" name="condition" value="new" checked>New</label>
                <label><input type="radio" name="condition" value="used">Used</label>
                <label><input type="radio" name="condition" value="reconditioned">Reconditioned</label>
            </div>
        </div>
        
        <div class="form-group">
        <label for="transmission">Transmission</label>
            <div class="radio">
                <label><input type="radio" name="transmission" value="manual" checked>Manual</label>
                <label><input type="radio" name="transmission" value="automatic">Automatic</label>
                <label><input type="radio" name="transmission" value="triptonic">Triptonic</label>
                <label><input type="radio" name="transmission" value="other">Other transmission</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control">
        </div>
        
        <div class="form-group">
        <label for="fuel">Fuel Type</label>
            <div class="radio">
                <label><input type="radio" name="fuel" value="petrol" checked>Petrol</label>
                <label><input type="radio" name="fuel" value="diesel">Diesel</label>
                <label><input type="radio" name="fuel" value="cng">CNG</label>
                <label><input type="radio" name="fuel" value="other">Other fuel</label>
            </div>
        </div>
        
        <div class="form-group">
        <label for="tags">Select tags</label>
        @foreach($tags as $tag)
            <div class="checkbox">
                <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
            </div>
        @endforeach
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
         </div>
        
        <div class="form-group">
            <div class="text-center">
                <button class="btn btn-success" type="submit">
                    Store post
                </button>
            </div>
        </div>  
        
    </form>
</div>
</div>


@stop


@section('styles')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

@stop


@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
    $(document).ready(function() {
  $('#content').summernote();
});
</script>

@stop
