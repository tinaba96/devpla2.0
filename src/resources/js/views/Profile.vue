<template>
    <v-container class="fullBg">
        <v-row>
            <v-col class="text-center">
                <h1>プロフィール</h1>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="2"></v-col>
            <v-col cols="3">
                <v-img
                    max-height="300"
                    max-width="300"
                    src=" https://snowman-1.s3.ap-northeast-1.amazonaws.com/devpla/default.png"
                    alt="profile_image"
                ></v-img>
                <br/>
                <div>名前</div>
                 <br/>
                 <div>フォロー数</div>
                 <div>フォロワー数</div>
                 <div>利用開始日</div>
                 <div>写真の編集</div>


                </v-col>
            <v-col cols="1"></v-col>
            <v-col cols="6">
                プロフィール
                <br />
                スキル
                <br />
                興味のある分野
                <br />
                学歴
                <br />
                職歴
                <br />
                資格
                <br/>
                <router-link>退会予定の方はこちら</router-link>
            </v-col>
            <v-col cols="2"> </v-col>
        </v-row>
    </v-container>
</template>

<style scoped>
.fullBg {
    background-color: aliceblue;
}
</style>
