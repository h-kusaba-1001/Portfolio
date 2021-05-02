const axiosBase = require("axios");
// eslint-disable-next-line no-unused-vars
const axios = axiosBase.create({
    // eslint-disable-next-line no-undef
    baseURL: process.env.MIX_AXIOS_BASE_URL,
    headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
    },
    responseType: "json",
});
