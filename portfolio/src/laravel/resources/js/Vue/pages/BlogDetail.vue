<template>
    <div class="mb-4">
        <v-card
            hover
            flat
            @click="handlePostcard"
            :transition="this.$store.state.transitionStyle"
        >
            <v-parallax
                class="white--text"
                :height="200"
                :src="
                    article.image_filepath
                        ? article.image_filepath
                        : '../img/front/noimage.jpg'
                "
            >
            </v-parallax>
            <v-card-title>
                <div>
                    <p class="grey--text">{{ article.created_at | date }}</p>
                    <h2 class="text-h5">{{ article.title }}</h2>
                    <p>
                        {{ article.content | truncate(200) | tailing("...") }}
                    </p>
                </div>
            </v-card-title>
        </v-card>
        <v-flex class="text-right mr-2">
            <like
                :likeNum="article.like_num"
                :todayLikeNumFromIp="article.today_like_num_from_ip"
                apiUrl="/api/like/article"
                :postParam="{
                    article_id: article.id,
                }"
                class="mr-4"
            >
            </like>
            <v-icon>mdi-chat-processing-outline</v-icon
            >{{ article.comment_num }}
        </v-flex>
    </div>
</template>

<script>
import { mapMutations } from "vuex";
import Like from "@/Vue/components/Like.vue";

export default {
    props: {
        article: {
            type: Object,
            required: true,
        },
    },
    components: { Like },
    data() {
        return {};
    },
    computed: {
        ...mapMutations(["getSettings"]),
        postDialog: {
            get() {
                return this.$store.state.postDialog;
            },
            set(val) {
                this.$store.commit("setPostDialog", val);
            },
        },
    },
    methods: {
        handlePostcard() {
            this.$router.push({
                name: "blogDetail",
                params: { id: this.article.id },
            });
            this.$store.commit("setActiveArticle", this.article);
            this.$store.commit("setPostDialog", true);
        },
    },
};
</script>

<style lang="css" scoped></style>
