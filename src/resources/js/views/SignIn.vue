<template>
  <v-card width="400px" class="mx-auto mt-5">
    <v-card-title>
      <h3>ログイン画面</h3>
    </v-card-title>
    <v-card-text v-if="!auth">
      <v-form>
        <v-text-field
          prepend-icon="mdi-account-circle"
          label="email"
          v-model="form.email"
        />
        <v-text-field
          v-bind:type="showPassword ? 'text' : 'password'"
          @click:append="showPassword = !showPassword"
          prepend-icon="mdi-lock"
          v-bind:append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          label="パスワード"
          v-model="form.password"
        />
        <v-row class="justify-center">
          <v-btn @click="login" variant="primary" class="ma-5">ログイン</v-btn>
          <v-btn class="ma-5"><router-link to="/signup">新規会員登録</router-link></v-btn>
        </v-row>
        <br>
      </v-form>
    </v-card-text>
    <v-card-text v-else>
      <p>ログインしています</p>
      <v-button @click="logout" class="float-right">ログアウト</v-button>
    </v-card-text>
  </v-card>
</template>

<script>
  export default {
    data() {
      return {
        showPassword: false,
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
