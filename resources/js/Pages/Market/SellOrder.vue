<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5 col-lg-4">
                <div class="custom__trade--card shadow" id="showTheAddress">
                    <form id="sellOrderForm" @submit.prevent="createSellOrder">
                        <div class="btn-group btn-block mb-3" role="group" aria-label="buy-sell">
                            <Link :href="route('market.buy_order')" class="btn btn-secondary btn-lg">Buy</Link>
                            <Link :href="route('market.sell_order')" class="btn btn-primary btn-lg">Sell</Link>
                        </div>

                        <div class="form-group mt-3">
                            <label for="currency">Currency</label>
                            <select name="currency" required class="form-control currency currencyList" id="currencyList">
   
                            </select>
                        </div> 

                        <p class="mg-b-10">Crypto</p>
                        <select class="form-control coins" required name="crypto" id="cryptoList">

                        </select>
                      
                        <div v-if="showAmount">
                            <div class="form-group mt-3">
                                <label for="amount">Amount</label>
                                <input type="text" required name="amount" placeholder="Enter amount in crypto" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label for="min">Min. sell</label>
                                <input type="text" required name="min" placeholder="Enter amount in crypto" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <label for="price">Set your {{activeCurr}} Price</label>
                                <input type="text" required name="price" placeholder="Enter price" class="form-control">
                            </div>
                        </div> 

                        <div id="FormMsg"></div> 
                        <button id="sellOrderFormBtn" class="btn btn-primary btn-lg btn-block mt-4">
                            Lock in escrow
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-5 col-lg-8">
                <h3 class="mt-3 text-center">Your Sell Orders</h3>
                    <div class="table-responsive"> 
                        <table class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Price</th>
                                    <th>Min</th>
                                    <th>Amount</th>
                                    <th>Sold</th>
                                    <th>Crypto</th>
                                    <th>Fiat</th>
                                    <th>Requests</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                        <div id="The_paginator"></div> 
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    data(){
        return {
            showAmount:false ,
            activeCurr:""
        }
    },
    components:{
        Link
    },
    setup() {
        
    },
    methods:{
        createSellOrder(){
            let form = $("#sellOrderForm");
            let btn = $("#sellOrderFormBtn");
            let msg = $("#FormMsg");

            btn.data('text',btn.text());
            btn.html(get_loader(''));
            btn.prop('disabled',true);

            msg.html("");
 
            axios.post(route('market.createSellOrder'), form.serialize())
            .then(result=>{
                let data = result.data;
                console.log(data);
                if(data.success){
                    $('#showTheAddress').html(data.success);
                    // msg.html("<div class='alert alert-success'><i class='fas fa-check-circle'></i> Order Created</div>");
                    // setTimeout(function(){
                    //     window.location.reload();
                    // }, 2000);

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
        loadSellOrder(url){
            
            axios.get(url).then(response=>{
                $("#tableBody").html(response.data.page);
                $("#The_paginator").html(response.data.link);
            });  
        },
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

        $('.currencyList').on('change', (e)=>{
            let value = e.target.value;
            if( value != "" ){
                this.showAmount = true;
                this.activeCurr = value;
            }else{
                this.showAmount = false;
            }
        });

        axios.get(route('market.currencyList')).then(result=>{
            $("#currencyList").html(result.data.currency);
            $("#cryptoList").html(result.data.cryptos);
        });

        this.loadSellOrder(route('market.loadMoreSellOrders'));
        var parentObj = this;
        $('body').on('click', '#The_paginator .pagination a', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            let rt = route('market.loadMoreSellOrders');
            url = rt+"?"+url.split('?')[1];
            parentObj.loadSellOrder(url);
        }); 
    }
});
</script>
