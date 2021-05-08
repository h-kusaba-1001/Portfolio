<template>
    <div>
        <!-- 使用技術 -->
        <v-card elevation="2" outlined class="mt-3 text-sm-left text-center">
            <v-card-title class="text-h5 font-weight-thin">
                使用技術
            </v-card-title>
            <v-card-text>
                <div class="text-subtitle-1">環境等</div>
                <p class="text-body-1 text--primary">
                    ・docker(WSL2)<br />
                    ・heroku<br />
                    ・GitHub
                </p>
                <div class="text-subtitle-1">言語</div>
                <p class="text-body-1 text--primary">
                    ・PHP<br />
                    ・JavaScript
                </p>
                <div class="text-subtitle-1">フレームワーク</div>
                <p class="text-body-1 text--primary">
                    ・Laravel<br />
                    ・Vue.js
                </p>
                <div class="text-subtitle-1">主要ライブラリ</div>
                <p class="text-body-1 text--primary">・Vuetify</p>
                <!-- icons -->
                <v-divider></v-divider>
                <v-lazy
                    :options="this.$store.state.lazyOptions"
                    :transition="this.$store.state.transitionStyle"
                >
                    <div>
                        <v-avatar
                            size="60"
                            tile
                            class="ma-2"
                            v-for="(icon, i) in icons"
                            :key="i"
                        >
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on }">
                                    <img
                                        :src="icon.src"
                                        :alt="icon.alt"
                                        v-on="on"
                                    />
                                </template>
                                <span>{{ icon.alt }}</span>
                            </v-tooltip>
                        </v-avatar>
                    </div>
                </v-lazy>
            </v-card-text>
        </v-card>
        <!-- 概要 -->
        <v-card elevation="2" outlined class="mt-3 text-left">
            <v-card-title class="text-h5 font-weight-thin"> 概要 </v-card-title>
            <v-card-text class="text-body-1 text--primary">
                私、草場裕史の技術的なポートフォリオになります。<br />
                <br />
                普通のポートフォリオサイトだと、あまりデータベースを使わないようですので、ブログ機能などでデータベースを使用する意味を持たせています。<br />
                <br />
                企画・要件定義からデザイン・実装まで、一気通貫で私が行いました。<br />
                いいね機能などの、口頭でお伝えしにくい遊び心もお伝えできればいいなと思います。<br />
                <br />
                製作時間を厳密に計っていませんが、要件定義・環境構築を含めると、80~160時間の間くらいかと思います。(120時間程度?)
            </v-card-text>
        </v-card>
        <!-- おもな見どころ -->
        <v-card elevation="2" outlined class="mt-3 text-left">
            <v-card-title class="text-h5 font-weight-thin">
                おもな見どころ
            </v-card-title>
            <v-card-text class="text-body-1 text--primary">
                ・レスポンシブ対応 (スマホレイアウト対応)<br />
                ・md形式のブログ<br />
                ・画像のLazy Load<br />
                ・承認機能付きのブログコメント<br />
                ・IPアドレスでアクセスユーザを判別する、ログイン機能なしの1日1いいねの機能<br />
                ・他のプロダクトへの再利用を前提とした、可読性・保守性を考慮したコーディング<br />
                ・デザイン
            </v-card-text>
        </v-card>
        <!-- 新しくチャレンジしたこと -->
        <v-card elevation="2" outlined class="mt-3 text-left">
            <v-card-title class="text-h5 font-weight-thin">
                新しくチャレンジしたこと
            </v-card-title>
            <v-card-text class="text-body-1 text--primary">
                ・SPA<br />
                ・laravel-form-builder を使用したform定義・バリデーション
                (管理画面)<br />
                ・HerokuでのWEB系プロダクトのリリース<br />
                ・アセットファイルのgzip圧縮化<br />
                ・laravel-mix向けのeslint、php-cs-fixerのセッティング
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            icons: [
                {
                    alt: "Docker",
                    src: "/img/front/home/programs/docker.svg",
                },
                {
                    alt: "heroku",
                    src: "/img/front/home/programs/heroku-4.svg",
                },
                {
                    alt: "GitHub",
                    src: "/img/front/home/programs/github-icon-1.svg",
                },
                {
                    alt: "PHP",
                    src: "/img/front/home/programs/php.svg",
                },
                {
                    alt: "JavaScript",
                    src: "/img/front/home/programs/javascript-4.svg",
                },
                {
                    alt: "Laravel",
                    src: "/img/front/home/programs/laravel-2.svg",
                },
                {
                    alt: "Vue.js",
                    src: "/img/front/home/programs/vue-js-1.svg",
                },
                {
                    alt: "Vuetify",
                    src: "/img/front/home/programs/vuetify.svg",
                },
            ],
        };
    },
};
</script>
