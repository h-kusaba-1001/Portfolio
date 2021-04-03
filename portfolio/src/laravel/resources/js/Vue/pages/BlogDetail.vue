<template>
<v-card hover flat
  @click="handlePostcard"
  :transition="this.$store.state.transitionStyle"
>
  <v-parallax
    class="white--text"
    :height="200"
    :src="article.image_filepath
        ? 'storage/' + article.image_filepath : 'img/front/noimage.jpg'"
  >
  </v-parallax>
  <v-card-title>
    <div>
      <p class="grey--text">{{ article.created_at | date }}</p>
  　　<h2 class="headline">{{ article.title }}</h2>
      <p>
        {{ article.content | truncate(200) | tailing('...') }}あああ
      </p>
    </div>
  </v-card-title>
</v-card>
</template>

<script>
import {mapMutations} from 'vuex'

export default {
  props: {
    article: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
    }
  },
  computed: {
    ...mapMutations([
      'getSettings'
    ]),
    postDialog: {
      get () {
        return this.$store.state.postDialog
      },
      set (val) {
        this.$store.commit('setPostDialog', val)
      }
    }
  },
  methods: {
    handlePostcard () {
      this.$router.push({ name: "Article", params: { id: this.article.id } })
      this.$store.commit('setActiveArticle', this.article)
      this.$store.commit('setPostDialog', true)
    }
  },
  created () {
  }
}
</script>

<style lang="css" scoped>
</style>
