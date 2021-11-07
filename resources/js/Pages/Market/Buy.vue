<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow">
                    <form id="filterBuyForm"  @submit.prevent="filterBuy">
                        <div class="btn-group btn-block mb-3" role="group" aria-label="buy-sell">
                            <Link :href="route('market.buy')" class="btn btn-primary btn-lg">Buy</Link>
                            <Link :href="route('market.sell')" class="btn btn-secondary btn-lg">Sell</Link>
                        </div>

                        <div class="form-group mt-3">
                            <label for="currency">Currency</label>
                            <select name="currency" id="currencyList" class="form-control currency"></select>
                        </div> 

                        <p class="mg-b-10">Crypto</p>
                        <select class="form-control coins" id="cryptoList" name="coin"></select>
                      
                        <div class="form-group mt-3">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" placeholder="Enter amount" class="form-control">
                        </div>

                        <div class="row justify-content-center">
                            <div class="col">
                                <label class="ckbox"><input  name="rated" type="checkbox"><span>Top Rated 👍</span></label>
                            </div>
                            <div class="col">
                                <label class="ckbox"><input  name="online" type="checkbox"><span>Online</span></label>
                            </div>
                        </div>

                        <button id="filterBuyFormBtn" class="btn btn-primary btn-lg btn-block mt-4">
                            <i class="fe fe-filter"></i>
                            Filter
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <h3 class="mt-3 text-center">Buy from these sellers</h3>
                <div id="ListShow"></div> 
                <div id="ThePaginator"></div> 
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

export default defineComponent({
    components:{
        Link
    },
    methods:{
        filterBuy(){
            let form = $("#filterBuyForm");
            let btn = $("#filterBuyFormBtn");
        
            btn.data('text', btn.text());
            btn.html(get_loader(''));
            btn.prop('disabled', true);

            axios.post(route('market.filterSellers'), form.serialize()).then(response=>{
                let data = response.data;
                $("#ListShow").html(data.page);
                $("#ThePaginator").html(data.link);
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
            }).catch(error=>{
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
            });
        }
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

        axios.get(route('market.currencyList')).then(result=>{
            $("#currencyList").html(result.data.currency);
            $("#cryptoList").html(result.data.cryptos);
        });

        let form = $("#filterBuyForm");
        axios.post(route('market.filterSellers'), form.serialize()).then(response=>{
            let data = response.data;
            $("#ListShow").html(data.page);
            $("#ThePaginator").html(data.link);
        });
    }
});
</script>
