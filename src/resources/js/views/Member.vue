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
                        v-model="comfirmEmail"
                        :rules="emailRules"
                        label="japan@email.com"
                        required
                        outlined
                    ></v-text-field>
                    <div>メールアドレスが{{matchEmail}}</div>
                </v-col>
                <v-col cols="2">パスワード</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="password"
                        v-bind:type="showPassword ? 'text' : 'password'"
                        @click:append="showPassword = !showPassword"
                        v-bind:append-icon="
                            showPassword ? 'mdi-eye' : 'mdi-eye-off'
                        "
                        :rules="passwordRules"
                        label="password"
                        required
                        outlined
                    ></v-text-field>
                </v-col>
                <v-col cols="4"></v-col>
                <v-col cols="8">
                    <v-text-field
                        v-model="comfirmPassword"
                        v-bind:type="showComfirmPassword ? 'text' : 'password'"
                        @click:append="
                            showComfirmPassword = !showComfirmPassword
                        "
                        v-bind:append-icon="
                            showComfirmPassword ? 'mdi-eye' : 'mdi-eye-off'
                        "
                        :rules="passwordRules"
                        label="password"
                        required
                        outlined
                    ></v-text-field>
                    <div>パスワードが{{matchPassword}}</div>
                </v-col>
                <v-col cols="2">性別</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-autocomplete
                        v-model="genderValue"
                        :items="gender"
                        :rules="requiredRules"
                        outlined
                    ></v-autocomplete>
                </v-col>
                <v-col cols="2">プログラミング経験</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <v-autocomplete
                        v-model="experienceValue"
                        :items="experience"
                        :rules="requiredRules"
                        outlined
                    ></v-autocomplete>
                </v-col>
                <v-col cols="2">スキル</v-col>
                <v-col cols="2" class="required">必須</v-col>
                <v-col cols="8">
                    <div class="card-body">
                        <template v-for="skill in skills" >
                        <v-checkbox
                        :key="skill.id"
                        :label="skill.skill"
                        :value="skill"
                        >
                        <span>
                        {{ skill.skill }}
                        </span>
                        </v-checkbox>
                        </template>
                    </div>
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
        showPassword: false,
        showComfirmPassword: false,
        userName: "",
        email: "",
        comfirmEmail: "",
        password: "",
        comfirmPassword: "",
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
            (v) => !!v || "password is required",
            (v) =>
                (v && v.length <= 16 && v.length >= 8) ||
                "パスワードは8文字以上16文字以下",
        ],
        requiredRules: [(v) => !!v || "入力必須です"],
        skills: {},
    }),

    computed: {
        matchEmail() {
            return this.email == this.comfirmEmail ? "一致しています":"一致していません"
        },
        matchPassword() {
            return this.password == this.comfirmPassword ? "一致しています":"一致していません"
        },
    },
    created() {      
    axios.get('/api/signup')
      .then((response)=>{
        this.skills = response.data.skills
      })
      .catch((err) => {
            console.log(err.response);
      });
    },

    methods: {
        validate() {
            this.$refs.form.validate();
            console.log(this.skills)
        },
        reset() {
            this.$refs.form.reset();
        },
        resetValidation() {
            this.$refs.form.resetValidation();
        },
        signup() {
            axios
                .post("/api/signup", {
                    name: this.userName,
                    email: this.email,
                    password: this.password,
                    gender: this.genderValue,
                    yop: this.experienceValue,
                })
                .then((res) => {
                    this.auth = false;
                    this.error = res.data.message;
                })
                .catch((err) => {
                    console.log(err.response);
                });
        },
    },
};
</script>

<style scoped>
.required {
    color: red;
}
</style>
