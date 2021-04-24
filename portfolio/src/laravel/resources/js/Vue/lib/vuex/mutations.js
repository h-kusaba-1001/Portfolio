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
};
