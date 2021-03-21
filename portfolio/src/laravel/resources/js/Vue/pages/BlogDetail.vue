<template>
<!-- <v-card hover flat @click="handlePostcard"> -->
<v-card hover flat>
  <v-img
    class="white--text"
    height="200px"
    :src="article.image_filepath ? 'storage/' + article.image_filepath : 'img/front/noimage.jpg'"
  >
    <v-container fill-height fluid>
      <v-layout fill-height>
        <v-flex xs12 align-end flexbox>
          <h2 class="headline" style="text-shadow: 0px 1px 1px #111;">{{ article.title }}</h2>
        </v-flex>
      </v-layout>
    </v-container>
  </v-img>
  <v-card-title>
    <div>
      <p class="grey--text">{{ article.created_at | date }}</p>
      <p>
        {{ article.content | truncate(200) | tailing('...') }}
      </p>
    </div>
  </v-card-title>
  <v-card-actions>
    <v-btn color="success" text outlined dark>
      <!-- {{ getSettings.metadata.read_more_button }} -->
    </v-btn>
  </v-card-actions>
</v-card>
</template>

<script>
import {mapGetters} from 'vuex'
export default {
  props: {
    article: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      // article: {
      //   // 
      // }
    }
  },
  computed: {
    // ...mapGetters([
    //   'getSettings'
    // ]),
    // postDialog: {
    //   get () {
    //     return this.$store.state.postDialog
    //   },
    //   set (val) {
    //     this.$store.commit('setPostDialog', val)
    //   }
    // }
  },
  methods: {
    // handlePostcard () {
    //   this.$router.push('/post/'+this.article.slug)
    //   this.$store.commit('setActivePost', this.article)
    //   this.$store.commit('setPostDialog', true)
    //   this.$store.dispatch('filter_PostComments', this.article._id)
    // }
  },
  created () {
    // console.log(this.article);
    // if (this.$route.params.id == this.article.slug) {
    //   this.$store.commit('setActivePost', this.article)
    //   this.$store.commit('setPostDialog', true)
    //   this.$store.dispatch('filter_PostComments', this.article._id)
    // }
  }
}
</script>

<style lang="css" scoped>
</style>