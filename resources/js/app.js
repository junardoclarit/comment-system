require('./bootstrap');

import Vue from 'vue';
import store from './commentApp/store';
import CommentSection from './commentApp/components/CommentSection';
import CommentForm from './commentApp/components/CommentForm';

const commentApp = new Vue({
    name: 'commentApp',
    store,
    components: {
        CommentSection,
        CommentForm
    },
    el: '#main',
    mounted() {
        this.$store.dispatch('fetchComments');
    }
});