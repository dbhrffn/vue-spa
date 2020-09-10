<template>
    <div>
        <v-list-item-group>
            <v-list-item :to="{ name: 'home' }">
                <v-list-item-title>Home</v-list-item-title>
            </v-list-item>

            <v-list-item :to="{ name: 'about' }">
                <v-list-item-title>About</v-list-item-title>
            </v-list-item>


            <v-list-item :to="{ name: 'eventhome' }">
                <v-list-item-title>Event Management</v-list-item-title>
            </v-list-item>


            <!-- <v-list-item :to="{ name: 'crudhome' }">
                <v-list-item-title>Cruds Management</v-list-item-title>
            </v-list-item> -->

            <v-list-item :to="{ name: 'orderhome' }">
                <v-list-item-title>Orders Management</v-list-item-title>
            </v-list-item>

        </v-list-item-group>
    </div>
</template>

<script>
    export default {

    }
</script>
