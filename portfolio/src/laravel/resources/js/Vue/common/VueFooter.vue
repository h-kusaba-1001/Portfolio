<template>
  <v-footer
    dark
    padless
  >
    <v-card
      flat
      tile
      class="light-blue lighten-3 white--text col-12 pa-0"
    >
      <v-card-text class="text-center">
        <v-avatar
          tile
          size="60"
          class="ma-2"
          v-for="(icon, i) in icons"
          :key="i"
        >
          <v-tooltip bottom>
            <template v-slot:activator="{ on }">
              <a v-bind:href="icon.link" target="_blank">
                <v-img
                  height="45"
                  width="46"
                  :src="icon.src"
                  v-on="on"
                >
                </v-img>
              </a>
            </template>
            <span>{{ icon.tooltip }}</span>
          </v-tooltip>
        </v-avatar>
      </v-card-text>

      <v-card-text class="text-center px-md-16 blue-grey--text text--darken-2">
        <div class="">
          <v-avatar 
            size="80"
            class="">
          <img
            src="/img/front/common/Footer/me.jpg"
            alt="Author is Kusaba"
          >
          </v-avatar>
          <div class="text-h6">草場 裕史</div>
        </div>
        <div class=" mt-1 px-md-16 mx-md-auto justify-center text-left col-md-6">
            93年生まれのWEBエンジニア。<br>
            長崎県佐世保市出身、大阪市在住。大学で関西に来て、はや8年。<br>
            社会人として、一時は銀行員として身を置くも、自分のポテンシャルとやりたいことを信じ、エンジニアの門を叩く。<br>
            業界に入って半年で基本情報技術者、2年で応用情報を取得。<br>
            <br>
            普段は、PHPをメインに、業務系やECのWEB開発をしています。<br>
            趣味はゲームで、最近面白かったゲームは「Among Us」です。<br>
        </div>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-text class="yellow darken-1 white--text text-center">
        2021 — <strong>H.Kusaba's Portfolio</strong> by Hirofumi Kusaba
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
  export default {
    data: () => ({
      icons: [
        {
          tooltip: "GitHubを見る",
          src: "/img/front/common/Footer/icon/github.svg",
          link: 'https://github.com/h-kusaba-1001',
        },
        {
          tooltip: "Wantedlyを見る",
          src: "/img/front/common/Footer/icon/wantedly_mark_white.svg",
          link: 'https://www.wantedly.com/users/56773143',
        },
      ],
    }),
  }
</script>