<template>
  <div>
    <v-toolbar
      class="blue-grey darken-1"
      prominent
      src="/img/front/common/Navigation/navigation.jpg"
    >
      <v-app-bar-nav-icon @click="displaySideBar = !displaySideBar"></v-app-bar-nav-icon>

      <v-toolbar-title>H.Kusaba's Portfolio</v-toolbar-title>

      <v-spacer></v-spacer>
      <navigation-heart></navigation-heart>
    </v-app-bar>
    <v-navigation-drawer
        v-model="displaySideBar"
        fixed
        temporary
        bottom
      >
        <v-list
          nav
        >
          <v-list-item-group>
            <router-link to="/">
              <v-list-item>
                <v-list-item-title>HOME</v-list-item-title>
              </v-list-item>
            </router-link>
            <router-link to="/about">
              <v-list-item>
                <v-list-item-title>ABOUT</v-list-item-title>
              </v-list-item>
            </router-link>
            <router-link to="/blog">
              <v-list-item>
                <v-list-item-title>BLOG</v-list-item-title>
              </v-list-item>
            </router-link>
          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>
  </div>
</template>

<script>
import NavigationHeart from './NavigationHeart.vue'
export default {
  components: { NavigationHeart },
  data() {
    return {
      displaySideBar: false,
    }
  }
}
</script>
