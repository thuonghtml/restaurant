@extends('layouts.admin')

@section('content')
@if(Session::has('info'))
<div class="row">
	<div class="col-md-12">
		<p class="alert alert-info">{{Session::get('info')}}</p>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<a href="{{route('adminfood.create')}}" class="btn btn-primary a-btn-slide-text">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			<span><strong>Add</strong></span>            
		</a>
	</div>
</div>
<hr>
<table class="table table-responsive">
	<thead>
		<tr>
			<th class="table-image">Image</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Section</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($foods as $item)
		<tr>
			<td class="table-image"><img src="{{ asset('img/' . $item->image_url) }}" alt="food" class="img-responsive cart-image"></td>
			<td>{{ $item->namefood }}</a></td>
			<td>{{ $item->description}}</td>
			<td>{{ $item->price}} VNĐ</td>
			<td>{{ $item->section->name}}</td>
			<td>
				<a href="{{ route('adminfood.edit', ['id' => $item->id]) }}" class="btn btn-primary a-btn-slide-text">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					<span><strong>Edit</strong></span></a>
			</td>
			<td>
				<a href="{{route('adminfood.delete', ['id' => $item->id]) }}" class="btn  btn-danger a-btn-slide-text">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					<span><strong>Delete</strong></span></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection