<template>
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">

                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label for="email" class="sr-only"></label>
                            <input type="email" id="email" class="form-control"
                                   v-model="form.email" placeholder="Enter your email..." required />
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only"></label>
                            <input type="password" id="password" class="form-control"
                                   v-model="form.password" placeholder="Enter your password..." required />
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {

        name: "Login",

        data() {
            return {

                form: {
                    email: null,
                    password: null
                }

            }
        },

        methods: {

            submit() {

                this.$auth.login({
                    data: this.form,
                    fetchUser: true,
                    rememberMe: true,
                    redirect: {
                        name: 'home'
                    }
                });

            }

        }

    }
</script>
