import _ from 'lodash';

export default {
    SET_COMMENTS(state, payload) {
        state.comments = payload
    },
    SET_IS_FETCHING_POST(state, payload) {
        state.isFetchingComments = payload
    },
    SET_COMMENTS_PARENT(state, payload) {
        state.comments.unshift(payload);
    },
    SET_COMMENTS_CHILD(state, payload) {
        //iterates through the comments array to insert the latest reply
        _.map(state.comments, function(comment) {
            if(comment.id === payload.parent_id) {
                comment.replies.unshift(payload.data);
                return false;
            }

            _.map(comment, function(reply) {
                if(reply.id === payload.parent_id) {
                    reply.replies.unshift(payload.data);
                    return false;
                }

                _.map(reply, function(reply2) {
                    if(reply2.id === payload.parent_id) {
                        reply2.replies.unshift(payload.data);
                        return false;
                    }

                    _.map(reply2, function(reply3) {
                        if(reply3.id === payload.parent_id) {
                            reply3.replies.unshift(payload.data);
                            return false;
                        }

                        _.map(reply3, function(reply4) {
                            if(reply4.id === payload.parent_id) {
                                delete payload.data.replies;
                                reply4.replies.unshift(payload.data);
                                return false;
                            }
                        });
                    });
                });
            });
        });
    }
}