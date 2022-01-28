<template>
<div class="mx-auto p-2" style="max-width: 600px;">

  <b-card
    no-body
    header="ユーザ情報"
    header-bg-variant="primary"
    header-text-variant="white"
  >
    <b-card-text v-if="auth" class="p-2">
      <label>Name</label>
      <b-list-group-item class="mb-2">{{user.name}}</b-list-group-item>
      <label>Email</label>
      <b-list-group-item>{{user.email}}</b-list-group-item>
    </b-card-text>
    <b-card-text v-else class="p-2 text-danger">
      {{error.status}} {{error.statusText}}
    </b-card-text>
  </b-card>

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