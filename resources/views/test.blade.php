<html>
  <head>
    <!-- Moralis SDK code -->
    <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
    <script src="https://unpkg.com/moralis/dist/moralis.js"></script>
  </head>
  <body>
    <h1>Moralis Gas Stats</h1>

    <button id="btn-login">Moralis Login</button>
    <button id="btn-logout">Logout</button>
    <button id="btn-get-stats">Refresh Stats</button>

    <script>
    // connect to Moralis server
    const serverUrl = "https://qbrvskapjogn.bigmoralis.com:2053/server";
    const appId = "oxUQfCY9Wey4jPwYylJRNPFWeCMPu5jjUWxBCZeB";
    Moralis.start({ serverUrl, appId });

    async function login() {
    let user = Moralis.User.current();
    if (!user) {
        user = await Moralis.Web3.authenticate();
    }
    console.log("logged in user:", user);
    getStats();
    }

    async function logOut() {
    await Moralis.User.logOut();
    console.log("logged out");
    }

    // bind button click handlers
    document.getElementById("btn-login").onclick = login;
    document.getElementById("btn-logout").onclick = logOut;
    document.getElementById("btn-get-stats").onclick = getStats;

    function getStats() {
        const user = Moralis.User.current();
        if (user) {
            getUserTransactions(user);
        }
    }

    async function getUserTransactions(user) {
        // create query
        const query = new Moralis.Query("EthTransactions");
        query.equalTo("from_address", user.get("ethAddress"));

        // subscribe to query updates ** add this**
        const subscription = await query.subscribe();
        handleNewTransaction(subscription);

        // run query
        const results = await query.find();
        console.log("user transactions:", results);
    }

      //get stats on page load
    getStats();

    const subscription = await query.subscribe();     

    async function handleNewTransaction(subscription) {
    // log each new transaction
        subscription.on("create", function(data) {
            console.log("new transaction: ", data);
        });
    }
    </script>
  </body>
</html>