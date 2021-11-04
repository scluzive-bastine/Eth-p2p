<template>
<div class="col-12 col-sm-12 col-md-5 col-lg-4">
    <div class="custom__trade--card shadow">
        <div class="row justify-content-center">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                <div class="pRIMGCONT">
                    <img src="/img/profile/avatar-2.jpg" class="img-fluid rounded-pill" alt="">
                    <div class="w-100 text-white text-center p-1 text-xl cHPROIX">
                        <input type="file" name="image" id="file" class="inputfile image">
                        <label class="d-flex justify-content-center" for="file"> <i
                                class="fe fe-camera" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>
            <div class="col-8 col-sm-8 col-md-8 col-lg-8 d-flex align-items-center">
                <div>
                    <h3>
                        ben {{username}}
                        <small  data-placement="top" data-toggle="tooltip" title="Edit username">
                            <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#userNameModal">
                                <i class="fe fe-edit-2"></i>
                            </a>
                        </small>
                    </h3>
                    <!-- <div>Reliable trader</div> -->
                    <div>
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.50895 0L0.928589 1.81818V4.54545C0.928589 7.06818 2.88287 9.42727 5.50895 10C8.13502 9.42727 10.0893 7.06818 10.0893 4.54545V1.81818L5.50895 0ZM4.49109 7.27273L2.45537 5.45455L3.17296 4.81364L4.49109 5.98636L7.84493 2.99091L8.56252 3.63636L4.49109 7.27273Z" fill="#009A49"/>
                        </svg>
                        Verified
                    </div>
                </div>
            </div>
            <br>
            <br>
            <Link :href="route('market.buy')"  class="btn btn-sm  btn-success">Trade</Link>
            &nbsp;
            <Link :href="route('market.buy_order')"  class="btn btn-sm btn-success">Create Order</Link>
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
                <img src="/img/profile/profile-fame.svg" class="img-fluid" alt="">
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
                    <h6>Phone Number 
                        <small data-placement="top" data-toggle="tooltip" title="Add Phone number">
                            <a class="modal-effect" data-effect="effect-scale" data-toggle="modal" href="#addPhone">
                                <i class="fe fe-edit-2"></i>
                            </a>
                        </small>
                    </h6>
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
                {{blurb}}
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
                {{terms}}
            </p>
        </div>

        <!-- <hr>
        <div class="d-flex justify-content-center">
            <button class="btn btn-success">Trust Trader</button>
        </div> -->
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

    <div class="modal" id="addPhone">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-body">
                    <h4 class="mb-1">Phone Number</h4>
                    <p>
                        Your phone number is going to be public
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

    <div class="modal" id="blurbModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-body">
                    <h4 class="mb-1">Add your blurb</h4>
                    <p>
                        A short description about you
                    </p>
                    <form id="blurbForm" @submit.prevent="updateBlurb" class="mt-3">
                        <div class="form-group">
                            <textarea name="value" required cols="30" rows="5" v-model="blurb" class="form-control"></textarea>
                        </div>
                        <div id="blurbFormMsg"></div> 
                        <div class="d-flex">
                            <button class="btn ripple btn-primary" id="blurbUpBtn">Update</button>
                            <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Close</button>
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
                    <form class="mt-3" id="tmForm" @submit.prevent="updateTerms">
                        <div class="form-group">
                            <textarea name="value" required cols="30" rows="5" class="form-control" v-model="terms"></textarea>
                        </div>
                        <div id="tmFormMsg"></div> 
                        <div class="d-flex">
                            <button class="btn ripple btn-primary" id="tmUpbtn">Update</button>
                            <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</template>

<script>
import { defineComponent } from 'vue';
import axios from 'axios';
import {alertUser} from "../../Helpers/utility";
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components:{
        Link
    },
    data(){
        return {
            name:"",
            email:"",
            blurb:"",
            terms:"",
            phone:""
        }
    },
    setup() {
        
    },
    methods:{
        updateTerms(){
            let form = $("#tmForm");
            let btn = $("#tmUpbtn");
            let msg = $("#tmFormMsg");

            btn.data('text',btn.text());
            btn.html(get_loader(''));
            btn.prop('disabled',true);

            msg.html("");

            axios.post(route('profile.update_terms'), form.serialize())
            .then(result=>{
                let data = result.data;
                if(data.success){
                    this.terms = data.terms;
                    msg.html("<div class='alert alert-success'><i class='fas fa-check-circle'></i> Terms Updated</div>");
                }else if(data.error){
                    msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+data.error+"</div>");
                }
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
            })
            .catch(error=>{
                msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+error.message+"</div>");
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
           });
        },
        updateBlurb(){
            let form = $("#blurbForm");
            let btn = $("#blurbUpBtn");
            let msg = $("#blurbFormMsg");

            btn.data('text',btn.text());
            btn.html(get_loader(''));
            btn.prop('disabled',true);

            msg.html("");

            axios.post(route('profile.update_blurb'), form.serialize())
            .then(result=>{
                let data = result.data;
                if(data.success){
                    this.blurb = data.blurb;
                    msg.html("<div class='alert alert-success'><i class='fas fa-check-circle'></i> Blurb Updated</div>");
                }else if(data.error){
                    msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+data.error+"</div>");
                }
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
            })
            .catch(error=>{
                msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+error.message+"</div>");
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
           });
        },
        updateEmail(){

        },
        updatePhone(){

        },
        updateName(){

        },
        updateAvater(){

        }
    },
    mounted(){
        axios.post(route('profile.getProfile')).then(result=>{
            let data = result.data;
            this.name = data.name;
            this.email = data.email;
            this.blurb = data.blurb;
            this.terms = data.terms;
            this.phone = data.phone;
        });
    }
});
</script>

<style scoped>
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