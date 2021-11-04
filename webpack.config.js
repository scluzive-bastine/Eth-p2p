const path = require('path');

module.exports = {
    resolve: {
        alias: {
            "@": path.resolve("resources/js"),
            "BasePath": path.resolve("public"),
        },
        fallback: {
            os: require.resolve("os-browserify/browser"),
            https: require.resolve("https-browserify"),
            http: require.resolve("stream-http"),
            stream: require.resolve("stream-browserify"),
            crypto: require.resolve("crypto-browserify")
        },
    },
};
