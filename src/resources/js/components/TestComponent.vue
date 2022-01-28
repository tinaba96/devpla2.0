<template>
<div>

<header>
  <b-navbar type="dark" variant="primary">
    <b-navbar-brand id="brand" class="mr-auto">Test</b-navbar-brand>
      <b-navbar-nav>
        <b-nav-item to="/user/account">Account</b-nav-item>
        <b-nav-item to="/user/login">Login/Logout</b-nav-item>
      </b-navbar-nav>
  </b-navbar>
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