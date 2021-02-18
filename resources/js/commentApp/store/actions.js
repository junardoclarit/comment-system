import axios from "axios";

export default {
    async fetchComments({
        commit,
        state,
        getters
    }) {
        commit('SET_IS_FETCHING_POST', true)

        try {
            await axios
            .get('/api/comments')
            .then(({data}) => {
                commit('SET_COMMENTS', data.data)
                commit('SET_IS_FETCHING_POST', false)
            })
            .catch(error => {
                console.log('error:', error);
            });

        } catch (error) {
            console.log(error);
        }
    },
    async saveComment({
        commit,
        state,
        getters,
    }, payload) {

        try {
            await axios
            .post('/api/comments', payload)
            .then(({data}) => {
                const parent_id = payload.parent_id;
                if(parent_id) {
                    commit('SET_COMMENTS_CHILD', {parent_id, data});
                } else {
                    //Prepend to the top parent comment section.
                    commit('SET_COMMENTS_PARENT', data);
                }
            })
            .catch(error => {
                console.log('error:', error);
            });

        } catch (error) {
            console.log(error);
        }
    },
}