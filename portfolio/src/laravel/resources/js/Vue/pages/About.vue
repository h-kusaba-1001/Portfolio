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
                <div class="text-subtitle-1">ライブラリ</div>
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
