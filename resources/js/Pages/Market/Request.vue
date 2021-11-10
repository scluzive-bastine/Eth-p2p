<template>
   <div class="container mt-5 pt-5">
       <h4 v-if="type == 'buyers'"  class="text-center">Buy Requests</h4>
       <h4 v-else-if="type == 'sellers'" class="text-center">Sell Requests</h4>
       <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buyer</th>
                        <th>Seller</th> 
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="trade in trades" :key="trade.id">
                        <td>{{trade.count}}</td>
                        <td>
                            <span v-if="type == 'buyers'">{{trade.name}}</span>
                            <span class="text-primary" v-else-if="type == 'sellers'"><b>You</b></span> 
                        </td>
                        <td>
                            <span class="text-primary" v-if="type == 'buyers'"><b>You</b></span>
                            <span  v-else-if="type == 'sellers'">{{trade.name}}</span> 
                        </td> 
                        <td>{{trade.amount}} {{trade.coin}}</td>
                        <td>
                            <span v-if="trade.status == 0" class="text-danger"> Awaiting buyer</span> 
                            <span v-else-if="trade.status == 1" class="text-info">Buyer confirmed</span> 
                            <span v-else-if="trade.status == 2" class="text-info">Seller confirmed</span>
                            <span v-else-if="trade.status == 3" class="text-info">Network confirming</span>
                            <span v-else-if="trade.status == 4" class="text-info">Completed</span>
                        </td>
                        <td v-html="trade.time"></td>
                        <td>
                            <Link :href="route('market.payment', trade.id)" class="btn btn-sm btn-success">View </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
       </div>
       <div v-if="trades.length < 1" class="text-center alert alert-info"><i class="fas fa-info-circle"></i> Nothing to show</div> 
   </div>
</template>

<script>
import { defineComponent } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components:{
        Link
    },
    props:['trades', 'type'],
});
</script>
