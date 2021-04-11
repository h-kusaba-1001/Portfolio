<template>
    <!-- Hero -->
    <div>
        <v-lazy
            :options="this.$store.state.lazyOptions"
            :transition="this.$store.state.transitionStyle"
        >
            <v-parallax
                class=""
                height="500"
                dark
                src="img/front/home/hero.jpg"
            >
                <v-row
                    class="align-sm-start justify-sm-start align-center justify-center pt-sm-16 pl-sm-14"
                >
                    <v-col
                        class="text-sm-left text-center mt-sm-14 ml-sm-14"
                        cols="12"
                    >
                        <div
                            class="text-h4 black--text text--darken-1 font-weight-medium mb-2 mt-sm-0 mt-4 text-h2 text-sm-h1"
                            transition="slide-y-reverse-transition"
                        >
                            Develop for <br />
                            the Future.
                        </div>
                        <div
                            class="subheading black--text font-weight-medium text-h5 text-sm-h4"
                            transition="slide-y-reverse-transition"
                        >
                            H.Kusaba's Portfolio
                        </div>
                        <div
                            class="text-subtitle-1 subheading blue-grey--text text--lighten-4"
                            transition="slide-y-reverse-transition"
                        >
                            Christopher Columbus said, <br />
                            "Life has more imagination than carry in our
                            dreams."
                        </div>
                    </v-col>
                </v-row>
            </v-parallax>
        </v-lazy>
        <!-- このサイトについて -->
        <v-card elevation="2" outlined class="mt-3">
            <v-card-title class="text-h5 font-weight-thin">
                このサイトについて
            </v-card-title>
            <v-card-text>
                <div class="text--primary">
                    このサイトは、WEBエンジニア、草場裕史（くさばひろふみ）のポートフォリオサイトとなっております。<br />
                    <br />
                    今までの業界経験や知識を生かして、技術の集大成としてこちらを製作しました。<br />
                    下記githubもぜひご覧ください。<br />
                    <a
                        href="https://github.com/h-kusaba-1001/Portfolio"
                        target="_blank"
                        >https://github.com/h-kusaba-1001/Portfolio</a
                    ><br />
                    <br />
                    また、プロフィール等に関しては、Wantedlyに記載しています。<br />
                    こちらは会員登録されている方のみご覧になれますが、是非ご覧ください。<br />
                    <a
                        href="https://www.wantedly.com/users/56773143"
                        target="_blank"
                        >https://www.wantedly.com/users/56773143</a
                    ><br />
                </div>
            </v-card-text>
        </v-card>
    </div>
</template>

<script></script>
