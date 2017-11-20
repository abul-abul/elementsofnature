@extends('app-users')
@section('users-content')

    <form accept="" method="post">
        <div class="payment_place">
            <div class="payment">
                <div>
                    <input type="text" name="name" class="pay_inp" placeholder="FIRST NAME *" />
                    <input type="text" name="name" class="pay_inp" placeholder="LAST NAME *" />
                    <input type="text" name="email" class="pay_inp" placeholder="EMAIL ADDRESS *" />
                    <input type="text" name="phone" class="pay_inp" placeholder="PHONE *" />
                    <input type="text" name="contry" class="pay_inp" placeholder="COUNTRY *" />
                    <input type="text" name="address" class="pay_inp" placeholder="ADDRESS *" />
                    <input type="text" name="town_city" class="pay_inp" placeholder="TOWN / CITY *" />
                    <input type="text" name="zip_code" class="pay_inp" placeholder="POSTCODE / ZIP *" />
                    <label class="pay_text_title">Additional Information</label>
                    <textarea class="pay_text" name="pay_text" placeholder="ORDER NOTES"></textarea>
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
                        </div>

                    </div>
                </div>
                <div class="order_pay_place">
                    <div class="pay_child_rel">
                        <div class="pay_child">
                            <input type="radio" name="pay_btn" class="pay_radio" />
                            <h3 class="pay_title">cash on delivery</h3>
                        </div>
                        <div class="pay_child_abs">
                            <p class="pay_child_text">
                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.Make your payment directly into our bank account. Please use your Order ID as the
                            </p>
                        </div>
                    </div>
                    <div class="pay_child_rel">
                        <div class="pay_child">
                            <input type="radio" name="pay_btn" class="pay_radio" />
                            <h3 class="pay_title">direct bank transfer</h3>
                        </div>
                        <div class="pay_child_abs">
                            <p class="pay_child_text">
                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.Make your payment directly into our bank account. Please use your Order ID as the
                            </p>
                        </div>
                    </div>
                    <div class="pay_child_rel">
                        <div class="pay_child">
                            <input type="radio" name="pay_btn" class="pay_radio" />
                            <h3 class="pay_title">paypal</h3>
                        </div>
                        <div class="pay_child_abs">
                            <p class="pay_child_text">
                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.Make your payment directly into our bank account. Please use your Order ID as the
                            </p>
                        </div>
                    </div>
                    <div class="pay_child_rel">
                        <div class="pay_child">
                            <input type="radio" name="pay_btn" class="pay_radio" />
                            <h3 class="pay_title">send request</h3>
                        </div>
                        <div class="pay_child_abs">
                            <p class="pay_child_text">
                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.Make your payment directly into our bank account. Please use your Order ID as the
                            </p>
                        </div>
                    </div>
                    <div class="place_order">
                        <button type="submit" class="place_order_btn">place order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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