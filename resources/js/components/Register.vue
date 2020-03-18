<template>
    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">

                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label for="name" class="sr-only"></label>
                            <input type="text" id="name" class="form-control"
                                   v-model="form.name" placeholder="Enter your name..." required />
                        </div>
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
                        <div class="form-group">
                            <label for="password_confirmation" class="sr-only"></label>
                            <input type="password" id="password_confirmation" class="form-control"
                                   v-model="form.password_confirmation" placeholder="Enter your password again..." required />
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
	export default {

		name: "Register",

        data() {
		    return {

		        form: {
		            name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                }

            }
        },

        methods: {

            submit() {

                this.$auth.register({
                    data: this.form,
                    autoLogin: true,
                    rememberMe: true,
                    redirect: {
                        name: 'home'
                    }
                });

            }

        }

	}
</script>
