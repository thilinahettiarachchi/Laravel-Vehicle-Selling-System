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
    Edit post: {{ $post->title }}
    </div>

<div class="panel-body">
    <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>
        
        <div class="form-group">
            <label for="model_year">Model Year</label>
            <input type="number" name="model_year" class="form-control" value="{{ $post->model_year }}">
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ $post->price }}">
        </div>
        
        <div class="form-group">
            <label for="featured">Featured image</label>
            <input type="file" name="featured" class="form-control">
        </div>
        
        <div class="form-group">
        <label for="conditon">Condition</label>
            <div class="radio">
                <label><input type="radio" name="condition" value="new" {{ $post->condition == 'new' ? 'checked' : '' }}>New</label>
                <label><input type="radio" name="condition" value="used" {{ $post->condition == 'used' ? 'checked' : '' }}>Used</label>
                <label><input type="radio" name="condition" value="reconditioned" {{ $post->condition == 'reconditioned' ? 'checked' : '' }}>Reconditioned</label>
            </div>
        </div>
        
        <div class="form-group">
        <label for="transmission">Transmission</label>
            <div class="radio">
                <label><input type="radio" name="transmission" value="manual" {{ $post->transmission == 'manual' ? 'checked' : '' }}>Manual</label>
                <label><input type="radio" name="transmission" value="automatic" {{ $post->transmission == 'automatic' ? 'checked' : '' }}>Automatic</label>
                <label><input type="radio" name="transmission" value="triptonic" {{ $post->transmission == 'triptonic' ? 'checked' : '' }}>Triptonic</label>
                <label><input type="radio" name="transmission" value="other" {{ $post->transmission == 'other' ? 'checked' : '' }}>Other transmission</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control" value="{{ $post->mileage }}">
        </div>
        
        <div class="form-group">
        <label for="fuel">Fuel Type</label>
            <div class="radio">
                <label><input type="radio" name="fuel" value="petrol" {{ $post->fuel == 'petrol' ? 'checked' : '' }}>Petrol</label>
                <label><input type="radio" name="fuel" value="diesel" {{ $post->fuel == 'diesel' ? 'checked' : '' }}>Diesel</label>
                <label><input type="radio" name="fuel" value="cng" {{ $post->fuel == 'cng' ? 'checked' : '' }}>CNG</label>
                <label><input type="radio" name="fuel" value="other" {{ $post->fuel == 'other' ? 'checked' : '' }}>Other fuel</label>
            </div>
        </div>
        
        <div class="form-group">
            <label for="category">Select a Category</label>
            <select name="category_id" id="category" class="form-control">
                
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                        
                @if($post->category->id == $category->id)
                    selected
                @endif
                
                >{{ $category->name }}</option>
                @endforeach
                
            </select>
        </div>
        
        <div class="form-group">
        <label for="tags">Select tags</label>
        @foreach($tags as $tag)
            <div class="checkbox">
                <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                              
                              @foreach($post->tags as $t)
                              @if($tag->id == $t->id)
                                checked
                                @endif
                              @endforeach
                              
                              >{{ $tag->tag }}</label>
            </div>
        @endforeach
        </div>
        
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ $post->content }}</textarea>
         </div>
        
        <div class="form-group">
            <div class="text-center">
                <button class="btn btn-success" type="submit">
                    Update post
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