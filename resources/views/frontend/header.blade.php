<?php
	//muốn sử dụng class Cart ở đây thì phải import nó
	use App\ShoppingCart\Cart;
?>
<!-- header begin -->
<div class="main-header-height">
    <header class="main-header main-header-template-01">
        <div class="top-bar top-bar-template-header-01">
            <div class="container-fluid">
                <div class="wraper-top-bar">
                    <p>Miễn phí vận chuyển với đơn hàng trên 300k</p>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container-fluid">
                <div class="flexContainer flexAlignCenter rowFlexMargin">
                    <div class="header-menu site-menu-mobile">
                        <div id="site-menu-handle" class="site-menu hamburger-menu">
                            <span class="bar"></span>
                        </div>
                        <div class="menu-mobile">
                            <span class="box-triangle">
                                <svg viewBox="0 0 20 9">
                                    <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                </svg>
                            </span>
                            <div class="site-nav-container">
                                <div class="menu-mobile-content">
                                    <div id="mp-menu" class="mp-menu mp-cover">
                                        <div class="mp-level">
                                            <div class="mplus-menu"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-logo header-mid">
                        <div class="wrap-logo">
                            <h1>
                                <a href="{{ url('') }}">GreenZone</a>
                            </h1>
                        </div>
                    </div>
                    <div class="header-menu site-menu-desktop">
                        <div class="nav-main-menu">
                            <nav class="main-nav text-center">
                                <ul class="level0 clearfix">
                                    <li class="nav1 has-sub level0">
                                        <a href="{{ url('') }}">Trang chủ <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu level1">
                                            <li class="nav2"><a href="#">Kiểu hiển thị header 1</a></li>
                                            <li class="nav2"><a href="#">Kiểu hiển thị header 2</a></li>
                                            <li class="nav2"><a href="#">Kiểu hiển thị header 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav1 has-sub level0">
                                        <a href="{{ url('products/category/all') }}">Sản phẩm <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu level1">
                                            @php
                                                $categories = DB::table("categories")->where("parent_id","=","0")->orderBy("id","desc")->get();
                                            @endphp
                                            @foreach($categories as $row)
                                            <li class="nav2">
                                                <a href="{{ url('products/category/'.$row->id) }}">{{ $row->name }}
                                                    <!-- <i class="fa fa-chevron-right"></i> -->
                                                </a>
                                                <ul class="sub-menu level2">
                                                    @php
                                                        $categories_sub = DB::table("categories")->where("parent_id","=",$row->id)->orderBy("id","desc")->get();
                                                    @endphp
                                                    @foreach($categories_sub as $row_sub)
                                                    <li><a href="{{ url('products/category/'.$row_sub->id) }}">{{ $row_sub->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav1 has-sub level0">
                                        <a href="#">Product view <i class="fa fa-chevron-down"></i></a>
                                        <ul class="sub-menu level1">
                                            <li class="nav2"><a href="#">Product-style-1</a></li>
                                            <li class="nav2"><a href="#">Product-style-2</a></li>
                                            <li class="nav2"><a href="#">Product-style-3</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav1"><a href="#">Blog</a></li>
                                    <li class="nav1"><a href="#">Giới thiệu</a></li>
                                    <li class="nav1"><a href="#">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-wrap-icon">
                        <!-- Search site nav -->
                        <div class="search header--icon">
                            <a href="javascript:;" class="link-box header-site-nav" id="site-nav-search">
                                <span class="icon-box"><i class="fa-solid fa-magnifying-glass fa-xl"></i></span>
                            </a>
                            <div class="wpo-wrapper-search wpo-wrapper-search-dk site--nav">
								<span class="box-triangle">
									<svg viewBox="0 0 20 9">
										<path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
									</svg>
								</span>
								<div class="site-nav-container">
									<p class="titlebox">Tìm kiếm</p>
                                    <div class="search-product-nav">
										<form class="search-product ultimate-search">
											<input required="" onkeyup="search();" value="" id="key" maxlength="40" class="search-product-input" type="text" placeholder="Tìm kiếm sản phẩm...">
											<button type="button" class="btn-search-product" onclick="location.href='{{ url('products/search-name') }}?key='+document.getElementById('key').value;">
												<svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve"><path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path><rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect></svg>
											</button>
										</form>
										<div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none;">
											<div class="Content">
                                                {{-- <div class="item-ult">
                                                    <div class="title">
                                                        <a title="Lê Mỹ siêu ngọt" href="/products/le-my-sieu-ngot">Lê Mỹ siêu ngọt</a>
                                                        <p class="f-initial">40,000₫
                                                        </p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/le-my-sieu-ngot" title="Lê Mỹ siêu ngọt">
                                                            <img alt="Lê Mỹ siêu ngọt" src="//product.hstatic.net/1000406611/product/le_d56856bfa93d49c2a4d9c7868ba40fbe_thumb.jpg">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="Thanh Long ruột đỏ" href="/products/thanh-long-ruot-do">Thanh Long ruột đỏ</a>
                                                        <p class="f-initial">40,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/thanh-long-ruot-do" title="Thanh Long ruột đỏ">
                                                            <img alt="Thanh Long ruột đỏ" src="//product.hstatic.net/1000406611/product/thanglong2_04c8440fbedb4bfeb90545c11183c9fe_thumb.jpg">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="Măng Cụt Thái Lan 1Kg" href="/products/mang-cut-thai-lan-1kg">Măng Cụt Thái Lan 1Kg</a>
                                                        <p class="f-initial">65,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/mang-cut-thai-lan-1kg" title="Măng Cụt Thái Lan 1Kg">
                                                            <img alt="Măng Cụt Thái Lan 1Kg" src="//product.hstatic.net/1000406611/product/mangcut2_ba77d916c5734a12b29e7fe9967721e7_thumb.jpg">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="Dưa Bở thơm Thái Lan" href="/products/dua-bo-thom-thai-lan">Dưa Bở thơm Thái Lan</a>
                                                        <p class="f-initial">90,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/dua-bo-thom-thai-lan" title="Dưa Bở thơm Thái Lan">
                                                            <img alt="Dưa Bở thơm Thái Lan" src="//product.hstatic.net/1000406611/product/duabo_9e093bdba9094c0d8a9ccdf50894d8a7_thumb.jpg">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-ult">
                                                    <div class="title">
                                                        <a title="Xoài Cát Hoài Lộc 1kg" href="/products/xoai-cat-hoai-loc-1kg">Xoài Cát Hoài Lộc 1kg</a>
                                                        <p class="f-initial">70,000₫</p>
                                                    </div>
                                                    <div class="thumbs">
                                                        <a href="/products/xoai-cat-hoai-loc-1kg" title="Xoài Cát Hoài Lộc 1kg">
                                                            <img alt="Xoài Cát Hoài Lộc 1kg" src="//product.hstatic.net/1000406611/product/xoai2_d174312a43bb49b9aaaa7a5a16829635_thumb.jpg">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="resultsMore">
                                                    <a href="/search?type=product&amp;q=l">Xem thêm 5 sản phẩm</a>
                                                </div> --}}
                                            </div>
										</div>
									</div>
                                    <script type="text/javascript">
                                        function search() {
                                            var key = document.getElementById("key").value;
                                            if (key != "") {
                                                $("#ajaxSearchResults").attr("style", "display: block");
                                                $.get("{{ url('products/search-ajax') }}?key="+key, function (result) {
                                                    $("#ajaxSearchResults .Content").empty();
                                                    $("#ajaxSearchResults .Content").append(result);
                                                });
                                            } else {
                                                $("#ajaxSearchResults").attr("style", "display: none");
                                            }
                                        }
                                    </script>
								</div>
							</div>
                        </div>

                        <!-- Account site nav -->
                        <div class="account header--icon">
                            <a href="javascript:;" class="link-box header-site-nav" id="site-nav-account">
                                <span class="icon-box"><i class="fa-regular fa-user fa-xl"></i></span>
                            </a>
                            @php
                                $customer_email = session()->get('customer_email');
                                $customer_name = session()->get('customer_name');
                                //có thể dùng cách khác: $customer_name = Sesion::get('customer_email');
                            @endphp
                            @if(isset($customer_email))
                            <div class="site--nav site_account site-account--info">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site_account_panel_list">
                                    <div class="site_account_info">
                                        <div class="site_account_header">
                                            <h2>Thông tin tài khoản</h2>
                                        </div>
                                        <ul>
                                            <li><span>{{ $customer_name }}</span></li>
                                            <li><a href="">Tài khoản của tôi</a></li>
                                            <li><a href="">Danh sách địa chỉ</a></li>
                                            <li><a href="{{ url('customers/logout') }}">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="site--nav site_account ">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site_account_panel_list">
                                    <div id="header-login-panel" class="site_account_panel site_account_default is-selected">
                                        <div class="site-nav-container">
                                            <form action="{{ url('customers/login-post') }}" method="post">
                                                @csrf
                                                <div class="site_account_header">
                                                    <h2 class="site_account_title heading">Đăng nhập tài khoản</h2>
                                                    <p class="site_account_legend">Nhập email và mật khẩu của bạn:</p>
                                                </div>
                                                <div class="form__input-wrapper form__input-wrapper--labelled">
                                                    <input type="email" id="email" class="form__field form__field--text is-filled" name="email" required="required">
                                                    <label for="email" class="form__floating-label">Email</label>
                                                </div>
                                                <div class="form__input-wrapper form__input-wrapper--labelled">
                                                    <input type="password" id="password" class="form__field form__field--text is-filled" name="password" required="required">
                                                    <label for="password" class="form__floating-label">Mật khẩu</label>
                                                </div>
                                                <button type="submit" class="form__submit button dark">Đăng nhập</button>
                                            </form>
                                            <div class="site_account_secondary-action">
                                                <p>Khách hàng mới?
                                                    <a href="{{ url('customers/register') }}" class="link">Tạo tài khoản</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Mini Cart site nav -->
                        <div class="cart header--icon">
                            <a href="javascript:;" class="link-box header-site-nav" id="site-nav-cart">
                                <span class="icon-box icon-cart cart-menu">
                                    <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                    <span class="count-holder"><span class="count">{{ Cart::cartNumber() }}</span></span>
                                </span>
                            </a>
                            <div class="site--nav site_cart">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site-nav-container">
                                    <p class="titlebox">Giỏ hàng</p>
                                    <div class="cart-view clearfix">
                                        <div class="cart-scroll">
                                            <table id="cart-view">
                                                <tbody>
                                                    @if(Cart::cartNumber() > 0)
                                                    @foreach(Session::get('cart') as $item)
                                                    <tr class="list-item">
                                                        <td class="img">
                                                            <a href="{{ url('products/detail/'.$item['id']) }}">
                                                                <img alt="{{ $item['name'] }}" src="{{ asset('upload/products/'.$item['photo']) }}" title="{{ $item['name'] }}">
                                                            </a>
                                                        </td>
                                                        <td class="item">
                                                            <a class="pro-title-view" href="{{ url('products/detail/'.$item['id']) }}">{{ $item['name'] }}</a>
                                                            <span class="variant"></span>
                                                            <span class="pro-quantity-view">{{ $item['quantity'] }}</span>
                                                            <span class="pro-price-view">{{ number_format($item['price'] - ($item['price'] * $item['discount'])/100) }}₫</span>
                                                            <span class="remove_link remove-cart"><a href="{{ url('cart/remove/'.$item['id']) }}"><i class="fa fa-times"></i></a></span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td class="mini_cart_header">
                                                            <svg width="81" height="70" viewBox="0 0 81 70">
                                                                <g transform="translate(0 2)" stroke-width="4" stroke="#2A7D2E" fill="none" fill-rule="evenodd">
                                                                    <circle stroke-linecap="square" cx="34" cy="60" r="6"></circle>
                                                                    <circle stroke-linecap="square" cx="67" cy="60" r="6"></circle>
                                                                    <path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path>
                                                                </g>
                                                            </svg>
                                                            <p>Hiện chưa có sản phẩm</p>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <span class="line"></span>
                                        <table class="table-total">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">TỔNG TIỀN:</td>
                                                    @if(Cart::cartNumber() > 0)
                                                    <td class="text-right" id="total-view-cart">100,000₫</td>
                                                    @else
                                                    <td class="text-right" id="total-view-cart">0₫</td>
                                                    @endif

                                                </tr>
                                                <tr>
                                                    <td><a href="{{ url('cart') }}" class="linktocart button dark">Xem giỏ hàng</a></td>
                                                    @if(Cart::cartNumber() > 0)
                                                    <td><a href="{{ url('cart/bill') }}" class="linktocheckout button drakpay">Thanh toán</a></td>
                                                    @else
                                                    <td><a href="javascript:;" class="linktocheckout button drakpay">Thanh toán</a></td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- header end -->

<!-- search bar mobile -->
<div class="search-bar-mobile">
    <div class="search-box">
        <form class="searchform">
            <input type="text" class="searchinput" size="20" placeholder="Tìm kiếm sản phẩm...">
            <button type="submit" class="btn-search btn">
                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                    <path d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z"></path>
                    <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)" width="4" height="8"></rect>
                </svg>
            </button>
        </form>
    </div>
</div>
<!-- search bar mobile end -->
