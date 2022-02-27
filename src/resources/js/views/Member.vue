<template>
    <v-container>
        <v-row>
            <v-col class="text-center">
                <h1>アカウント登録</h1>
            </v-col>
        </v-row>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-row justify="center">
                <v-col cols="2">ユーザー名</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="userName"
                        :counter="10"
                        :rules="nameRules"
                        label="山田太郎"
                        required
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols="2">メールアドレス</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="japan@email.com"
                        required
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols="4"></v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="japan@email.com"
                        required
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols="2">パスワード</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="password"
                        :rules="passwordRules"
                        label="password"
                        type="password"
                        required
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols="4"></v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="password"
                        :rules="passwordRules"
                        label="password"
                        type="password"
                        required
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols="2">性別</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-autocomplete
                        v-model = "genderValue"
                        :items="gender"
                        :rules="requiredRules"
                        required
                        outlined
                    ></v-autocomplete>
                </v-col>
                <v-col cols="2">プログラミング経験</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-autocomplete
                        v-model = "experienceValue"
                        :items="experience"
                        :rules="requiredRules"
                        required
                        outlined
                    ></v-autocomplete>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="text-center">
                    <v-btn @click="signup">以上の内容で会員登録する</v-btn>
                </v-col>
            </v-row>
        </v-form>
        <v-btn
            :disabled="!valid"
            color="success"
            class="mr-4"
            @click="validate"
        >
            Validate
        </v-btn>
        <v-btn color="error" class="mr-4" @click="reset"> Reset Form </v-btn>
        <v-btn color="warning" @click="resetValidation">
            Reset Validation
        </v-btn>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        valid: true,
        userName: "",
        email: "",
        password: "",
        gender: ["男性", "女性"],
        genderValue: null,
        experience: ["1年未満", "1~3年", "4~10年", "11年以上"], // if you change the wording, you need to change SignupController as well
        experienceValue: null,
        nameRules: [
            (v) => !!v || "Name is required",
            (v) =>
                (v && v.length <= 10) || "Name must be less than 10 characters",
        ],
        emailRules: [
            (v) => !!v || "E-mail is required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],
        passwordRules: [
            (v) =>
                /^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\\d)[a-zA-Z\\d]{8,32}$/.test(
                    v
                ) ||
                "半角の大文字/小文字/記号をそれぞれ1つ以上含む8文字以上32文字以下の文字列",
        ],
        requiredRules: [(v) => !!v || "入力必須です"],
    }),
    methods: {
        validate() {
            this.$refs.form.validate();
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
        signup() {
        axios.post('/api/signup', {
           name: this.userName,
           email: this.email,
           password: this.password,
           gender: this.genderValue,
           yop: this.experienceValue,
           })
        .then((res) => {
          this.auth = false
          this.error = res.data.message
        })
        .catch((err) => {console.log(err.response)})
      },
    },
};
</script>

<style scoped>
.required {
    color: red;
}
</style>
