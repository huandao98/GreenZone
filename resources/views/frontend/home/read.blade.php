@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<?php 
	//muốn sử dụng class Cart ở đây thì phải import nó
	use App\ShoppingCart\Cart;
?>
<!-- main begin -->
<main class="mainContainer-theme">
    <!-- home slider -->
    <div id="home-slider">
        <div id="homepage-slider" class="fade">
            <div>
                <div class="item">
                    <div class="slide-img">
                        <a href="#">
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ asset('frontend/images/slider_3.jpg') }}">
                                <source media="(min-width: 768px)" srcset="{{ asset('frontend/images/slider_3.jpg') }}">
                                <img src="{{ asset('frontend/images/slider_3.jpg') }}">
                            </picture>
                        </a>
                    </div>
                    <div class="content-slide">
                        <div class="container-fluid">
                            <div class="slide-btn-content">
                                <!-- <h2>Trái cây nhiệt đới tươi</h2>
                                <p>Cung cấp các biến đổi sân sau rắc rối với các giải pháp nghệ thuật.</p> -->
                                <div class="button-content-box">
                                    <a class="button-shop" href="#">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="item">
                    <div class="slide-img">
                        <a href="#">
                            <picture>
                                <source media="(max-width: 767px)" srcset="{{ asset('frontend/images/slider_4.jpg') }}">
                                <source media="(min-width: 768px)" srcset="{{ asset('frontend/images/slider_4.jpg') }}">
                                <img width="auto" src="{{ asset('frontend/images/slider_4.jpg') }}">
                            </picture>
                        </a>
                    </div>
                    <div class="content-slide">
                        <div class="container-fluid">
                            <div class="slide-btn-content">
                                <!-- <h2>Trái cây Oganic</h2>
                                <p>Cung cấp các biến đổi sân sau rắc rối với các giải pháp nghệ thuật.</p> -->
                                <div class="button-content-box">
                                    <a class="button-shop" href="#">Xem ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav"></div>
        <div class="dots"></div>
    </div>


                <!-- banner home -->
    <section id="section-banner-home" class="section section-banner">
        <div class="container-fluid">
            <div class="banner-home-outer">
                <div class="rowFlexMargin">
                    <div class="box-service col-md-4 col-xs-12">
                        <div class="icon-title fade-box">
                            <img class=" lazyloaded" src="{{ asset('frontend/images/iphone.svg') }}"> 
                        </div>
                        <div class="box-info">
                            <h3>Điện thoại</h3>
                            <p class="content">Điện thoại di động dường như là một phần không thể thiếu trong cuộc sống hiện đại ngày nay.</p>	
                        </div>
                    </div>
                    <div class="box-service col-md-4 col-xs-12">
                        <div class="icon-title fade-box">
                            <img class=" lazyloaded" src="{{ asset('frontend/images/macbook.svg') }}"> 
                        </div>
                        <div class="box-info">
                            <h3>Laptop</h3>
                            <p class="content">Laptop được rất nhiều người dùng yêu thích và chọn lựa để đáp ứng nhu cầu như giải trí, học tập và làm việc.</p>	
                        </div>
                    </div>
                    <div class="box-service col-md-4 col-xs-12">
                        <div class="icon-title fade-box">
                            <img class=" lazyloaded" src="{{ asset('frontend/images/airpods_max.svg') }}"> 
                        </div>
                        <div class="box-info">
                            <h3>Phụ kiện</h3>
                            <p class="content">Phụ kiện công nghệ đáp ứng những nhu cầu ngày càng cao về trải nghiệm của những khách hàng.</p>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


                <!-- collection home -->
    <section id="section-collection-home" class="section section-collection">
        <div class="wrapper-heading-home text-center">
            <div class="container-fluid">
                <div class="groupTitle-home">
                    <h2><a href="#"> Sản phẩm HOT </a></h2>
                    <p>Cập nhật những sản phẩm HOT nhất</p>
                </div>
            </div>
        </div>
        <div class="wrapper-collection-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-product-list clearfix">
                        @foreach($hot_products as $row)
                        <div class="col-md-3 col-sm-4 col-xs-6 pro-loop col-20">
                            <div class="product-block product-resize fixheight">
                                <div class="product-img">
                                    <a href="{{ url('products/detail/'.$row->id) }}" class="image-resize fade-box lazyloaded">
                                        <picture>
                                            <img class="img-loop mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/products/'.$row->photo) }}" width="240px" height="220px">
                                        </picture>
                                    </a>
                                    <div class="productQuickView">
                                    <a class="btnProductQuickview" href="{{ url('cart/buy/'.$row->id) }}" title="Thêm vào giỏ hàng"></a>
                                    </div>
                                </div>
                                <div class="product-detail clearfix">
                                    <div class="box-pro-detail">
                                        <h3 class="pro-name">
                                            <a href="{{ url('products/detail/'.$row->id) }}">{{ $row->name }}</a>
                                        </h3>
                                        <div class="box-pro-prices">
                                            <p class="pro-price highlight">
                                                <span>{{ number_format($row->price - ($row->price * $row->discount)/100)  }}₫</span>
                                                <span class="pro-price-del">
                                                    <del class="compare-price">{{ number_format($row->price) }}₫</del>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


                <!-- banner about home -->
    <section id="section-banner-about-home" class="section section-banner-about">
        <div class="banner-background-img lazyloaded">
            <div class="container-fluid">
                <div class="content-banner-info">
                    <p class="subtitle-top">Green zone</p>
                    <h3 class="top-title">Mùa lễ hội đã đến rồi đây</h3>
                    <p class="subtitle-bottom">Điều tuyệt vời đang chờ bạn</p>
                    <div class="box-button">
                        <a href="#" class="button-bn">Khám phá</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


                <!-- collection info -->


                <!-- collection category -->
    @foreach($categories as $row_category)
    <section id="section-collection-sales" class="section section-collection-sales">
        <div class="wrapper-heading-home text-center">
            <div class="container-fluid">
                <div class="groupTitle-home">
                    <h2><a href="#">{{ $row_category->name }}</a></h2>
                    <p>Ưu đãi lên tới 10%</p>
                </div>
            </div>
        </div>
        <div class="wrapper-collection-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="content-product-list clearfix">
                        @php
                            $products = DB::table("products")->where("category_id","=",$row_category->id)->orderBy("id","desc")->offset(0)->take(5)->get();
                        @endphp
                        @foreach($products as $row)
                        <div class="col-md-3 col-sm-4 col-xs-6 pro-loop col-20">
                            <div class="product-block product-resize fixheight">
                                <div class="product-img">
                                    <a href="{{ url('products/detail/'.$row->id) }}" class="image-resize fade-box lazyloaded">
                                        <picture>
                                            <img class="img-loop mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/products/'.$row->photo) }}" width="240px" height="220px">
                                        </picture>
                                    </a>
                                    <div class="productQuickView">
                                    <a class="btnProductQuickview" href="{{ url('cart/buy/'.$row->id) }}" title="Thêm vào giỏ hàng"></a>
                                    </div>
                                </div>
                                <div class="product-detail clearfix">
                                    <div class="box-pro-detail">
                                        <h3 class="pro-name">
                                            <a href="{{ url('products/detail/'.$row->id) }}">{{ $row->name }}</a>
                                        </h3>
                                        <div class="box-pro-prices">
                                            <p class="pro-price highlight">
                                                <span>{{ number_format($row->price - ($row->price * $row->discount)/100)  }}₫</span>
                                                <span class="pro-price-del">
                                                    <del class="compare-price">{{ number_format($row->price) }}₫</del>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach


                <!-- blog -->
    <section id="section-blog" class="section section-blog">
        <div class="wrapper-heading-home text-center">
            <div class="container-fluid">
                <div class="groupTitle-home">
                    <h2><a href="#">Tin tức</a></h2>
                    <p>Cập nhật tin tức mới nhất!</p>
                </div>
            </div>
        </div>
        <div class="wrapper-content-home">
            <div class="container-fluid">
                <div class="row" id="blog-slide">
                    @foreach($news as $row)
                    <div class="col-md-4 item-blog no-pd">
                        <div class="velaBlogItem ">
                            <div class="blogPostImage">
                                <a href="{{ url('news/detail/'.$row->id) }}" class="fade-box lazyloaded">
                                    <picture>
                                        <img class="img-responsive mediabox-img lazyautosizes ls-is-cached lazyloaded" src="{{ asset('upload/news/'.$row->photo) }}" height="248px" width="398px">
                                    </picture>
                                </a>
                            </div>
                            <div class="blogPostContent">
                                <h3 class="blogPostTitle">
                                    <a href="{{ url('news/detail/'.$row->id) }}">{{ $row->name }}</a>
                                </h3>
                                <div class="blogPostShortdesc rte mb20">
                                    {!! $row->description !!}
                                </div>
                            </div>
                            <a href="{{ url('news/detail/'.$row->id) }}" class="btnBlogReadMore">Xem thêm</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main end -->
@endsection