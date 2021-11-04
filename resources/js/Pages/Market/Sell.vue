<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow">
                    <form action="">
                        <div class="btn-group btn-block mb-3" role="group" aria-label="buy-sell">
                            <Link :href="route('market.buy')"  class="btn btn-secondary btn-lg">Buy</Link>
                            <Link :href="route('market.sell')"  class="btn btn-primary btn-lg">Sell</Link>
                        </div>
                        <div class="form-group mt-3">
                            <label for="currency">Currency</label>
                            <select name="currency" class="form-control currency">
                                <option label="Choose one"></option>
                                <option value="NGN">NGN</option>
                                <option value="USD">USD</option>
                                <option value="GBP">GBP</option>
                                <option value="EUR">EUR</option>       
                            </select>
                        </div>   
                        <p class="mg-b-10">Crypto</p>
                        <select class="form-control coins" name="coins">
                            <option label="Choose one"></option>
                            <option value="Eth">ETH</option>
                            <option value="Bitcoin">Bitcoin</option>
                            <option value="Litecoin">Litecoin</option>
                            <option value="Dash">Dash</option>
                        </select>
                    
                        <div class="form-group mt-3">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" placeholder="Enter amount" class="form-control">
                        </div>

                        <div class="row justify-content-center">
                            <div class="col">
                                <label class="ckbox"><input type="checkbox"><span>Top Rated 👍</span></label>
                            </div>
                            <div class="col">
                                <label class="ckbox"><input type="checkbox"><span>Online</span></label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block mt-4">
                            <i class="fe fe-filter"></i>
                            Filter
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <h3 class="mt-3 text-center">Sell to these buyers</h3>
                
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components:{
        Link
    },
    setup() {
        
    },
    mounted(){
        $(document).ready(function() {
            $('.coins').select2({
                placeholder: 'Select coin',
                searchInputPlaceholder: 'Search',
                width: '100%'
            });

            $('.currency').select2({
                placeholder: 'Select Currency',
                searchInputPlaceholder: 'Search',
                width: '100%'
            });
        });
    }
});
</script>
