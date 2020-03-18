<template>
    <div class="container">
        <header id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <router-link class="navbar-brand" :to="{ name: 'home' }">
                    Laravel Vue Auth
                </router-link>

                <button class="navbar-toggler" type="button"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" v-if="this.$auth.ready()">

                    <ul class="navbar-nav mr-auto" v-if="!$auth.check()">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'register' }">Register</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name: 'login' }">Login</router-link>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto" v-else>
                        <li class="nav-item">
                            Logged: #{{ $auth.user().id }} {{ $auth.user().name }} &lt;{{ $auth.user().email }}&gt;
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto" v-if="$auth.check()">
                        <li class="nav-item">
                            <a class="nav-link" href="#" @click.prevent="$auth.logout()">Sign Out</a>
                        </li>
                    </ul>

                </div>
                <div v-else class="text-secondary">Waiting...</div>
            </nav>
        </header>
        <main id="content" class="py-4">
            <div v-if="this.$auth.ready()">
                <router-view></router-view>
            </div>
        </main>
    </div>
</template>

<script>
	export default {
		name: "App"
    }
</script>
