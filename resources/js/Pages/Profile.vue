<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
    <Side/>
    <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <div class="open__trades--container">
                    <h3 class="mt-3">Open trades</h3>
                    <div id="open_trade"></div> 
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

