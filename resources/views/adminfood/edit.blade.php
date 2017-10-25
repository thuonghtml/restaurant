@extends('layouts.admin')

@section('content')
@include('partials.errors')
 <div class="row">
        <div class="col-md-6">
        	<form action="{{route('adminfood.update')}}" method="post" enctype="multipart/form-data">
        		
        		<div class="form-group">
                    <label for="sectionfood">Section:</label>
                    <select class="form-control" id="sectionfood" name="sectionfood">
					  <option selected value="0">Open this select menu</option>
					  @foreach($sections as $section)
					  <option value="{{$section->id}}"{{ $section->id == $food->section_id ? 'selected' : '' }}>{{$section->name}}</option>
					  @endforeach
					</select>
                </div>
        		<div class="form-group">
                    <label for="namefood">Name:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="namefood" 
                        name="namefood"
                        value="{{$food->name}}">
                    
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="description" 
                        name="description"
                        value="{{$food->description}}">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        id="price" 
                        name="price"
                        value="{{$food->price}}">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <label class="custom-file">
					  <input type="file" name="image" id="image">
					  <span class="custom-file-control"></span>
					</label>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $foodId }}">
                <button type="submit" class="btn btn-primary">Submit</button>
        	</form>
       	</div>
        <div class="col-md-6">
            <h2>Food Image: {{$food->image_url}}</h2>
            <img src="{{ asset('img/' . $food->image_url) }}" alt="food" class="img-responsive cart-image">
        </div>
</div>

@endsection