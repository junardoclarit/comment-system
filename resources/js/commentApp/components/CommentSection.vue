<template>
    <div v-if="!isFetchingComments && comments.length" class="comment-box">
        <div v-for="comment in comments" :key="comment.id" class="rounded border p-5 bg-gray-100 mb-3">
            <comment-box :comment="comment" :isParent="true" :replyButton="true"></comment-box>
        </div>
    </div>
</template>

<script>

import { mapGetters } from "vuex";
import CommentBox from './CommentBox';


export default {
    name: 'comment-section',
    components: {
        CommentBox
    },
    computed: {
        ...mapGetters(['comments', 'isFetchingComments']),
    },
    mounted() {
    }
}

</script>
