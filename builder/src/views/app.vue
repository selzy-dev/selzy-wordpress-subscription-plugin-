<template>
    <div class="b-selzy-app__wrap">
        <div class="b-selzy-app__header">
            <v-row>
                <v-col cols="2">
                    <div class="b-table-colm-title">
                        <strong>
                            {{ $t('field.position') }}
                        </strong>
                    </div>
                </v-col>
                <v-col cols="4">
                    <div class="b-table-colm-title">
                        <strong>
                            {{ $t('field.header') }}
                        </strong>
                    </div>
                </v-col>
                <v-col cols="4">
                    <div class="b-table-colm-title">
                        <strong>
                            {{ $t('field.additionalField') }}
                        </strong>
                    </div>
                </v-col>
                <v-col cols="2">
                    <div class="b-table-colm-title">
                        <strong>
                            {{ $t('field.type') }}
                        </strong>
                    </div>
                </v-col>
            </v-row>
        </div>
        <div class="b-selzy-app__main">
            <div class="b-selzy-app__accordions">
                <draggable
                    v-model="items"
                    handle="[name=draggable]"
                >
                    <FieldAccordion class="b-selzy-app__accordion"
                                    v-for="(item, index) in items"
                                    :key="`accordion-${index}`"
                                    :index="index"
                                    :data="item"
                                    :type="getTypeNameById(item.type)"
                    >
                    </FieldAccordion>
                </draggable>
            </div>
        </div>
        <div class="b-selzy-app__footer">
            <v-row justify="end">
                <v-col cols="12" align="right">
                    <div class="b-selzy-app__button-container">
                        <div class="b-types-list b-selzy-app__types"
                             :class="typesContainerShow ? 'active' : ''"
                        >
                            <div class="b-types-list__item"
                                 :class="item.id === 3 && isPhoneSet ? 'disabled' : ''"
                                 v-for="item in typesWithoutNameAndEmail"
                                 :key="`type-${item.id}`"
                                 :id="item.id"
                                 @click="addAccordion(item.id)"
                            >
                                <Tooltip v-if="item.id === 3 && isPhoneSet">
                                    <div slot="content" class="b-content" v-html="$t('field.uniquePhone')"></div>
                                </Tooltip>
                                {{ item.name }}
                            </div>
                        </div>
                        <v-btn depressed color="primary" @click="toggleTypesContainer">
                            + {{ $t('field.add') }}
                        </v-btn>
                    </div>
                </v-col>
            </v-row>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import FieldAccordion from '@/components/field-accordion.vue'
import Tooltip from '@/components/tooltip'

export default {
    components: {
        FieldAccordion,
        draggable,
        Tooltip
    },
    data() {
        return {
            typesContainerShow: false
        }
    },

    methods: {
        toggleTypesContainer() {
            this.typesContainerShow = !this.typesContainerShow
        },
        addAccordion(id) {
            if (id === 3 && this.isPhoneSet) return false
            this.typesContainerShow = false
            this.$store.dispatch('addAccordion', id)
        },
        getTypeNameById(id) {
            return this.types.filter(type => type.id === id)[0]?.name
        }
    },
    computed: {
        items: {
            get: function () {
                return this.$store.getters.accordions
            },
            set: function (newList) {
                this.$store.dispatch('updateAccordions', newList)
            }
        },
        types() {
            return this.$store.getters.types
        },
        typesWithoutNameAndEmail() {
            return this.types.filter(item => item.id !== 1 && item.id !== 2)
        },
        isPhoneSet() {
            return this.items.some(item => item.type === 3)
        }
    }
}
</script>