<template>
    <div>
        <v-layout>
            <v-dialog
                v-model="infoDialog.showDialog"
                transition="dialog-bottom-transition"
                max-width="450"
            >
                <v-card>
                    <v-toolbar :color="infoDialog.color" class="white--text">
                        {{ infoDialog.title }}
                    </v-toolbar>
                    <v-card-text>
                        <div
                            class="text-subtitle-2 pt-2"
                            style="white-space: pre-line"
                        >
                            {{ infoDialog.message }}
                        </div>
                    </v-card-text>
                    <v-card-actions class="justify-end">
                        <v-btn text @click="diappearInfoDialog">OK</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-layout>
    </div>
</template>

<script>
import { mapMutations } from "vuex";

export default {
    computed: {
        infoDialog: {
            get() {
                return this.$store.state.infoDialog;
            },
        },
    },
    methods: {
        ...mapMutations(["diappearInfoDialog", "initInfoDialog"]),
    },
};
</script>
