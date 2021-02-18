<template>
    <div>
        <div class="flex justify-start">
            <img 
                :src="avatar(comment.avatar)" 
                :class="[isParent ? 'w-12 h-12 sm:w-16 sm:h-16': 'w-12 h-12'] + ' object-fit border rounded bg-white'" />
            <div class="ml-4 w-full">
                <h4 class="text-md font-bold leading-tight" v-text="comment.name"></h4>
                <span class="text-xs mb-3 block" v-text="datePosted(comment.comment_date)"></span>
                <p class="text-xs sm:text-sm md:text-base" v-html="comment.comment"></p>
                <div v-if="replyButton">
                    <button v-if="!replyClicked" @click="replyClicked=!replyClicked" class="mt-5 rounded border bg-gray-300 text-xs font-bold text-white px-5 py-2 hover:bg-gray-400">Reply</button>
                    
                    <div v-if="replyClicked" class="comment-form mt-4 -ml-20">
                        <comment-form @cancelClicked="replyClicked=!replyClicked" :parent_id='comment.id' :reply_is_clicked="replyClicked"></comment-form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="comment.replies" class="pl-3 sm:pl-10">
            <div v-for="reply in comment.replies" :key="reply.id" class="mt-8">
                <comment-box :comment="reply" :isParent="false" :replyButton="checkReplyLevel(reply.replies)"></comment-box>
            </div>
        </div>
    </div>
</template>

<script>

import moment from 'moment';
import CommentForm from './CommentForm';

export default {
    name: 'comment-box',
    props: ['comment', 'isParent', 'replyButton'],
    components: {
        CommentForm,
    },
    data() {
        return {
            replyClicked: false,
        }
    },
    computed: {
    },
    methods: {
        datePosted(date) {
            return moment(date).fromNow()
        },
        checkReplyLevel(replies) {
            if (typeof replies === 'undefined') {
                return false;
            }

            return true;
        },
        avatar(avatarHash) {
            return 'https://robohash.org/' + avatarHash + '?set=set4&bgset=&size=100x100';
        }
    },
    mounted() {
    }
}

</script>