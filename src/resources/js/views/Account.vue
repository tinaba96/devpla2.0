<template>
    <v-container>
        <v-row>
            <v-col class="text-center">
                <h1>プロフィール</h1>
            </v-col>
        </v-row>
            <v-row justify="center">
                <v-col cols="4">ユーザー名</v-col>
                <v-col cols="8">{{user.name}}</v-col>
                <v-col cols="4">メールアドレス</v-col>
                <v-col cols="8">{{user.email}}</v-col>
                <v-col cols="4">性別</v-col>
                <v-col cols="8">{{user.gender}}</v-col>
                <v-col cols="4">プログラミング経験</v-col>
                <v-col cols="8">{{user.yop}}</v-col>
            </v-row>
    </v-container>
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