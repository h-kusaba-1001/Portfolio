<template>
  <v-btn icon v-if="isEnableLike !== false" @click="like()">
    <v-icon>mdi-heart-outline</v-icon>
    {{ likeNum }}
  </v-btn>
  <div v-else class="text-center d-flex align-center justify-space-around">
    <v-tooltip bottom>
    <template v-slot:activator="{ on, attrs }">
      <v-btn
          icon
          v-bind="attrs"
          v-on="on"
      >
        <v-icon>mdi-heart</v-icon>
        {{ likeNum }}
      </v-btn>
    </template>
    <span>いいねは1日1回のみ可能です</span>
    </v-tooltip>
  </div>
</template>

<script>
import { mapMutations } from 'vuex'

export default {
  data() {
    return {
        isEnableLike: false,
        likeNum: 0,
    }
  },
  methods: {
    ...mapMutations([
      "gonnaLoading",
      "loaded",
    ]),
    async getLikeInfo() {
      this.gonnaLoading();
      await axios.get("/api/like/blog")
        .then(response => {
            this.isEnableLike = response.data.isEnableLike;
            this.likeNum = response.data.likeNum;
        })
      .catch(error => {
        //
      })
      this.loaded();
    },
    async like() {
      console.log("like!")
      // TODO 言い値機能を実装する
    },
  },
  mounted() {
    this.getLikeInfo();
  }
}
</script>
