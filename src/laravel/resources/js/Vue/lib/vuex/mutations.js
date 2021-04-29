export default {
    getSettings: (state) => {
        return state.settings;
    },
    gonnaLoading: (state) => {
        state.isLoading = true;
    },
    loaded: (state) => {
        state.isLoading = false;
    },
    setPostDialog: (state, payload) => {
        state.postDialog = payload;
    },
    setActiveArticle: (state, payload) => {
        state.activeArticle = payload;
    },
    setInfoDialog: (state, payload) => {
        state.infoDialog = {
            showDialog: true,
            title: payload.title,
            message: payload.message,
            color: "primary",
        };
    },
    setErrorDialog: (state, payload) => {
        state.infoDialog = {
            showDialog: true,
            title: payload.title,
            message: payload.message,
            color: "deep-orange lighten-1",
        };
    },
    setErrorDialogForValidation: (state, payload) => {
        let msg = "";
        Object.keys(payload).forEach(function (key) {
            msg += payload[key] + "\n";
        });
        state.infoDialog = {
            showDialog: true,
            title: "入力エラー",
            message: msg,
            color: "deep-orange lighten-1",
        };
    },
    diappearInfoDialog: (state) => {
        state.infoDialog.showDialog = false;
    },
};
