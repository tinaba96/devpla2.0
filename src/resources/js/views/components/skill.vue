<template>
<div id="skill">
    <v-dialog
        v-model="dialog"
        width="500"
    >
    <template v-slot:activator="{ on, attrs }">
        <v-btn
        color="blue lighten-3"
        dark
        v-bind="attrs"
        v-on="on"
        >
        ITスキルを選択
        </v-btn>
    </template>
    <v-card
        v-if="dialog"
    >
        <v-card-title class="text-h5 grey lighten-2">
        自分のスキルを選んでください。
        </v-card-title>

        <div class="card-body">
            <template v-for="skill in skills" >
            <span>
            {{ skill.category_name }}
            </span>
            <v-checkbox
            v-model="selectedSkills"
            :key="skill.id"
            :label="skill.name"
            :value="skill"
            >
            </v-checkbox>
            </template>
        </div>

    <v-divider></v-divider>

    <v-card-actions>
    <v-spacer></v-spacer>

    <v-row>
        <v-col
            cols="12"
        >
            <v-chip
                v-for="skill, num) in selectedSkills"
                id="chip"
                :key="num"
                small
                close
                outlined
                color="primary"
                class="mr-2 mb-2 font-weight-bold"
                v-text="skill.name"
                />
        </v-col>
    </v-row>
            <v-btn
                color="primary"
                text
                @click="dialog = false; choose()"
            >
                登録
            </v-btn>

    </v-card-actions>
    </v-card>
    </v-dialog>


    <div
        class="mt-10"
        >
    <v-chip
        v-for="skill, num) in selectedSkills"
        id="chip"
        :key="num"
        small
        close
        outlined
        color="primary"
        class="mr-2 mb-2 font-weight-bold"
        v-text="skill.name"
        />
    </div>
</div>
</template>

<script>
export default {
  name:"skill",
  components: {},
  props: {
      skills: null
  },
//   data: function () {
//     return {}
//   },
    data: () => ({
        dialog: false,
        selectedSkills: [],
        experience: ["自己学習", "1年以上", "3年以上", "7年以上"], 
    }),
    methods: {
        choose() {
            console.log(this.selectedSkills)
        }

    }
}
</script>  