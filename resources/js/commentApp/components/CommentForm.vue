<template>
    <div v-if="reply_is_clicked" class="rounded border p-5 bg-gray-100 mb-3">
        <ValidationObserver v-slot="{ handleSubmit, reset }">
            <form @submit.prevent="handleSubmit(onSubmit)" @reset.prevent="reset">
                <div class="form-group flex items-start">
                    <label for="name" class="text-sm uppercase mr-2 w-28">Name:</label>
                    <ValidationProvider class="block w-full" v-slot="{ errors }" rules="required">
                        <input v-model="replyComment.name" id="name" type="text" class="bg-white rounded border p-2 px-5 w-full">
                        <span class="text-xs text-red-500">{{ errors[0] }}</span>
                    </ValidationProvider>
                </div>
                <div class="form-group flex items-start mt-6">
                    <label for="comment" class="text-sm uppercase mr-2 w-28">Comment:</label>
                    <ValidationProvider class="block w-full" v-slot="{ errors }" rules="required">
                        <textarea v-model="replyComment.comment" id="comment" class="bg-white rounded border p-2 px-5 w-full h-40"></textarea>
                        <span class="text-xs text-red-500">{{ errors[0] }}</span>
                    </ValidationProvider>
                </div>
                <div class="form-group mt-6 flex justify-end">
                    <button type="reset" v-if="parent_id" @click="onCancel()" class="bg-red-500 hover:bg-red-700 text-white font-bold uppercase border rounded-md px-4 py-2 mr-4">Cancel</button>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent font-bold uppercase text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:border-rose-700 active:bg-rose-700 transition ease-in-out duration-150">
                        <svg v-if="isSaving" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Add comment
                    </button>
                </div>
            </form>
        </ValidationObserver>
    </div>
</template>

<script>

import { mapActions } from "vuex";
import {ValidationObserver, ValidationProvider, extend} from "vee-validate";
import { required } from 'vee-validate/dist/rules';

// Override the default message.
extend('required', {
    ...required,
    message: 'This field is required'
});

export default {
    name: 'comment-form',
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    props: ['parent_id', 'reply_is_clicked'],
    data() {
        return {
            randomAvatar: [
                'a92751f90d46098f764c31bd0ad01ebe',
                '93808d82e50f181d6a50896e71d6dfa5',
                '603253f769a46379cda09c1dbdf06c70',
                '65f87d5c0f4f36228575c1c3e41e3398',
                'ae6fc25281e4c4300a5745c6bb825b73',
                '2c302525e1e7d040fd0bdf8484d2045f',
                'ee4c2e8e142f22dbd6ce097059ee6633',
                'e1c9f1c15c7c1ce0fc6274773415b168',
                '37a7f61752e0ed31f2035bf5b1156390'
            ],
            replyComment: {
                parent_id: (this.parent_id != '') ? this.parent_id : null ,
                name: null,
                comment: null,
                avatar: null,
            },
            isSaving: false,
        }
    },
    methods: {
        ...mapActions(['saveComment']),
        generateAvatar() {
            this.replyComment.avatar = this.randomAvatar[Math.ceil(Math.random()*8)];
            return;
        },
        onCancel() {
            this.$emit('cancelClicked');
        },
        async resetForm() {
            this.replyComment = {
                parent_id: (this.parent_id != '') ? this.parent_id : null ,
                name: null,
                comment: null,
                avatar: null,
            }
        },
        async onSubmit() {
            this.isSaving = true;
            this.generateAvatar();
            //Dispatch saveComment Action.
            await this.saveComment(this.replyComment);

            this.isSaving = false;
            this.resetForm();

            //Hide's the form if submits the reply
            if(this.parent_id) {
                this.$emit('cancelClicked');
            }

            console.log(this);
        },
    },
    mounted() {
    }
}
</script>