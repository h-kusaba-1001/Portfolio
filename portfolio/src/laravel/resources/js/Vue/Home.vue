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
          <div class="display-1 black--text text--darken-1 font-weight-medium mb-2 mt-sm-0 mt-4 text-h2 text-sm-h1" transition="slide-y-reverse-transition">
            Develop for <br>
            the Future.
          </div>
          <div class="subheading black--text font-weight-medium text-h5 text-sm-h4" transition="slide-y-reverse-transition">
            H.Kusaba's Portfolio
          </div>
          <div class="subtitle-1 subheading blue-grey--text text--lighten-4" transition="slide-y-reverse-transition">
            Christopher Columbus said, <br>
            "Life has more imagination than carry in our dreams."
          </div>
        </v-col>
      </v-row>
      </v-parallax>
    </v-lazy>
    <!-- このサイトについて -->
    <v-card elevation="2"
      outlined
      class="mt-3"
      >
        <v-card-title class="headline font-weight-thin">
          このサイトについて
        </v-card-title>
        <v-card-text>
          <div class="text--primary">
            このサイトは、WEBエンジニア、草場裕史（くさば　ひろふみ）のポートフォリオサイトとなっております。<br>
            所有技術や、プロフィールも用意しておりますので、是非ご覧ください。<br>
          </div>
        </v-card-text>
      </v-card>
      <!-- 使用技術 -->
    <v-card
      elevation="2"
      outlined
      class="mt-3 text-sm-left text-center"
      >
      <v-card-title class="headline font-weight-thin">
        使用技術
      </v-card-title>
      <v-card-text>
        <div class="subtitle-1">環境等</div>
        <p class="body-1 text--primary">
          ・docker(WSL2)<br>
          ・heroku<br>
          ・GitHub
        </p>
        <div class="subtitle-1">言語</div>
        <p class="body-1 text--primary">
          ・PHP<br>
          ・JavaScript
        </p>
        <div class="subtitle-1">フレームワーク</div>
        <p class="body-1 text--primary">
          ・Laravel<br>
          ・Vue.js
        </p>
        <div class="subtitle-1">ライブラリ</div>
        <p class="body-1 text--primary">
          ・Vuetify
        </p>
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
                  >
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
    data () {
      return {
        icons: [
          {
            alt: "Docker",
            src: '/img/front/home/programs/docker.svg',
          },
          {
            alt: "heroku",
            src: '/img/front/home/programs/heroku-4.svg',
          },
          {
            alt: "GitHub",
            src: '/img/front/home/programs/github-icon-1.svg',
          },
          {
            alt: "PHP",
            src: '/img/front/home/programs/php.svg',
          },
          {
            alt: "JavaScript",
            src: '/img/front/home/programs/javascript-4.svg',
          },
          {
            alt: "Laravel",
            src: '/img/front/home/programs/laravel-2.svg',
          },
          {
            alt: "Vue.js",
            src: '/img/front/home/programs/vue-js-1.svg',
          },
          {
            alt: "Vuetify",
            src: '/img/front/home/programs/vuetify.svg',
          },
        ],
      }
    },
  }
</script>