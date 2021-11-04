<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow">
                    <form @submit.prevent="createSellOrder">
                        <div class="btn-group btn-block mb-3" role="group" aria-label="buy-sell">
                            <Link :href="route('market.buy_order')" class="btn btn-secondary btn-lg">Buy</Link>
                            <Link :href="route('market.sell_order')" class="btn btn-primary btn-lg">Sell</Link>
                        </div>

                        <div class="form-group mt-3">
                            <label for="currency">Currency</label>
                            <select name="currency" class="form-control currency" id="currencyList">
   
                            </select>
                        </div> 

                        <p class="mg-b-10">Crypto</p>
                        <select class="form-control coins" name="coins" id="cryptoList">

                        </select>
                      
                        <div class="form-group mt-3">
                            <label for="amount">Amount</label>
                            <input type="text" placeholder="Enter amount" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="price">Set your Price</label>
                            <input type="text" placeholder="Enter price" class="form-control">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block mt-4">
                            Create Sell Order
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <h3 class="mt-3 text-center">Your Sell Orders</h3>
                
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
    methods:{
        createSellOrder(){

        }
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

        axios.get(route('market.currencyList')).then(result=>{
            $("#currencyList").html(result.data.currency);
            $("#cryptoList").html(result.data.cryptos);
        });
    }
});
</script>
