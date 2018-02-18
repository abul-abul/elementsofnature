@extends('app-users')
@section('users-content')

        <div class="payment_place">
            <div class="payment">
                <div>
                    @include('message')
                    {!! Form::open(['action' => ['PaymentController@postPayment'],'files' => 'true' ]) !!}
                    <input type="hidden" value="{{$id}}" name="p">
                    {!! Form::text('firstname', null, ['placeholder' => 'FIRST NAME *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('lastname', null, ['placeholder' => 'LAST NAME *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('email', null, ['placeholder' => 'EMAIL ADDRESS *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('phone', null, ['placeholder' => 'PHONE *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('country', null, ['placeholder' => 'COUNTRY *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('address', null, ['placeholder' => 'ADDRESS *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('city_town', null, ['placeholder' => 'TOWN / CITY *' , 'class' => 'pay_inp']) !!}
                    {!! Form::text('postalcode', null, ['placeholder' => 'POSTCODE / ZIP *' , 'class' => 'pay_inp']) !!}
                    <label class="pay_text_title">Additional Information</label>
                    {!! Form::textarea('info', null, ['placeholder' => 'ORDER NOTES' , 'class' => 'pay_text']) !!}

                </div>
                {{--<p class="error_text">error</p>--}}
            </div>
        </div>
        <!-- payment place -->

        <!-- order place -->
        <div class="order_place">
            <div class="order">
                <h2 class="order_title">Your order</h2>
                <div class="order_total_place">
                    <div class="order_header">
                        <div class="order_product">
                            <span class="or_product_title">Product</span>
                        </div>
                        <div class="total">
                            <span class="total_title">total</span>
                        </div>
                    </div>
                    <div class="order_product_text_place">
                        <div class="order_product_text_rows">
                            @if(isset($workshop_session))
                                <div class="text_rows_left">
                                    <p class="order_text">
                                        <b>Produc Name</b>
                                    </p>
                                    <p class="order_text">
                                        {{$workshops->title}}
                                    </p>
                                    <p class="order_text">
                                        <b>Frame Location</b>
                                    </p>
                                    <p class="order_text">
                                        {{$workshops->location}}
                                    </p>

                                </div>

                                <div class="many">
                                    {{$price}} USD
                                </div>
                            @else
                            <div class="text_rows_left">
                                <p class="order_text">
                                    <b>SIZE</b>
                                </p>
                                <p class="order_text">
                                   {{$size}}
                                </p>
                                <p class="order_text">
                                    <b>Frame Type</b>
                                </p>
                                <p class="order_text">
                                    {{$frame}}
                                </p>

                            </div>

                            <div class="many">
                                {{$price}} USD
                            </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="order_pay_place">

                    <div class="pay_child_rel">
                        <div class="pay_child">
                            <input type="radio" name="pay_checkbox" class="pay_radio" />
                            <h3 class="pay_title">paypal</h3>
                        </div>

                    </div>

                    <div class="place_order">
                        <button type="submit" class="place_order_btn">place order</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    <!-- order place -->

    <!-- footer place -->
    <footer class="category_footer">
        <img src="/assets/users/plugins/images/pay_footer.jpg" class="footer_img" />
        <h1 class="big_title_place_footer">
            Bringing images of Nature from Outside your Windows and into your home
        </h1>
        <div class="category_footer_footer2">
            <div class="cfooter_menu_place">


            </div>
            <div class="footer_partners_place2">
					<span class="f_partners_place_center">
                        @foreach($partners as $partner)
						<span class="partners_link_place">

                            <a href="{{$partner->link}}">
                                <img src="/assets/partners-images/{{$partner->images}}" class="bg_partners_logo" alt="" />
                            </a>
						</span>
						@endforeach
					</span>
                <div class="footer_rb_logo_place2">
                    <span class="made_by_white">made by</span>
                    <a href="http://rbpartners.co/" target="_blank">
                        <img src="/assets/users/plugins/images/r_b_logo.png" class="rblogo" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer place -->

    <!-- back to top btn -->
    <div class="back_to_top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>
@endsection