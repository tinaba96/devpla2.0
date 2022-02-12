<template>
  <v-card width="400px" class="mx-auto mt-5">
    <v-card-title>
      <h3>新規登録</h3>
    </v-card-title>
    <v-card-text>
      <v-form>
        <v-text-field
          prepend-icon="mdi-account-circle"
          label="name"
          v-model="form.name"
        />
        <v-text-field
          prepend-icon="mdi-email"
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
          <v-btn @click="signup" class="ma-5">新規会員登録</v-btn>
        </v-row>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      showPassword: false,
      form: {
          name: '',
          email: '',
          password: '',
        },
    };
  },
  methods: {
    signup() {
        axios.post('/api/signup', {form: this.form})
        .then((res) => {
          this.auth = false
          this.error = res.data.message
        })
        .catch((err) => {console.log(err.response)})
      },
  },
};
</script>