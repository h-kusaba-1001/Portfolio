<template>
    <v-btn icon @click="like()" v-if="isEnableLike !== false" class="">
        <v-icon color="pink">{{ mdiHeartOutline }}</v-icon>
        {{ dLikeNum }}
    </v-btn>
    <v-tooltip bottom v-else>
        <template v-slot:activator="{ on, attrs }">
            <v-btn icon v-bind="attrs" v-on="on" class="mr-3">
                <v-icon color="pink">{{ mdiHeart }}</v-icon>
                {{ dLikeNum }}
            </v-btn>
        </template>
        <span>Thank You!</span>
    </v-tooltip>
</template>

<script>
import { mapMutations } from "vuex";
import { mdiHeart, mdiHeartOutline } from "@mdi/js";

export default {
    data() {
        return {
            dTodayLikeNumFromIp: 1,
            dLikeNum: 0,
            mdiHeart,
            mdiHeartOutline,
        };
    },
    props: {
        todayLikeNumFromIp: {
            type: Number,
            required: true,
            default: 1,
        },
        likeNum: {
            type: Number,
            required: true,
            default: 0,
        },
        apiUrl: {
            type: String,
            required: true,
        },
        postParam: {
            type: Object,
            required: true,
        },
    },
    computed: {
        isEnableLike: function () {
            return this.dTodayLikeNumFromIp === 0 ? true : false;
        },
    },
    methods: {
        ...mapMutations([
            "gonnaLoading",
            "loaded",
            "setErrorDialogForValidation",
        ]),
        async like() {
            this.gonnaLoading();
            await axios
                .post(this.apiUrl, this.postParam)
                // eslint-disable-next-line no-unused-vars
                .then((response) => {
                    // 成功した場合は、いいね数を1カウントアップし、IPからの当日のいいね数を+1としていいね不可の状態にする
                    this.dLikeNum++;
                    this.dTodayLikeNumFromIp++;
                })
                .catch((error) => {
                    if (error.response.data.errors) {
                        this.setErrorDialogForValidation(
                            error.response.data.errors
                        );
                    }
                });
            this.loaded();
        },
    },
    created() {
        // propをdataに渡す
        this.dTodayLikeNumFromIp = this.todayLikeNumFromIp;
        this.dLikeNum = this.likeNum;
    },
};
</script>
