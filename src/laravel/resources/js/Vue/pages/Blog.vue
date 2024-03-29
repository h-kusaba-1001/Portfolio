<template>
    <v-container v-if="gettingArticleLoading">
        <v-row>
            <v-col v-for="i in 6" :key="i" cols="12" lg="4" sm="6" xs="12">
                <v-skeleton-loader
                    v-for="n in 1"
                    :key="n"
                    type="image, article, actions"
                    class="mb-6"
                ></v-skeleton-loader>
            </v-col>
        </v-row>
    </v-container>
    <v-container v-else-if="articles.length === 0">
        <p>ブログ記事がありません。</p>
    </v-container>
    <v-container v-else>
        <v-layout wrap>
            <v-flex
                xs12
                sm6
                lg4
                pa-2
                v-for="article in articles"
                :key="article.id"
            >
                <blog-detail :article="article"></blog-detail>
            </v-flex>
            <blog-dialog
                v-if="getActiveArticle"
                :article="getActiveArticle"
            ></blog-dialog>
        </v-layout>

        <!-- pager -->
        <v-flex
            style="display: inline"
            mt-2
            v-for="link in links"
            :key="link._id"
        >
            <v-btn
                @click="getArticleList(link.url)"
                :disabled="link.url == null || link.active"
                v-html="link.label"
            >
                {{ link.label }}
            </v-btn>
        </v-flex>
    </v-container>
</template>

<script>
import { mapGetters, mapMutations, mapState } from "vuex";
import BlogDetail from "@/Vue/pages/BlogDetail.vue";
import BlogDialog from "@/Vue/pages/BlogDialog.vue";

export default {
    data() {
        return {
            articles: [],
            links: [],
            gettingArticleLoading: true,
        };
    },
    components: {
        BlogDetail,
        BlogDialog,
    },
    methods: {
        ...mapMutations([
            "gonnaLoading",
            "loaded",
            "setActiveArticle",
            "setPostDialog",
            "setErrorDialog",
        ]),
        // ポートフォリオ全体のローディングとは別に、ブログ取得ローディング用の関数を置く
        gettingArticleLoad() {
            this.gettingArticleLoading = true;
        },
        gettingArticleLoaded() {
            this.gettingArticleLoading = false;
        },
        async getArticleList(url = "/api/article") {
            this.gonnaLoading();
            this.gettingArticleLoad();
            let response = await axios.get(url);
            this.articles = response.data.data;
            this.links = response.data.meta.links;
            this.loaded();
            this.gettingArticleLoaded();
            // IDが入力されている場合は、該当のブログ記事を検索する
            if (this.$route.name === "blogDetail") {
                this.getArticleDetail(this.$route.params.id);
            }
        },
        async getArticleDetail(id) {
            this.gonnaLoading();
            this.gettingArticleLoad();
            await axios
                .get("/api/article/" + id)
                .then((response) => {
                    this.setActiveArticle(response.data.data);
                    this.setPostDialog(true);
                })
                .catch((error) => {
                    if (error.response.status === 404) {
                        this.setErrorDialog({
                            title: "通信エラー",
                            message: "お探しの記事は見つかりませんでした。",
                        });
                    }
                    // ブログ一覧へ返す
                    this.$router.push({ name: "blog" });
                });
            this.loaded();
            this.gettingArticleLoaded();
        },
    },
    computed: {
        ...mapState(["isLoading"]),
        ...mapGetters(["getActiveArticle"]),
    },
    mounted() {
        this.getArticleList();
    },
};
</script>
