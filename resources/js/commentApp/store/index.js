import Vue from 'vue'
import Vuex from 'vuex'

import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

Vue.use(Vuex)

const state = {
    isFetchingComments: true,
    comments: [],
}

const store = new Vuex.Store({
    state,
    mutations,
    actions,
    getters
})

export default store
