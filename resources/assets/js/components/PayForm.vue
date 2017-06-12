<template>
    <form method="post" v-if="loaded">
        <div id="showPayForm"></div>
        <button class="btn btn-primary" v-if="showSubmitButton">Terminer</button>
        <input type="hidden" name="_token" v-bind:value="csrfToken">
    </form>
    <div v-else>Chargement du formulaire de paiement...</div>
</template>

<script>
    import braintree from 'braintree-web'

    export default {
        data () {
            return {
                loaded: false,
                showSubmitButton: false,
                csrfToken: window.Laravel.csrfToken
            }
        },
        mounted() {
            axios.get('/braintree/token').then((response) => {
                this.loaded = true

                braintree.setup(response.data.data.token, 'showPayForm', {
                    container: 'showPayForm',
                    onReady: () => {
                        this.showSubmitButton = true
                    }
                })
            })
        }
    }
</script>

<style>
    #showPayForm {
        padding-top : 5px;
        margin-bottom: 15px;
    }
</style>