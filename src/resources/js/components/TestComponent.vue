<template>
<div>

<header>
  <v-navbar type="dark" variant="primary">
    <v-navbar-brand id="brand" class="mr-auto">Test</v-navbar-brand>
      <v-navbar-nav>
        <v-nav-item to="/user/account">Account</v-nav-item>
        <v-nav-item to="/user/login">Login/Logout</v-nav-item>
      </v-navbar-nav>
  </v-navbar>
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