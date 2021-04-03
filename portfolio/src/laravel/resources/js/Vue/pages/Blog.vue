<template>
  <v-container v-if="isLoading">
    <v-row>
      <v-col
        v-for="i in 6"
        :key="i"
        cols="12"
        lg="4"
        sm="6"
        xs="12"
      >
        <v-skeleton-loader
          v-for="n in 1"
          :key="n"
          type="image, article, button"
          class="mb-6"
        ></v-skeleton-loader>
      </v-col>
    </v-row>
  </v-container>
  <v-container v-else-if="articles.length === 0">
      <p>ブログ記事がありません。</p>
  </v-container>
  <v-container v-else>
    <v-layout row wrap>
      <v-flex xs12 sm6 lg4 pa-2 v-for="(article) in articles" :key="article._id">
        <blog-detail :article="article"></blog-detail>
      </v-flex>
       <blog-dialog
           v-if="getActiveArticle"
          :article="getActiveArticle"
        ></blog-dialog>
    </v-layout>

    <!-- pager -->
    <v-flex style="display: inline;"
      mt-2
      v-for="(link) in links"
      :key="link._id"
    >
      <v-btn
        @click="axiosArticle(link.url)"
        :disabled="link.url == null || link.active"
        v-html="link.label"
      >
        {{ link.label }}
      </v-btn>
    </v-flex>
  </v-container>
</template>

<script>
import {mapGetters, mapMutations, mapState} from "vuex"

export default {
  data () {
    return {
      articles: [],
      links: [],
    }
  },
  components: {

  },
  methods: {
    ...mapMutations([
      "gonnaLoading",
      "loaded",
    ]),
    async axiosArticle(url = "/api/article") {
      this.gonnaLoading();
      let response = await axios.get(url)
      this.articles = response.data.data
      this.links = response.data.links
      this.loaded();
    },
  },
  computed: {
    ...mapState([
      "isLoading"
    ]),
    ...mapGetters([
      'getActiveArticle'
    ]),
  },
  created() {
  },
  mounted() {
    this.axiosArticle();
  },
  metaInfo: {
    title: 'Home',
    titleTemplate: '%s | '+process.env.VUE_APP_TITLE
  }
}
</script>
