<template>
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-5">
                <div class="card mt-5 shadow-lg">
                    <div class="card-body">
                        <div class="connect__wallet--container">
                            <i class="ti-wallet"></i>
                            <h2 class="mt-2">Connect your Wallet</h2>
                            <button class="btn btn-secondary btn-lg btn-block mt-1" @click="toggleWeb3Modal">Connect Wallet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue';
import {connectWallet} from "../Helpers/activeWeb3";
export default defineComponent({
    setup() {
        const toggleWeb3Modal = function (){
            connectWallet();
        }
        return {
            toggleWeb3Modal
        };
    }
});
</script>
