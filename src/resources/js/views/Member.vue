<template>
    <v-container>
        <v-row>
            <v-col class="text-center">
                <h1>アカウント登録</h1>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="2">ユーザー名</v-col>
            <v-col cols="2" class="required">必須</v-col>
            <v-col cols="8">
                <v-text-field
                    v-model="name"
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
                    :rules="passWordRules"
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
                    :rules="passWordRules"
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
                    :items="gender"
                    required
                    outlined
                ></v-autocomplete>
            </v-col>
            <v-col cols="2">プログラミング経験</v-col>
            <v-col cols="2" class="required">必須</v-col>
            <v-col cols="8">
                <v-autocomplete
                    :items="experience"
                    required
                    outlined
                ></v-autocomplete>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        valid: true,
        name: "",
        email: "",
        password:"",
        gender: ['男性', '女性'],
        experience:['1年未満','1~3年','4~10年'],
        nameRules: [
            (v) => !!v || "Name is required",
            (v) =>
                (v && v.length <= 10) || "Name must be less than 10 characters",
        ],
        emailRules: [
            (v) => !!v || "E-mail is required",
            (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
        ],
        passWordRules:[

        ]
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
    },
};
</script>

<style scoped>
.required{
    color:red
}
</style>
