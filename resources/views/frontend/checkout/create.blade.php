@extends('frontend.layouts.app')
@section('content')

	<section id="cart_items">
		<div class="container">
			

			<div class="register-req">
				<p>Please Fillup this form</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{ route('shipping.create') }}" method="POST">
                                    @csrf
									
									<input type="text" name="f_name" value="{{old('f_name')}}" placeholder="First Name *" required >
									<input type="text" name="l_name" value="{{old('l_name')}}" placeholder="Last Name *" required>
									<input type="email" name="email" value="{{old('email')}}" placeholder="example@gmail.com" required>
									<input type="text" name="phone"  value="{{old('phone')}}" placeholder="01XXXXXXXXXX" required>
									<input type="text" name="address" value="{{old('address')}}" placeholder="Address *" required>
									<input type="text" name="city" value="{{old('city')}}" placeholder="City *" required>
                                    <button class="btn btn-info" >Submit</button>
								</form>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

		



@endsection