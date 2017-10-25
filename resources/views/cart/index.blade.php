@extends('layouts.master')

@section('content')
<div class="container">
	<p><h1>Your Cart</h1></p>
	<hr>
	@include('partials.message')
	@if(Cart::content()->count()>0)
	<table class="table table-responsive">
		<thead>
			<tr>
				<th class="table-image">Image</th>
				<th>Food</th>
				<th>Quantity</th>
				<th>Price</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach (Cart::content() as $item)
			<tr>
				<td class="table-image"><img src="{{ asset('img/' . $item->image_url) }}" alt="food" class="img-responsive cart-image"></a></td>
				<td>{{ $item->name }}</a></td>
				<td>
					<select class="quantity" data-id="{{ $item->rowId }}">
						<option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
						<option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
						<option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
						<option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
						<option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
					</select>
				</td>
				<td>{{ $item->subtotal }} VNĐ</td>
				<td class=""></td>
				<td>
					<form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
						{!! csrf_field() !!}
						<input type="hidden" name="_method" value="DELETE">
						<input type="submit" class="btn btn-danger btn-sm" value="Remove">
					</form>
				</td>
			</tr>

			@endforeach
			<tr>
				<td class="table-image"></td>
				<td></td>
				<td class="small-caps table-bg" style="text-align: right">Subtotal</td>
				<td>{{ Cart::instance('default')->subtotal() }} VNĐ</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="table-image"></td>
				<td></td>
				<td class="small-caps table-bg" style="text-align: right">Tax</td>
				<td>{{ Cart::instance('default')->tax() }} VNĐ</td>
				<td></td>
				<td></td>
			</tr>

			<tr class="border-bottom">
				<td class="table-image"></td>
				<td style="padding: 40px;"></td>
				<td class="small-caps table-bg" style="text-align: right">Your Total</td>
				<td class="table-bg">{{ Cart::total() }} VNĐ</td>
				<td class="column-spacer"></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<a href="{{route('home')}}" class="btn btn-primary btn-lg">Countinue Shopping</a>&nbsp;
	<a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a> &nbsp;
	<div style="float:right">
		<form action="{{ url('/emptyCart') }}" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="DELETE">
			<input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
		</form>
	</div>
	@else
	<h3>You have no items in your shopping cart</h3>
	<a href="{{route('home')}}" class="btn btn-primary btn-lg">Continute Shopping</a>
	@endif
	
</div>
@endsection
@section('extra-js')
    <script>
        (function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                  type: "PATCH",
                  url: '{{ url("/cart") }}' + '/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/cart') }}';
                  }
                });
            });
        })();
    </script>
@endsection