<template>
<div class="mx-auto p-2" style="max-width: 600px;">

  <v-card
    no-body
    header="ユーザ情報"
    header-bg-variant="primary"
    header-text-variant="white"
  >
    <v-card-text v-if="auth" class="p-2">
      <label>Name</label>
      <v-list-group-item class="mv-2">{{user.name}}</v-list-group-item>
      <label>Email</label>
      <v-list-group-item>{{user.email}}</v-list-group-item>
    </v-card-text>
    <v-card-text v-else class="p-2 text-danger">
      {{error.status}} {{error.statusText}}
    </v-card-text>
  </v-card>

</div>
</template>

<script>
  export default {
    data() {
      return {
        user: {},
        auth: false,
        error: {},
      }
    },
    created() {
      axios.get('/api/user/auth')
      .then((res) => {
        if (res.data.result) {
          this.user = res.data.user
          this.auth = true
        }
      })
      .catch((err) => {
        this.error = err.response
      })
    },
  }
</script>