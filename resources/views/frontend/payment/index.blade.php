

	
@extends('frontend.layouts.app')
@section('content')
	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@php
							$total_price=0;
							
						@endphp
						@foreach ($cart_view as $product)
							<tr>
								<td class="cart_product">
									<a href=""><img src="{{asset($product->image)}}" alt="" style="height: 60px; width:60px;"></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{ $product->product_title }}</a></h4>
									<p>Web ID: 1089772</p>
								</td>
								<td class="cart_price">
									<p>{{ $product->price }} ৳</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="quantity" value="{{ $product->quantity }}" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<?php $total_price = $total_price+$product->price; ?>
								<td class="cart_total">
									<p class="cart_total_price">{{ $total_price }} ৳</p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="{{ route('product.destroy',$product->id) }}"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
	
@endsection