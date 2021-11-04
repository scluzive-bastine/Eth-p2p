import web3Modal from "./web3Modal";
import Web3 from "web3";
import axios from 'axios';
import {alertUser} from "./utility";

export const connectWallet = function (){
    web3Modal.connect().then(provider=>{
      WalletProvider(provider);
    }).catch(error=>{
        alertUser('error', "Could not connect");
    });
}
export const WalletProvider = function (provider){
    const web3 = new Web3(provider);
    web3.eth.getAccounts().then(accounts=>{
        axios.post(route('gen_nounce'), {
            address:accounts[0]
        }).then(result=>{
            let nounce = result.data.nounce;
            let address = accounts[0];
            let msg = "I am signing my one-time nounce:"+nounce;
            web3.eth.personal.sign(web3.utils.utf8ToHex(msg), address).then((sig)=>{
                axios.post(route('sign_in'), {
                    signature:sig,
                    address:address,
                    message:msg,
                    nounce:nounce
                }).then(result=>{
                    if(result.data.signed)
                        window.location.reload();
                }).catch(error=>{
                    alertUser('error', error.message);
                });
            });
        }).catch(error=>{
            alertUser('error', error.message);           
        });
    });
} 
