
import Web3Modal from "web3modal";
import WalletConnectProvider from "@walletconnect/web3-provider";
import Fortmatic from "fortmatic";
import Portis from "@portis/web3";
import Authereum from "authereum";

const providerOptions = {
    walletconnect: {
        package: WalletConnectProvider, // required
        options: {
            rpc: {
              56: 'https://bsc-dataseed1.binance.org'
            },
            chainId: 56
        }
    },
    fortmatic: {
        package: Fortmatic, // required
        options: {
            key: "pk_live_20E6A2B7985765D3" // required
        }
    },
    portis: {
        package: Portis, // required
        options: {
            id: "8c77f5b1-9d90-44fc-91e5-674c9a953de9" // required
        }
    },
    authereum: {
        package: Authereum // required
    }
};
const web3Modal = new Web3Modal({
    network: "mainnet", // optional
    cacheProvider: true, // optional
    providerOptions // required
});

export default web3Modal;



