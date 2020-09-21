<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app right>
            <navigation></navigation>
        </v-navigation-drawer>

        <v-app-bar app color="cyan" dark>
            <v-spacer></v-spacer>
            <v-toolbar-title>Vue SPA</v-toolbar-title>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        </v-app-bar>

        <!-- Sizes your content based upon application components -->
        <v-main>
            <!-- Provides the application the proper gutter -->
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col class="text-center">
                        <router-view></router-view>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>

        <v-footer color="cyan" app>
            <v-spacer></v-spacer>
            <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>

<script>
  export default {
      name: 'App',
      props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
  }
</script>
