<template>
<div class="mx-auto p-2" style="max-width: 600px;">

  <v-card
    header-bg-variant="primary"
    header-text-variant="white"
  >
    <template #header>
      Login
    </template>
    <v-card-text v-if="!auth">
      <form @submit.prevent="login">
        <v-row class="my-1">
          <v-col sm="3">
            <label for="input-email">Email</label>
          </v-col>
          <v-col sm="3">
            <input
              v-model="form.email"
              type="text"
              id="input-email"
            >
          </v-col>
        </v-row>
        <v-row class="my-1">
          <v-col sm="3">
            <label for="input-password">Password</label>
          </v-col>
          <v-col sm="9">
            <input
              v-model="form.password"
              type="password"
              autocomplete="new-password"
              id="input-password"
            >
          </v-col>
        </v-row>
        <v-alert v-if="error" show variant="danger">{{ error }}</v-alert>
        <v-btn type="submit" variant="primary" class="float-right">ログイン</v-btn>
      </form>
    </v-card-text>
    <v-card-text v-else>
      <p>ログインしています</p>
      <v-button @click="logout" class="float-right">ログアウト</v-button>
    </v-card-text>    
  </v-card>

</div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          email: '',
          password: '',
        },
        error: '',
        auth: false,
      }
    },
    created() {
      axios.get('/api/user/auth')
      .then((res) => {
        if (res.data.result) {
          this.auth = true
        }
      })
      .catch((err) => {
      })
    },
    methods: {
      login() {
        this.error = ''
        axios.get('/sanctum/csrf-cookie')
        .then((res) => {
          axios.post('/api/user/login', this.form)
          .then((res) => {
            if (!res.data.result) {
              this.error = res.data.message
            } else {
              this.auth = true
            }
          })
          .catch((err) => {console.log(err.response)})
        })
        .catch((err) => {console.log(err.response)})
      },
      logout() {
        axios.post('/api/user/logout')
        .then((res) => {
          this.auth = false
          this.error = res.data.message
        })
        .catch((err) => {console.log(err.response)})
      },
    }
  }
</script>
