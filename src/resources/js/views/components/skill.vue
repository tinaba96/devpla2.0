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
            @click="yoeModal=true; showYoeSelection(skill)"
            >
            </v-checkbox>

            <div
                v-if="yoeModal && selectedYoe === skill "
                max-width="60%"
                style="z-index:2;"
            >
                        <v-btn
                            v-for="(yoe, index) in experience"
                            @click="yoeModal=false; addYoe(yoe)"
                            :key="index"
                            >
                            {{ yoe }}
                        </v-btn>
            <br>
            <br>
            </div>
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
                v-for="(skill, num) in selectedSkills"
                id="chip"
                :key="num"
                small
                close
                outlined
                color="primary"
                class="mr-2 mb-2 font-weight-bold"
                >
                {{ skill.name }}
                【{{ skill.yoe }}】
            </v-chip>
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
        v-for="(skill, num) in selectedSkills"
        id="chip"
        :key="num"
        small
        close
        outlined
        color="primary"
        class="mr-2 mb-2 font-weight-bold"
        >
        {{ skill.name }}
        【{{ skill.yoe }}】
    </v-chip>
    </div>
</div>
</template>

<script>
export default {
  name:"skill",
  components: {},
  props: {
      skills: null,
  },
//   data: function () {
//     return {}
//   },
    data: () => ({
        selectedYoe: null,
        dialog: false,
        yoeModal: false,
        experience: ["自己学習", "1年以上", "3年以上", "7年以上"], 
        selectedSkills: []
    }),
    methods: {
        choose() {
            // console.log(this.selectedSkills)
            this.$emit("selectedSkills", this.selectedSkills)
        },
        showYoeSelection(skill) {
            this.selectedYoe = skill
        },
        addYoe(yoe) {
            this.selectedSkills.slice(-1)[0]['yoe'] = yoe
            // console.log(this.selectedSkills)
        }
    }
}
</script>  