@extends('layouts.admin')

@section('content')
@include('partials.errors')
 <div class="row">
        <div class="col-md-6">
        	<form action="#" method="post" enctype="multipart/form-data">
        		
        		<div class="form-group">
                    <label for="sectionfood">Section:</label>
                    <select class="form-control" id="sectionfood" name="sectionfood">
					  <option selected value="0">Open this select menu</option>
					  @foreach($sections as $section)
					  <option value="{{$section->id}}">{{$section->name}}</option>
					  @endforeach
					</select>
                </div>
        		<div class="form-group">
                    <label for="namefood">Name:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="namefood" 
                        name="namefood">
                    
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="description" 
                        name="description">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        id="price" 
                        name="price">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <label class="custom-file">
					  <input type="file" name="image" id="image" required="true">
					  <span class="custom-file-control"></span>
					</label>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
        	</form>
       	</div>
</div>

@endsection