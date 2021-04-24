const axiosBase = require("axios");
// eslint-disable-next-line no-unused-vars
const axios = axiosBase.create({
    headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
    },
    responseType: "json",
});
