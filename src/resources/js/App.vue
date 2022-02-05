<template>
<div>

<header>
  <v-toolbar-title>
      &nbsp;&nbsp;
      <router-link to="/user/account">
        Account
      </router-link>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <router-link to="/user/login">
        Login
      </router-link>
  </v-toolbar-title>
</header>

<main>
  <router-view></router-view>
</main>

</div>
</template>

<script>
export default {
}
</script>