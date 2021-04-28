<template>
    <div
        v-if="isEnableLike !== false"
        class="text-center d-flex align-center justify-space-around mr-4"
    >
        <v-btn icon @click="like()">
            <v-icon color="pink">mdi-heart-outline</v-icon>
            {{ likeNum }}
        </v-btn>
    </div>
    <div
        v-else
        class="text-center d-flex align-center justify-space-around mr-4"
    >
        <v-tooltip bottom>
            <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                    <v-icon color="pink">mdi-heart</v-icon>
                    {{ likeNum }}
                </v-btn>
            </template>
            <span>Thank You!</span>
        </v-tooltip>
    </div>
</template>

<script>
import { mapMutations } from "vuex";

export default {
    data() {
        return {
            isEnableLike: false,
            likeNum: 0,
        };
    },
    methods: {
        ...mapMutations([
            "gonnaLoading",
            "loaded",
            "setErrorDialogForValidation",
        ]),
        async getLikeInfo() {
            this.gonnaLoading();
            await axios
                .get("/api/like/portfolio")
                .then((response) => {
                    this.isEnableLike = response.data.isEnableLike;
                    this.likeNum = response.data.likeNum;
                })
                // eslint-disable-next-line no-unused-vars
                .catch((error) => {
                    //
                });
            this.loaded();
        },
        async like() {
            this.gonnaLoading();
            await axios
                .post("/api/like/portfolio")
                // eslint-disable-next-line no-unused-vars
                .then((response) => {
                    // 成功した場合は、いいね数を1カウントアップし、いいね不可の状態にする
                    this.likeNum++;
                    this.isEnableLike = false;
                })
                .catch((error) => {
                    // バリデーションメッセージが存在する場合
                    if (error.response.data.errors) {
                        this.setErrorDialogForValidation(
                            error.response.data.errors
                        );
                    }
                });
            this.loaded();
        },
    },
    mounted() {
        this.getLikeInfo();
    },
};
</script>
