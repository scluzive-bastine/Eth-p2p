@extends('app')
<style>
    .custom-card {
        height: 190px;
    }
    .httCARD {
        background: linear-gradient(180deg, #014F86 0%, #455A64 100%);
        border-radius: 20px!important;
    }
    /* .httCARD img {
        widows: 233.41px;
        height: 184.77px;
    } */
    .owl-item {
        width: 300px!important;
        margin: 25px!important;
        /* height: 200px!important; */
    }
    .owl-item.active.center {
        width: 400px!important;
        height: 100%!important;
    }
    .owl-item.active.center .httCARD{
        width: 400px!important;
        height: 400px!important;
    }
    /* .owl-item.active {
        margin-right: 10px!important;
    } */
    .owl-carousel .owl-stage {
        display: flex;
        align-items: baseline;
    }
    .item {
        display: none;
    }
    .owl-nav .owl-prev {
        position: absolute;
        top: 80%!important;
        left: -25px;
        right: -1.5em;
        margin-top: -1.65em;
    }
    .owl-nav .owl-next {
        position: absolute;
        top: 80%!important;
        right: -25px;
        margin-top: -1.65em;
    }
    .item h3 {
        color: black;
        -webkit-text-fill-color: #a9d6e500;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #000;
        font-size: 41px !important;
    }
    @media (max-width: 599px) {
        .owl-item.active.center {
            width: 319px!important;
            height: 100%!important;
        }
        .owl-item.active.center .httCARD{
            width: auto!important;
            height: 400px!important;
        }
    }
    .referral-section {
        background: url('/img/referral-bg.svg');
        height: 550px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover 
    }
    .start-trading {
        background: url('/img/start-trading-bg.svg');
        height: 550px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
    }
    .header-one {

    }
    .header-two {
        right: 0;
        top: 200px;
    }
</style>
@section('content')
    <div class="header-one d-none d-xl-block position-absolute" style="z-index: -1;">
        <img src="{{asset('/img/header-bg-1.svg')}}" alt="">
    </div>
    <div class="container">
        <div class="inner-body pt-lg-5 pt-5 mt-5">
            <div class="text-center pt-lg-5 pt-5 mt-lg-5">
                <h6>WE KNOW BUYING AND SELLING IS NOT EASY</h6>
                <h1 class="header-h1" data-aos="zoom-in" data-aos-duration="1000">
                    The best market place for your crypto buying and selling
                </h1>
                <h6 class="mt-3">We’ve got everything you need 👌</h6>
                <a href="{{route('market.place')}}" class="btn btn-primary btn-lg mt-3">Market place <i class="fe fe-arrow-right"></i> </a>
            </div>
        </div>
    </div>
    <div class="header-two d-none d-xl-block position-absolute">
        <img src="{{asset('/img/header-bg-2.svg')}}" alt="">
    </div>
    {{-- Features --}}
    <section class="pt-lg-5 pt-5 mt-5" style="padding-top: 12rem!important;">
        <div class="container-fluid">
            <div class="row justify-content-center g-3">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="zoom-in">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                <div class="card-body">
                                    <h4>No Middleman</h4>
                                    <p>On "website", you exchange directly with another person, 
                                        sidestepping slow middlemen. 
                                        Most trades are over in ten minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{asset('/img/no-middleman.svg')}}" class="d-none d-xl-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="50" data-aos-duration="1000">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                <div class="card-body">
                                    <h4>Fast and Reliable</h4>
                                    <p>On "website", you exchange directly with another person, 
                                        sidestepping slow middlemen. 
                                        Most trades are over in ten minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{asset('/img/fast.svg')}}" class="d-none d-xl-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                <div class="card-body">
                                    <h4>Secured and Encrypted</h4>
                                    <p>On "website", you exchange directly with another person, 
                                        sidestepping slow middlemen. 
                                        Most trades are over in ten minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{asset('/img/secured.svg')}}" class="d-none d-xl-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="150" data-aos-duration="1000">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                <div class="card-body">
                                    <h4>Direct payment</h4>
                                    <p>On "website", you exchange directly with another person, 
                                        sidestepping slow middlemen. 
                                        Most trades are over in ten minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{asset('/img/payment.svg')}}" class="d-none d-xl-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                <div class="card-body">
                                    <h4>Easy to use</h4>
                                    <p>On "website", you exchange directly with another person, 
                                        sidestepping slow middlemen. 
                                        Most trades are over in ten minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{asset('/img/easy.svg')}}" class="d-none d-xl-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="250" data-aos-duration="1000">
                    <div class="card custom-card">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                <div class="card-body">
                                    <h4>Direct messages</h4>
                                    <p>On "website", you exchange directly with another person, 
                                        sidestepping slow middlemen. 
                                        Most trades are over in ten minutes.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{asset('/img/direct.svg')}}" class="d-none d-xl-block" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Features --}}
    {{-- coins --}}
    <section class="pt-5 pt-lg-5 mt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-down" data-aos-delay="0" data-aos-duration="1000" data-aos-easing="linear">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('/img/coins/btc.svg')}}" alt="">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h5 class="mb-0">Bitcoin</h5>
                                        <h4 class="mb-0">$44,712</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="linear">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('/img/coins/eth.svg')}}" alt="">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h5 class="mb-0">Eth</h5>
                                        <h4 class="mb-0">$3,100</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000" data-aos-easing="linear">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('/img/coins/usdt.svg')}}" alt="">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h5 class="mb-0">USDT</h5>
                                        <h4 class="mb-0">$1</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-down" data-aos-delay="150" data-aos-duration="1000" data-aos-easing="linear">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('/img/coins/dash.svg')}}" alt="">
                                    </div>
                                    <div class="text-center mt-3">
                                        <h5 class="mb-0">Dash</h5>
                                        <h4 class="mb-0">$169.75</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- how to trade --}}
    <section class="pt-5 pt-lg-5 mt-5 pb-5">
        <div class="container-fluid">
            <div class="text-center" data-aos="zoom-in" data-aos-duration="1000">
                <h6>LEARN HOW TO TRADE  IN FEW STEPS</h6>
                <h2 class="font-weight-bold">How to trade</h2>
                <div class="row justify-content-center mt-5 pt-lg-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                        <div class="owl-carousel owlImg">
                            <div class="httCARD p-4 d-flex justify-content-center align-items-center" data-hash="1">
                                <img src="{{asset('/img/wallet.svg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="httCARD p-4 d-flex justify-content-center align-items-center" data-hash="2">
                                <img src="{{asset('/img/shop.svg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="httCARD p-4 d-flex justify-content-center align-items-center" data-hash="3">
                                <img src="{{asset('/img/open-trade.svg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="httCARD p-4 d-flex justify-content-center align-items-center" data-hash="4">
                                <img src="{{asset('/img/trade.svg')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 d-flex align-items-center">
                        <div class="owl-text">
                            <div class="item text-left" data-hash="1">
                                <h3>01</h3>
                                <h2>Connect wallet</h2>
                                <p>
                                    Connect your wallet — it only takes thirty seconds.

                                    If you're technically inclined, you can choose to sign up 
                                    with an Ethereum wallet instead of a password.
                                </p>
                                <button class="btn btn-primary">Connect wallet</button>
                            </div>
                            <div class="item text-left" data-hash="2">
                                <h3>02</h3>
                                <h2>Get a trader</h2>
                                <p>
                                    Connect your wallet — it only takes thirty seconds.

                                    If you're technically inclined, you can choose to sign up 
                                    with an Ethereum wallet instead of a password.
                                </p>
                                <button class="btn btn-primary">Connect wallet</button>
                            </div>
                            <div class="item text-left" data-hash="3">
                                <h3>03</h3>
                                <h2>Open Trade</h2>
                                <p>
                                    Connect your wallet — it only takes thirty seconds.

                                    If you're technically inclined, you can choose to sign up 
                                    with an Ethereum wallet instead of a password.
                                </p>
                                <button class="btn btn-primary">Connect wallet</button>
                            </div>
                            <div class="item text-left" data-hash="4">
                                <h3>04</h3>
                                <h2>Make exchange</h2>
                                <p>
                                    Connect your wallet — it only takes thirty seconds.

                                    If you're technically inclined, you can choose to sign up 
                                    with an Ethereum wallet instead of a password.
                                </p>
                                <button class="btn btn-primary">Connect wallet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- how to trade --}}
    {{-- Referral --}}
    <div class="referral-section pb-5 mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="ref-container mt-5 pt-5" data-aos="fade-right" data-aos-duration="1000">
                        <h3>Invite your friends and receive 20% of fees on each trade.</h3>
                        <button class="btn btn-primary">Get Code</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pt-5 pb-5 mt-5">
        <div class="container">
            <div class="row justify-content-center g-2">
                <div class="col-12 col-sm-12 col-lg-5 d-flex justify-content-center align-items-center mb-2">
                    <div>
                        <h6 class="text-uppercase">We've got you covered</h6>
                        <h3>Your important questions</h3>
                        <button class="btn btn-primary">FAQ</button>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7">
                    <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" id="headingOne" role="tab">
                                <a aria-controls="collapseOne" aria-expanded="false" data-toggle="collapse" href="#collapseOne" class="collapsed d-flex justify-content-between">
                                    <div>Making a Beautiful CSS3 Button Set</div>
                                    <span><i class="fe fe-plus"></i></span>
                                </a>
                            </div>
                            <div aria-labelledby="headingOne" class="collapse" data-parent="#accordion" id="collapseOne" role="tabpanel" style="">
                                <div class="card-body">
                                    A concisely coded CSS3 button set increases usability across the board, gives you a ton of options, and keeps all the code involved to an absolute minimum. Anim pariatur cliche reprehEnderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo" role="tab">
                                <a aria-controls="collapseTwo" aria-expanded="false" class="collapsed d-flex justify-content-between" data-toggle="collapse" href="#collapseTwo">
                                    <div>Horizontal Navigation Menu Fold Animation</div>
                                    <span><i class="fe fe-plus"></i></span>
                                </a>
                            </div>
                            <div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="collapseTwo" role="tabpanel" style="">
                                <div class="card-body">
                                    Anim pariatur cliche reprehEnderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumEnda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree" role="tab">
                                <a aria-controls="collapseThree" aria-expanded="false" class="collapsed d-flex justify-content-between" data-toggle="collapse" href="#collapseThree">
                                    <div>Creating CSS3 Button with Rounded Corners</div>
                                    <span><i class="fe fe-plus"></i></span>
                                </a>
                            </div>
                            <div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="collapseThree" role="tabpanel" style="">
                                <div class="card-body">
                                    Anim pariatur cliche reprehEnderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumEnda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore.
                                </div>
                            </div><!-- collapse -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Referral --}}

    {{-- Start trading --}}
    <section class="pt-5 pb-5 mt-5 start-trading">
        <div class="container">
            <div class="inner-body pt-lg-5 pt-5 mt-5">
                <div class="text-center pt-lg-5 pt-5 mt-lg-5" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                    <h1 class="header-h1">
                        Start Trading
                    </h1>
                    <a href="{{route('market.place')}}" class="btn btn-primary btn-lg mt-3">Market place <i class="fe fe-arrow-right"></i> </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Start trading --}}


    @push('scripts')
        <script>
        jQuery(document).ready(function () {

            jQuery('.card-header').on('click', 'a', function(e) {
                // console.log(e.target);
                jQuery(this).find('i').toggleClass('fe-plus fe-minus');
            })


            jQuery(".owlImg").owlCarousel({
                loop: true,
                autoplay: false,
                slideTransition: "linear",
                // autoplaySpeed: 6000,
                smartSpeed: 1000,
                center: true,
                margin: 10,
                dots: false,
                nav: true,
                URLhashListener:true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                    },
                    600: {
                        items: 2,
                        nav: true,
                    },
                    992: {
                        items: 3,
                        nav: true,
                    },
                    1300: {
                        items: 3,
                        nav: true,
                    },
                    1500: {
                        items: 3,
                        nav: true,
                    },
                },
            });
            // $('.owl-nav').removeClass('disabled')
            var type = window.location.hash.substr(1);
            if(!type) {
                type = 1;
            }
            // display current image
            $('.httCARD[data-hash = '+type+']').parent().addClass('active center')
            // display current description matching the image
            $('.item[data-hash = '+type+']').addClass('d-block');
            jQuery('.owl-nav').on('click', 'button', function() {
                var type = window.location.hash.substr(1);
                jQuery('.item').each(function()  {
                    if($('.item[data-hash]') !== type) {
                        $(this).removeClass('d-block')
                    }
                    $('.item[data-hash = '+type+']').addClass('d-block');
                })
                // console.log(d);
            });
        });
        AOS.init();
        </script>
    @endpush
@endsection