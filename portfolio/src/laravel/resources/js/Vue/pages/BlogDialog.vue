<template lang="html">
    <v-layout>
        <v-dialog
            fullscreen
            hide-overlay
            v-model="postDialog"
            transition="dialog-bottom-transition"
        >
            <v-flex>
                <v-card v-if="!isLoading">
                    <v-toolbar fixed dark color="yellow darken-1">
                        <v-btn icon dark @click.stop="handleCloseDialog()">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-toolbar-title
                            class="toolbar-title"
                            @click.stop="handleCloseDialog()"
                        >
                            H.K's Portfolio Blog
                        </v-toolbar-title>
                        <!-- <v-spacer></v-spacer> -->
                        <!-- TODO Shareボタン対応 -->
                        <!-- <v-btn color="white" outline rounded flat @click="handleShare(article)">Share</v-btn> -->
                        <!-- <v-toolbar-items>
          </v-toolbar-items> -->
                    </v-toolbar>
                    <v-list three-line subheader style="padding-top: 10px">
                        <h1 class="px-3 font-weight-light text-h4">
                            {{ article.title }}
                        </h1>
                        <p class="text-right my-1 mr-5">
                            {{ article.created_at | date }}
                        </p>
                        <v-layout justify-center py-2 class="text-center">
                            <v-responsive max-width="600px">
                                <v-img
                                    :src="
                                        article.image_filepath
                                            ? article.image_filepath
                                            : '/img/front/noimage.jpg'
                                    "
                                ></v-img>
                            </v-responsive>
                        </v-layout>
                        <v-list-item-content
                            class="px-3"
                            v-html="article.content"
                        >
                        </v-list-item-content>
                    </v-list>
                    <v-divider></v-divider>
                    <!-- TODO タグボタン対応 -->
                    <!-- POST TAGS -->
                    <!-- <v-list v-if="article.metadata.post_tags" three-line subheader>
                    <v-subheader>Tags</v-subheader>
                    </v-list> -->
                    <!-- COMMENTS -->
                    <v-list three-line subheader>
                        <v-subheader
                            >コメント
                            {{ article.article_comments.length }}件</v-subheader
                        >
                        <template
                            v-for="(comment, i) in article.article_comments"
                        >
                            <v-divider class="my-1" :key="i" inset></v-divider>
                            <v-list-item>
                                <v-list-item-avatar>
                                    <v-icon color="primary" large
                                        >mdi-account</v-icon
                                    >
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title
                                        v-html="comment.name"
                                    ></v-list-item-title>
                                    <v-list-item-subtitle
                                        v-html="comment.content"
                                    ></v-list-item-subtitle>
                                </v-list-item-content>
                            </v-list-item>
                        </template>
                    </v-list>
                    <v-list class="py-3">
                        <v-subheader
                            >コメント欄
                            ※投稿されたコメントは、管理者の承認後に閲覧可能となります</v-subheader
                        >
                    </v-list>
                    <v-form
                        ref="commentForm"
                        v-model="validComment"
                        @submit.prevent="postComment()"
                        validation
                    >
                        <v-container fluid py-0>
                            <v-layout wrap>
                                <v-flex xs12 md6>
                                    <v-text-field
                                        filled
                                        prepend-icon="mdi-account"
                                        v-model="newComment.name"
                                        :rules="nameRules"
                                        :counter="25"
                                        label="お名前"
                                        required
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12 md6>
                                    <v-text-field
                                        filled
                                        prepend-icon="mdi-at"
                                        v-model="newComment.email"
                                        :rules="emailRules"
                                        label="メールアドレス (任意) ※メールアドレスは公開されません"
                                        required
                                    ></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field
                                        filled
                                        prepend-icon="mdi-comment-text"
                                        v-model="newComment.content"
                                        :rules="commentRules"
                                        label="コメント"
                                        :counter="200"
                                        required
                                    ></v-text-field>
                                    <v-flex class="text-right m-4">
                                        <v-btn
                                            type="submit"
                                            rounded
                                            depressed
                                            class="white--text"
                                            color="green lighten-1"
                                            :disabled="!validComment"
                                            >Post Comment</v-btn
                                        >
                                    </v-flex>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-form>
                </v-card>
            </v-flex>
        </v-dialog>
        <!-- SHARE MENU -->
        <!-- <div class="text-xs-center">
    <v-bottom-sheet v-model="shareSheet"> -->
        <!-- <v-btn
        slot="activator"
        color="purple"
        dark
      >
        Click me
      </v-btn> -->

        <!-- <v-list>
        <v-subheader>Share via..</v-subheader>
        <v-list-tile
          v-for="(sharer, i) in getShareLinks"
          :key="i"
          :href="sharer.link"
          target="_blank"
        >
          <v-list-tile-avatar>
            <v-avatar size="32px" tile>
              <v-icon>{{ sharer.icon }}</v-icon>
            </v-avatar>
          </v-list-tile-avatar>
          <v-list-tile-title>{{ sharer.title }}</v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-bottom-sheet>
  </div>
  -->
    </v-layout>
</template>

<script>
import { mapMutations, mapState } from "vuex";

export default {
    data: () => ({
        newComment: {
            name: "",
            email: "",
            content: "",
        },
        nameRules: [
            (v) => !!v || "お名前を入力してください",
            (v) => v.length <= 25 || "25文字以内で入力してください",
        ],
        emailRules: [
            (v) =>
                v.length === 0 ||
                /.+@.+/.test(v) ||
                "メールアドレスの形式が不正です",
        ],
        commentRules: [
            (v) => !!v || "コメント内容を入力してください",
            (v) =>
                v.length <= 200 ||
                "コメント内容は、200文字以内で入力して下さい",
        ],
        validComment: false,
        dialog: false,
        shareSheet: false,
    }),
    computed: {
        ...mapState(["isLoading", "postDialog"]),
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
        ...mapMutations([
            "gonnaLoading",
            "loaded",
            "getArticle",
            "setActiveArticle",
            "setInfoDialog",
            "setErrorDialogForValidation",
        ]),
        validForm() {
            if (
                this.$refs.commentForm !== "undefined" &&
                this.$refs.commentForm.validate()
            ) {
                this.validComment = true;
            } else {
                this.validComment = false;
            }
        },
        async postComment() {
            if (this.$refs.commentForm.validate()) {
                let param = {
                    article_id: this.article.id,
                    name: this.newComment.name,
                    email: this.newComment.email,
                    content: this.newComment.content,
                };
                await axios
                    .post("/api/comment/", param)
                    .then((response) => {
                        if (response.status === 200) {
                            // コメントを初期化
                            this.initComment();
                            this.setInfoDialog({
                                title: "コメントを投稿しました。",
                                message:
                                    "コメントが正しく投稿されました。\n システム管理者の確認後、反映されます。",
                            });
                        }
                    })
                    .catch((error) => {
                        // バリデーションメッセージが存在する場合
                        if (error.response.data.errors) {
                            this.setErrorDialogForValidation(
                                error.response.data.errors
                            );
                        }
                    });
            } else {
                return;
            }
        },
        initComment() {
            // コメントの内容のみ初期化する
            this.newComment = {
                name: this.newComment.name,
                email: this.newComment.email,
                content: "",
            };
        },
        // handleShare (post) {
        //   this.shareSheet = true
        //   const payload = { route: this.$route.path, post }
        //   this.$store.dispatch('buildShareLinks', payload)
        // },
        handleCloseDialog() {
            this.postDialog = false;
            this.$router.go(-1);
            this.$store.commit("setActiveArticle", null);
        },
    },
    props: {
        article: {
            type: Object,
            required: true,
            default: null,
        },
    },
    // metaInfo() {
    //     return {
    //         title: this.article.title,
    //         titleTemplate: "%s | " + process.env.VUE_APP_TITLE,
    //     };
    // },
};
</script>

<style lang="css">
.toolbar-title {
    cursor: pointer;
}
</style>
