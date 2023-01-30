<template>
    <div>
    <h3 width="400px" class="mx-auto mt-5">ようこそアプリ博物館へ</h3>
    <v-text-field>
    <v-icon
      slot="prepend"
      color="green"
    >
      mdi-magnify
    </v-icon>
    </v-text-field>
    <v-row>
        <v-col
          v-for="(item, i) in items"
          :key="i"
          class="d-flex"
          cols="12"
          sm="6"
          md="6"
          lg="4"
        >
          <v-card
            outlined
            max-width="100%"
            height="100%"
            class="d-flex flex-column"
          >
            <v-img :src="item.img" style="max-height:214px" height="214px" />
            <v-card-title
              class="justify-center"
              v-text="item.title"
            />
            <v-card-text
              :style="'font-size:0.9rem'"
              height="100%"
              v-html="item.text"
            />
            <v-spacer />
            <v-card-actions class="mb-7">
              <a :href="item.link" target="_blank" style="text-decoration: none">
                <v-btn
                  text
                  color="primary"
                  class="mb-5"
                  :style="'font-size:1.0rem'"
                >
                  <span>{{ item.description }}</span>
                </v-btn>
              </a>
            </v-card-actions>
          </v-card>
        </v-col>
    </v-row>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        items: [
        {
          title: 'GUNNERS NEWS',
          text: 'サッカー専用ニュースアプリ',
          img: '../../images/gunnersNews.png',
          link: 'https://apps.apple.com/app/id1604017010?mt=8',
          description: 'リンク',
        },        {
          title: 'Devpla',
          text: 'エンジニアのマッチングプラットフォーム',
          img: '../../images/devpla.png',
          link: 'https://?????????',
          description: 'リンク',
        },        {
          title: 'fnews',
          text: 'ニュースアプリ',
          img: '../../images/fNews.png',
          link: 'https://apps.apple.com/us/app/fnews/id1620889511',
          description: 'リンク',
        },
        {
          title: 'ネーム1',
          text: 'テキス1トテキスト1テキスト1テキスト1テキスト1。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム2',
          text: 'テキス2トテキスト2テキスト2テキスト2テキスト2。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム3',
          text: 'テキス3トテキスト3テキスト3テキスト3テキスト3。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },
        {
          title: 'ネーム1',
          text: 'テキス1トテキスト1テキスト1テキスト1テキスト1。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム2',
          text: 'テキス2トテキスト2テキスト2テキスト2テキスト2。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム3',
          text: 'テキス3トテキスト3テキスト3テキスト3テキスト3。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },
        {
          title: 'ネーム1',
          text: 'テキス1トテキスト1テキスト1テキスト1テキスト1。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム2',
          text: 'テキス2トテキスト2テキスト2テキスト2テキスト2。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム3',
          text: 'テキス3トテキスト3テキスト3テキスト3テキスト3。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },
        {
          title: 'ネーム1',
          text: 'テキス1トテキスト1テキスト1テキスト1テキスト1。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        },        {
          title: 'ネーム2',
          text: 'テキス2トテキスト2テキスト2テキスト2テキスト2。',
          img: "https://picsum.photos/id/20/1920/1080?blur=5",
          link: 'https://?????????',
          description: 'ボタンの中身',
        }
        

      ]
      }
    },
  }
</script>
