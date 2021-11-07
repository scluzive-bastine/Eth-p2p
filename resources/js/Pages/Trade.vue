<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow">
                    
                    <h3 v-if="type == 'sell'"> Sell {{coin}} to {{name}} </h3>

                    <h3 v-else> Buy {{coin}} from {{name}} </h3>

                    <form @submit.prevent="submitTrade" id="submitTradeForm">
                        <div class="form-group mt-3">
                            <div class="d-flex justify-content-between">
                                <h6>Trade amount</h6>

                                <h6 v-if="type == 'sell' ">{{cur}}{{min.toLocaleString()}} - {{cur}}{{max.toLocaleString()}}</h6>
                                <h6 v-else>{{cur}}{{min.toLocaleString()}} - {{cur}}{{max.toLocaleString()}}</h6>
                            </div>

                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >
                                        {{cur}}
                                    </span>
                                </div>
                                <input aria-describedby="basic-addon1" required name="fiat" id="fiat" aria-label="coin" class="form-control border-left-0" placeholder="0" type="text">
                            </div>
                        </div> 
                        <div class="form-group mt-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >
                                        <!-- <img src="/img/coins/eth.svg" alt="" width="15"> -->
                                        {{coin}}
                                    </span>
                                </div>
                                <input aria-describedby="basic-addon1" required name="coin" id="coin"  aria-label="coin" class="form-control border-left-0" placeholder="0.00000" type="text">
                            </div>
                        </div> 
                        <div class="form-group" v-if="type == 'buy'">
                            <label for="address">Enter recipient {{coin}} address</label>
                            <input type="text" name="address" class="form-control" :placeholder="'Enter a valid '+coin+' address'" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="" cols="30" rows="5" placeholder="message"></textarea>
                        </div> 
                        <div id="formMsg"></div> 
                        <div class="text-center"> 
                            <button class="btn btn-primary">Initate trade</button>
                        </div> 
                    </form>
                    <hr>
                    <p>
                        Your privacy is protected with end-to-end encrypted messages, 
                        and your crypto is protected with non-custodial technology. 
                        Our staff cannot read your messages without consent.
                    </p>
                </div>
            </div>
            
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <div class="custom__trade--card shadow">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 mt-2">
                            <div class="d-flex align-items-center tFIRST">
                                <img src="/img/profile/avatar-1.jpg" class="img-fluid rounded-pill trader__profile--image" alt="">
                                <div>
                                    <h5  class="ml-3">@{{type == 'sell' ? 'You are': name+' is'}} the seller</h5>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 mt-2">
                            <div class="d-flex align-items-center">
                                <img src="/img/profile/avatar-2.jpg" class="img-fluid rounded-pill trader__profile--image" alt="">
                                <div class="ml-2">
                                    <h5 class="mb-1"> <span>@{{type == 'buy'? 'You are': name+' is'}}</span>  the buyer</h5>
                                    <p class="mb-0">
                                            <!-- and will transfer money from their account to your bank account.  -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class=" justify-content-center">
                    <br>
                     <h4 class="text-center">{{type == 'buy' ? 'Seller\'s': 'Buyer\'s'}} Rate</h4> 
                      <h4 class="text-center">@ {{cur}}{{Number(trader_price).toFixed(2).toLocaleString()}} Per USD </h4> 
                    <!-- <div>
                        <img src="/img/coins/eth.svg" alt="">
                    </div> -->
                    <h3 class="ml-3 text-center">1 {{coin}} = {{cur}}{{rate.toLocaleString()}}</h3>

                </div>

                <!-- <div class="custom__trade--card shadow">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                            <div>
                                <h5>Fame</h5>
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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                            <div>
                                <h5 class="mb-1" >Trade Flash</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                </p>
                                <h6 class="mt-2">Details</h6>
                                <div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="custom__trade--card shadow mt-4">
                    <h6>Terms of trade</h6>
                    <p>
                       {{terms}}
                    </p>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { defineComponent } from 'vue';

export default defineComponent({
    props:['type', 'min', 'max', 'name', 'cur', 'price', 'coin', 'rate', 'terms', 'trader_price', 'id'],

    data(){
        return {

        }
    },
    methods:{
        submitTrade(){
            let form = $("#submitTradeForm");
            let msg = $("#formMsg");
            let data = form.serialize();
            data = data+'&id='+this.id+'&type='+this.type
           
            axios.post(route('market.initiateTrade'), data).then(response=>{
                let result = response.data;
                console.log(result);
            }).catch(error=>{
                msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+error.message+"</div>");
            });
        }
    },
    mounted(){
        let price = this.rate;
        $("#fiat").on('keyup', function(){
            let value = $(this).val();
            $("#coin").val( (value/price).toFixed(8)  );
        });

        $("#coin").on('keyup', function(){
            let value = $(this).val();
            $("#fiat").val( (value*price).toFixed(2) ); 
        });
    }
});
</script>
