<template lang="html">
  <v-layout row>
    <v-dialog
      fullscreen
      hide-overlay
      v-model="postDialog"
      transition="dialog-bottom-transition"
    >
      <v-flex>
      <v-card v-if="!isLoading">
        <v-toolbar fixed dark color="cyan darken-1">
          <v-btn icon dark @click.stop="handleCloseDialog()">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>{{ article.title }}</v-toolbar-title>
          <!-- <v-spacer></v-spacer> -->
          <!-- TODO Shareボタン対応 -->
          <!-- <v-btn color="white" outline rounded flat @click="handleShare(article)">Share</v-btn> -->
          <!-- <v-toolbar-items>
          </v-toolbar-items> -->
        </v-toolbar>
        <v-list three-line subheader style="padding-top: 10px;">
          <h1 class="hidden-md-and-up px-3 font-weight-light display-1">{{ article.title }}</h1>
          <v-layout
          row justify-center py-2
          class="text-xs-center">
            <v-responsive max-width="600px">
              <v-img
                :src="article.image_filepath
                  ? article.image_filepath : '/img/front/noimage.jpg'"
              ></v-img>
            </v-responsive>
          </v-layout>
          <p class="text-right my-1 mr-5">
            {{ article.created_at | date }}
          </p>
          <v-list-item-content class="px-3" v-html="article.content">
          </v-list-item-content>
        </v-list>
        <v-divider></v-divider>
        <!-- TODO タグボタン対応 -->
        <!-- POST TAGS -->
        <!-- <v-list v-if="article.metadata.post_tags" three-line subheader>
          <v-subheader>Tags</v-subheader>
        </v-list> -->
        <!-- COMMENTS -->
        <v-list three-line subheader>
        <v-subheader>{{ article.article_comments.length }} コメント</v-subheader>
         <template v-for="(comment, i) in article.article_comments">
           <v-divider
            :key="i"
            inset
           ></v-divider>
           <v-list-tile
             :key="comment.id"
             avatar
           >
             <v-list-tile-avatar>
               <v-icon color="primary" large>mdi-account-circle-outline</v-icon>
             </v-list-tile-avatar>

             <v-list-tile-content>
               <v-list-tile-title v-html="comment.username"></v-list-tile-title>
               <v-list-tile-sub-title v-html="comment.content"></v-list-tile-sub-title>
             </v-list-tile-content>
           </v-list-tile>
         </template>
       </v-list>
       <v-list class="py-0">
         <v-subheader>Post a comment</v-subheader>
       </v-list>
       <v-form ref="commentForm" v-model="validComment" @submit.prevent="postComment()" validation>
         <v-container fluid py-0>
           <v-layout row wrap>
             <v-flex
               xs12
               md6
             >
               <v-text-field
                 filled
                 prepend-icon="mdi-account"
                 v-model="newComment.name"
                 :rules="nameRules"
                 :counter="25"
                 label="First name"
                 required
               ></v-text-field>
             </v-flex>
             <v-flex
             xs12
             md6
             >
             <v-text-field
             filled
             prepend-icon="mdi-at"
             v-model="newComment.email"
             :rules="emailRules"
             label="E-mail"
             required
             ></v-text-field>
           </v-flex>
           <v-flex
             xs12
           >
             <v-text-field
               filled
               prepend-icon="mdi-comment-text"
               v-model="newComment.content"
               :rules="commentRules"
               label="Comment"
               :counter="200"
               required
             ></v-text-field>
             <div class="text-xs-right">
               <v-btn type="submit" rounded depressed class="white--text" color="green lighten-1" :disabled="!validComment">Post Comment</v-btn>
             </div>
           </v-flex>
           </v-layout>
         </v-container>
       </v-form>
      </v-card>
      </v-flex>
    </v-dialog>
    <!-- SHARE MENU -->
    <!-- <div class="text-xs-center">
    <v-bottom-sheet v-model="shareSheet"> -->
      <!-- <v-btn
        slot="activator"
        color="purple"
        dark
      >
        Click me
      </v-btn> -->

      <!-- <v-list>
        <v-subheader>Share via..</v-subheader>
        <v-list-tile
          v-for="(sharer, i) in getShareLinks"
          :key="i"
          :href="sharer.link"
          target="_blank"
        >
          <v-list-tile-avatar>
            <v-avatar size="32px" tile>
              <v-icon>{{ sharer.icon }}</v-icon>
            </v-avatar>
          </v-list-tile-avatar>
          <v-list-tile-title>{{ sharer.title }}</v-list-tile-title>
        </v-list-tile>
      </v-list> -->
    </v-bottom-sheet>
  </div>
  </v-layout>
</template>

<script>
import {mapGetters, mapMutations, mapState} from 'vuex'

export default {
  data: () => ({
    newComment: {
      name: '',
      email: '',
      content: ''
    },
    validComment: false,
    nameRules: [
      v => !!v || 'Name is required',
      v => v.length <= 25 || 'Name must be less than 25 characters'
    ],
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+/.test(v) || 'E-mail must be valid'
    ],
    commentRules: [
      v => !!v || 'Comment is required',
      v => v.length <= 200 || 'Comment must be less than 200 characters'
    ],
    dialog: false,
    shareSheet: false
  }),
  computed: {
    ...mapState([
      "isLoading",
      "postDialog"
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
    ...mapMutations([
      "gonnaLoading",
      "loaded",
      "getArticle",
      "setActiveArticle"
    ]),
    postComment () {
      if (this.$refs.commentForm.validate()) {
        this.$store.dispatch('postComment', {
          id: this.article._id,
          name: this.newComment.name,
          email: this.newComment.email,
          content: this.newComment.content,
          moderated: this.getSettings.metadata.moderated_comments
        }).then(() => {
          console.log('Posted New Comment!')
        })
      } else { return }
    },
    // handleShare (post) {
    //   this.shareSheet = true
    //   const payload = { route: this.$route.path, post }
    //   this.$store.dispatch('buildShareLinks', payload)
    // },
    handleCloseDialog () {
      this.postDialog = false
      this.$router.go(-1)
      this.$store.commit('setActiveArticle', null)
    },
  },
  props: {
    article: {
      type: Object,
      required: true,
      default: null
    },
  },
  metaInfo () {
    return {
      title: this.article.title,
      titleTemplate: '%s | '+process.env.VUE_APP_TITLE
    }
  },
}

</script>

<style lang="css">
div.v-dialog {
  background: rgba(0,0,0,0.5);
}
</style>
