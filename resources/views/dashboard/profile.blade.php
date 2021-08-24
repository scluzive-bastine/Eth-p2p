@extends('app')

<style>
    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
        margin-top: -3.5rem;
    }

    .inputfile+label {
        border-radius: 5px;
        padding: .4rem;
        width: 100%;
        text-align: center;
        cursor: pointer;
        font-size: 1.5rem
    }

    .pRIMGCONT {
        overflow: hidden;
        border-radius: 50rem;
    }
    .pRIMGCONT img {
        object-fit: cover;
        height: 89.31px;
        width: 89.31px;
    }
    .pRIMGCONT:hover .cHPROIX {
        display: block;
        background-color: #014f86b3;
    }
    .cHPROIX {
        background: #f5f5f569;
        margin-top: -3.3rem;
        z-index: 2;
        position: relative;
        display: none;
    }
</style>

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow">
                    <div class="row justify-content-center">
                        <div class="col-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                            <div class="pRIMGCONT">
                                <img src="{{asset('/img/profile/avatar-2.jpg')}}" class="img-fluid rounded-pill" alt="">
                                {{-- change profile picture if authenticated --}}
                                <div class="w-100 text-white text-center p-1 text-xl cHPROIX">
                                    <input type="file" name="image" id="file" class="inputfile image">
                                    <label class="d-flex justify-content-center" for="file"> <i
                                            class="fe fe-camera" aria-hidden="true"></i></label>
                                </div>
                                {{-- change profile picture if authenticated --}}
                            </div>
                        </div>
                        <div class="col-8 col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                            <div>
                                <h3>
                                    Jane
                                    <small  data-placement="top" data-toggle="tooltip" title="Edit username">
                                        <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#userNameModal">
                                            <i class="fe fe-edit-2"></i>
                                        </a>
                                    </small>
                                </h3>
                                <div>Reliable trader</div>
                                <div>
                                     <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.50895 0L0.928589 1.81818V4.54545C0.928589 7.06818 2.88287 9.42727 5.50895 10C8.13502 9.42727 10.0893 7.06818 10.0893 4.54545V1.81818L5.50895 0ZM4.49109 7.27273L2.45537 5.45455L3.17296 4.81364L4.49109 5.98636L7.84493 2.99091L8.56252 3.63636L4.49109 7.27273Z" fill="#009A49"/>
                                    </svg>
                                    Verified
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div>
                                <h3>Fame</h3>
                                <ul class="pl-0" style="list-style: none;">
                                    <li>100% good feedback</li>
                                    <li>Registered June 2020</li>
                                    <li>~150 Trades</li>
                                    <li>~ ₦10,000,000 volume</li>
                                    <li>
                                        <span><svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 5.00184C10.0003 4.14106 9.7784 3.29477 9.35574 2.5449C8.93308 1.79503 8.32398 1.16697 7.58742 0.721534C6.85085 0.276092 6.01176 0.0283513 5.15137 0.00229219C4.29098 -0.0237669 3.43843 0.172739 2.67626 0.572787C1.91408 0.972835 1.26809 1.56288 0.800825 2.28579C0.333556 3.00871 0.0608326 3.84002 0.0090549 4.69924C-0.0427228 5.55847 0.128199 6.41651 0.505275 7.1903C0.882351 7.9641 1.45281 8.62745 2.16143 9.11613L7.89524e-07 12.859L1.61143 12.9254L2.47429 14.2876L4.95 9.99898C4.96714 9.99898 4.98286 10.0018 5 10.0018C5.01714 10.0018 5.03286 9.9997 5.05 9.99898L7.52571 14.2876L8.40571 12.9547L10 12.859L7.83857 9.11613C8.50543 8.65698 9.05063 8.04255 9.42718 7.3258C9.80372 6.60905 10.0003 5.81148 10 5.00184ZM1.42857 5.00184C1.42857 4.29548 1.63803 3.60498 2.03047 3.01766C2.4229 2.43034 2.98068 1.97259 3.63327 1.70227C4.28587 1.43196 5.00396 1.36123 5.69675 1.49904C6.38954 1.63684 7.02591 1.97699 7.52538 2.47646C8.02485 2.97593 8.365 3.6123 8.5028 4.30509C8.64061 4.99788 8.56988 5.71597 8.29957 6.36857C8.02926 7.02116 7.5715 7.57894 6.98418 7.97138C6.39686 8.36381 5.70636 8.57327 5 8.57327C4.0528 8.57327 3.14439 8.197 2.47462 7.52722C1.80485 6.85745 1.42857 5.94904 1.42857 5.00184Z" fill="#009A49"/>
                                            <path d="M5.00003 7.14471C6.1835 7.14471 7.14289 6.18532 7.14289 5.00185C7.14289 3.81839 6.1835 2.859 5.00003 2.859C3.81657 2.859 2.85718 3.81839 2.85718 5.00185C2.85718 6.18532 3.81657 7.14471 5.00003 7.14471Z" fill="#009A49"/>
                                            </svg>
                                        </span>
                                        Trusted by 10 traders
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 d-none d-xl-block">
                            <img src="{{asset('/img/profile/profile-fame.svg')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3>Verifications</h3>
                            <div class="d-flex justify-content-between">
                                <h6>Email Address 
                                    <small data-placement="top" data-toggle="tooltip" title="Add email">
                                        <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#addEmail">
                                            <i class="fe fe-edit-2"></i>
                                        </a>
                                    </small>
                                </h6>
                                <h6>
                                    <span class="dot-label bg-success"></span>
                                    Verified
                                </h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6>Phone Number </h6>
                                <h6>
                                    <span class="dot-label bg-success"></span>
                                    Verified
                                </h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h3>
                            Blurb
                            <small data-placement="top" data-toggle="tooltip" title="Add blurb">
                                <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#blurbModal">
                                    <i class="fe fe-edit-2"></i>
                                </a>
                            </small>
                        </h3>
                        <p>
                            Be the best thing that will happen to me. Yes, You reading this!
                            Sure, your life will enjoy my partnership! Let's Crypto it!
                        </p>
                    </div>
                    <hr>
                    <div>
                        <h3>
                            Terms of trade
                            <small data-placement="top" data-toggle="tooltip" title="Add terms of trade">
                                <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#termsOfTrade">
                                    <i class="fe fe-edit-2"></i>
                                </a>
                            </small>
                        </h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                            Culpa distinctio in soluta deserunt ipsam voluptates sequi explicabo! 
                        </p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success">Trust Trader</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <div class="open__trades--container">
                    <h3 class="mt-3">Open trades</h3>
                    <div class="custom__trade--card shadow mt-4">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                <div>
                                    <div class="d-flex mb-3" style="margin-top: -2rem;">
                                        <div class="trader__req--container d-flex">
                                            <div>
                                                <svg width="20" height="20" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.2201 8.27656L7.98386 6.24336C7.87815 6.14729 7.73925 6.09605 7.59647 6.10046C7.4537 6.10487 7.31822 6.1646 7.21865 6.26702L5.90223 7.62083C5.58537 7.56032 4.94834 7.36173 4.29261 6.70765C3.63687 6.05137 3.43828 5.4127 3.37942 5.09804L4.73215 3.78108C4.83469 3.68158 4.8945 3.54609 4.89892 3.40327C4.90333 3.26045 4.85201 3.12152 4.7558 3.01588L2.72314 0.780242C2.62689 0.674267 2.49312 0.609986 2.35024 0.601049C2.20737 0.592113 2.06663 0.639226 1.95793 0.732382L0.764186 1.75613C0.669078 1.85158 0.612311 1.97862 0.604654 2.11315C0.596402 2.25068 0.43907 5.50842 2.96519 8.03561C5.16893 10.2388 7.9294 10.4 8.68965 10.4C8.80078 10.4 8.86899 10.3967 8.88714 10.3956C9.02165 10.388 9.14862 10.331 9.24362 10.2355L10.2668 9.04121C10.3603 8.93286 10.4078 8.79223 10.3991 8.64937C10.3903 8.5065 10.3261 8.37271 10.2201 8.27656Z" fill="#009A49"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <svg width="20" height="20" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <path d="M0.600098 10.9H10.6001V0.900012H0.600098V10.9Z" fill="url(#pattern0)"/>
                                                    <defs>
                                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                    <use xlink:href="#image0" transform="scale(0.015625)"/>
                                                    </pattern>
                                                    <image id="image0" width="64" height="64" xlink:href="data:image/png;base64,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"/>
                                                    </defs>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Jane</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                    </p>
                                    <div class="mt-3 custom__trade--card-footer">
                                        <span>~1200 Trades</span>
                                        <span>
                                            <svg width="20" height="14" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 9.28571C0 9.68013 0.335859 10 0.75 10H14.25C14.6641 10 15 9.68013 15 9.28571V2.14286H0V9.28571ZM10.5 4.64286C10.5 4.44554 10.6678 4.28571 10.875 4.28571H13.125C13.3322 4.28571 13.5 4.44554 13.5 4.64286V5.35714C13.5 5.55446 13.3322 5.71429 13.125 5.71429H10.875C10.6678 5.71429 10.5 5.55446 10.5 5.35714V4.64286ZM10.5 7.32143C10.5 7.22277 10.5839 7.14286 10.6875 7.14286H13.3125C13.4161 7.14286 13.5 7.22277 13.5 7.32143V7.67857C13.5 7.77723 13.4161 7.85714 13.3125 7.85714H10.6875C10.5839 7.85714 10.5 7.77723 10.5 7.67857V7.32143ZM1.5 5.17857C1.5 5.07991 1.58391 5 1.6875 5H8.8125C8.91609 5 9 5.07991 9 5.17857V5.53571C9 5.63438 8.91609 5.71429 8.8125 5.71429H1.6875C1.58391 5.71429 1.5 5.63438 1.5 5.53571V5.17857ZM1.5 7.32143C1.5 7.22277 1.58391 7.14286 1.6875 7.14286H5.8125C5.91609 7.14286 6 7.22277 6 7.32143V7.67857C6 7.77723 5.91609 7.85714 5.8125 7.85714H1.6875C1.58391 7.85714 1.5 7.77723 1.5 7.67857V7.32143ZM14.625 0H0.375C0.167812 0 0 0.159821 0 0.357143V1.42857H15V0.357143C15 0.159821 14.8322 0 14.625 0Z" fill="#A9D6E5"/>
                                            </svg>
                                            Cash
                                        </span>
                                        <span>
                                            <i class="flag flag-ng" style="height: 0.875rem; vertical-align:middle;"></i>
                                            Lagos
                                        </span>
                                        <div class="d-flex mt-2">
                                            <div class="mr-2">
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                                <i class="mdi mdi-star"></i>
                                            </div>
                                            5.0 (1901 reviews)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 d-flex justify-content-lg-end align-items-center">
                                <div class="mt-3">
                                    <h4>₦1,298,050</h4>
                                    <a href="{{route('trade.open')}}" class="btn btn-primary btn-lg btn-block rounded-pill">Sell</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="open__trades--container">
                    <h3 class="mt-3">Reviews</h3>
                    <div class="custom__trade--card shadow">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div>
                                    <div class="mr-2">
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                        <i class="mdi mdi-star"></i>
                                    </div>
                                    <h4>Jane</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                    </p>
                                    <p>20.08.2021</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="open__trades--container">
                    <h3 class="mt-3">Referral Program</h3>
                    <div class="custom__trade--card shadow">
                        <div class="input-group my-4">
                            <input type="text" class="form-control input-lg" value="https://vendcryptos.com/" id="dash-wallet">
                            <span class="input-group-addon-right bg-light clipboard-icon" data-clipboard-target="#dash-wallet" data-toggle="tooltip" title="" data-original-title="Copy to clipboard"><i class="fe fe-copy"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal effects -->
    <div class="modal" id="userNameModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-body">
                    <h4 class="mb-1">Change your Username</h4>
                    <p>
                        Other traders can find you with your username
                    </p>
                    <form action="" class="mt-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder=" 0x5571...e8faf9">
                        </div>
                        <div class="d-flex">
                            <button class="btn ripple btn-primary" type="button">Update</button>
                            <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="blurbModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-body">
                    <h4 class="mb-1">Add your blurb</h4>
                    <p>
                        A short description about you
                    </p>
                    <form action="" class="mt-3">
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn ripple btn-primary" type="button">Update</button>
                            <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="modal" id="termsOfTrade">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-body">
                    <h4 class="mb-1">Add Terms of trade</h4>
                    <p>
                        Describe your terms of trade
                    </p>
                    <form action="" class="mt-3">
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn ripple btn-primary" type="button">Update</button>
                            <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="addEmail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-body">
                    <h4 class="mb-1">Email address</h4>
                    <p>
                        Your email address is not public, only you can see it
                    </p>
                    <form action="" class="mt-3">
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                        <div class="d-flex">
                            <button class="btn ripple btn-primary" type="button">Update</button>
                            <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.coins').select2({
                    placeholder: 'Select coin',
                    searchInputPlaceholder: 'Search',
                    width: '100%'
                });
            })
        </script>
    @endpush
@endsection
    