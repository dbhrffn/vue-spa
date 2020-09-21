<template>
  <v-data-table
    :headers="headers"
    :items="events"
    sort-by="id"
    class="elevation-1"
  >
  <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>Event Management</v-toolbar-title>
         <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="attrs"
              v-on="on"
            >New Item</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                {{editedItem.id}}
                  <v-col cols="12">
                    <v-text-field v-model="editedItem.name" label="Event Name"></v-text-field>
                  </v-col>
                  <v-col cols="12">
                    <v-text-field v-model="editedItem.description" label="Event Description"></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6" sm="4">
                    <v-text-field v-model="editedItem.start_date" label="Event Start Date"></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6" sm="4">
                    <v-text-field v-model="editedItem.end_date" label="Event End Date"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>

      </v-toolbar>
  </template>
  <template v-slot:item.actions="{ item }">
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
      <v-icon
        small
        @click="deleteItem(item)"
      >
        mdi-delete
      </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="initialize">Reset</v-btn>
    </template>
</v-data-table>
</template>

<script>
    export default {
        data() {
            return {
                dialog: false,
                headers: [
                    {
                        text: 'ID',
                        align: 'start',
                        sortable: false,
                        value: 'id',
                    },
                    { text: 'Event Name', value: 'name' },
                    { text: 'Event Description', value: 'description' },
                    { text: 'Event Start Date', value: 'start_date' },
                    { text: 'Event End Date', value: 'end_date' },
                    { text: 'Actions', value: 'actions', sortable: false },
                ],
                events: [],
                editedIndex: -1,
                editedItem: {
                    name: ''
                },
                defaultItem: {
                    name: ''
                },
            }
        },
        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
            },
        },
        watch: {
            dialog (val) {
                val || this.close()
            },
        },
        created() {
            this.initialize();
        },
        methods: {
            fetchEvents(){
                axios
                .get('/api/events')
                .then(response=>{
                    console.log(response);
                    this.events=response.data;
                })
            },

            initialize(){
                this.fetchEvents();
            },

            editItem (item) {
                this.editedIndex = this.events.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.events.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.events.splice(index, 1)
                axios.delete('/api/events/'+item.id)
                console.log('deleted data');
            },

            close () {
                this.dialog = false
                this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem)
                this.editedIndex = -1
                })
            },
            save () {
                if (this.editedIndex > -1) {
                    console.log('edited data');

                    axios.put('/api/events/'+this.editedItem.id,{
                        id:this.editedItem.id,
                        name:this.editedItem.name,
                        description:this.editedItem.description,
                        start_date:this.editedItem.start_date,
                        end_date:this.editedItem.end_date
                    })
                    .then(response=>{
                        console.log(response);
                    })

                    Object.assign(this.events[this.editedIndex], this.editedItem)
                } else {
                    console.log('created data');

                    axios.post('/api/events/create',{
                        name:this.editedItem.name,
                        description:this.editedItem.description,
                        start_date:this.editedItem.start_date,
                        end_date:this.editedItem.end_date
                    })
                    .then(response=>{
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                    this.events.push(this.editedItem)
                }
                this.close()
            },

        },
    }
</script>
