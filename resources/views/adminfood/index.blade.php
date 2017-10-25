@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<a href="#" class="btn btn-primary a-btn-slide-text">
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
				<td class="table-image"><img src="{{ asset('img/' . $item->image_url) }}" alt="food" class="img-responsive cart-image"></a></td>
				<td>{{ $item->namefood }}</a></td>
				<td>{{ $item->description}}</td>
				<td>{{ $item->price}} VNĐ</td>
				<td>{{ $item->section->name}}</td>
				<td><a href="#" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
        <span><strong>Edit</strong></span>            
    </a></td>
				<td>
					<form action="#" method="POST" class="side-by-side">
						{!! csrf_field() !!}
						<input type="hidden" name="_method" value="DELETE">
						<input type="submit" class="btn btn-danger a-btn-slide-text" value="Remove">
					</form>
				</td>
			</tr>

			@endforeach
			
		</tbody>
	</table>
@endsection