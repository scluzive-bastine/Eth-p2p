<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow">
                    <form @submit.prevent="createBuyOrder" id="buyOrderForm">
                        <div class="btn-group btn-block mb-3" role="group" aria-label="buy-sell">
                            <Link :href="route('market.buy_order')" class="btn btn-primary btn-lg">Buy</Link>
                            <Link :href="route('market.sell_order')" class="btn btn-secondary btn-lg">Sell</Link>
                        </div>

                        <div class="form-group mt-3">
                            <label for="currency">Currency</label>
                            <select name="currency" required class="form-control currency" id="currencyList"></select>
                        </div> 

                        <p class="mg-b-10">Crypto</p>
                        <select class="form-control coins" required name="crypto"  id="cryptoList"></select>
                      
                        <div v-if="showAmount">
                            <div class="form-group mt-3">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" required placeholder="Enter amount in crypto" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label for="amount">{{activeCoin}} Address</label>
                                <input type="text" name="address" required :placeholder="'Enter '+activeCoin+' address'" class="form-control">
                            </div>   
                        </div> 
                        <div id="FormMsg"></div> 
                        <button id="buyOrderFormBtn" class="btn btn-primary btn-lg btn-block mt-4">
                            Create Buy Order
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <h3 class="mt-3 text-center">Your Buy Orders</h3>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

export default defineComponent({
    data(){
        return {
            showAmount:false ,
            activeCoin:""
        }
    },
    components:{
        Link
    },
    setup() {
        
    },
    methods:{
        createBuyOrder(){
            let form = $("#buyOrderForm");
            let btn = $("#buyOrderFormBtn");
            let msg = $("#FormMsg");

            btn.data('text',btn.text());
            btn.html(get_loader(''));
            btn.prop('disabled',true);

            msg.html("");

            axios.post(route('market.createBuyOrder'), form.serialize())
            .then(result=>{
                let data = result.data;
                console.log(data);
                // if(data.success){
                //     this.terms = data.terms;
                //     msg.html("<div class='alert alert-success'><i class='fas fa-check-circle'></i> Terms Updated</div>");
                // }else if(data.error){
                //     msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+data.error+"</div>");
                // }
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
            })
            .catch(error=>{
                msg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+error.message+"</div>");
                btn.prop('disabled',false);
                btn.text(btn.data('text'));
           });
        },
    },
    mounted(){
        $(document).ready(()=>{
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
            $('.coins').on('change', (e)=>{
                let value = e.target.value;
                if(value != ""){
                    this.showAmount = true;
                    this.activeCoin = value;
                }else{
                    this.showAmount = false;
                }
            });
        });
        axios.get(route('market.currencyList')).then(result=>{
            $("#currencyList").html(result.data.currency);
            $("#cryptoList").html(result.data.cryptos);
        });
    }
});
</script>

<style scoped>
#amtShow{
    display:none;
}
</style>