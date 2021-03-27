<template>
  <div>
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
            <br>
            今までの業界経験や知識を生かして、技術の集大成としてこちらを製作しました。<br>
            下記githubもぜひご覧ください。<br>
            <a href="https://github.com/h-kusaba-1001/Portfolio" target="_blank">https://github.com/h-kusaba-1001/Portfolio</a><br>
            <br>
            また、プロフィール等に関しては、Wantedlyに記載しています。<br>
            こちらは会員登録されている方のみご覧になれますが、是非ご覧ください。<br>
            <a href="https://www.wantedly.com/users/56773143" target="_blank">https://www.wantedly.com/users/56773143</a><br>
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