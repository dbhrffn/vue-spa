<template>
    <div>
        <v-list dense>
            <v-list-item :to="{ name: 'home' }">
            <v-list-item-action>
                <v-icon>mdi-home</v-icon>
            </v-list-item-action>

            <v-list-item-content>
                <v-list-item-title>Home</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'about' }">
            <v-list-item-action>
                <v-icon>mdi-information-outline</v-icon>
            </v-list-item-action>

            <v-list-item-content>
                <v-list-item-title>About</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'eventhome' }">
            <v-list-item-action>
                <v-icon>mdi-hololens</v-icon>
            </v-list-item-action>

            <v-list-item-content>
                <v-list-item-title>Event Management</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'crudhome' }">
            <v-list-item-action>
                <v-icon>mdi-folder</v-icon>
            </v-list-item-action>

            <v-list-item-content>
                <v-list-item-title>Crud Management</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'orderhome' }">
            <v-list-item-action>
                <v-icon>mdi-account-multiple</v-icon>
            </v-list-item-action>

            <v-list-item-content>
                <v-list-item-title>Orders Management</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'todos' }">
            <v-list-item-action>
                <v-icon>mdi-tooltip</v-icon>
            </v-list-item-action>

            <v-list-item-content>
                <v-list-item-title>Todos</v-list-item-title>
            </v-list-item-content>
            </v-list-item>

        </v-list>
    </div>
</template>

<script>
    export default {

    }
</script>
