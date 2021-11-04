<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
    <Side/>
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
                                    <a href="" class="btn btn-primary btn-lg btn-block rounded-pill">Sell</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="open__trades--container">
                    <h3 class="mt-3">Reviews</h3>
                    <ReviewBox/>
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
</template>
<script>
import { defineComponent } from 'vue';
import Side from "../Components/Profile/Side";
import ReviewBox from "../Components/ReviewBox";
export default defineComponent({
    components:{
        Side,
        ReviewBox
    },
    setup() {
        
    },
    mounted(){

    }
});
</script>

