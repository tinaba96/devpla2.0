<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list rounded>
        <v-subheader>メニュー</v-subheader>
        <v-list-item-group color="primary">
          <div v-for="page in pages" :key="page.name">
            <router-link :to="page.url"><v-list-item>{{ page.name }}</v-list-item></router-link>
          </div>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>devpla2.0</v-toolbar-title>
    </v-app-bar>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: null,
      pages: [
        {
          name: "ログイン",
          url: "/user/signin",
        },
        {
          name: "新規登録",
          url: "/signup",
        },
        {
          name: "アカウント",
          url: "/user/account",
        },
        {
          name: "アカウント登録",
          url: "/member",
        },
        {
          name: "プロフィール",
          url: "/profile",
        },
        {
          name: "退会",
          url: "/withdrawal",
        },
      ],
    };
  },
};
</script>
