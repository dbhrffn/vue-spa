<template>
    <div>
        <div>Simple Crud Operation</div>
        <crud-component
        v-for="crud in cruds"
        v-bind="crud"
        :key="crud.id"
        :id="crud.id"
        :color="crud.color"
        :name="crud.name"
        @update="update"
        @delete="del"
        ></crud-component>
        <div>
        <v-btn @click="create">Add</v-btn>
        </div>
    </div>
</template>
<script>
  import CrudComponent from './CrudComponent.vue'
  import axios from 'axios'

  export default {
    name : 'CrudHome',
    components: {
      CrudComponent
    },
    data() {
      return {
        cruds: {
            id : '',
            color : '',
            name : ''
        }
      }
    },
    methods: {
      async create() {
        const data = await axios.get('/api/cruds/create');
        this.cruds.push(data.data);
      },
      async update(id, color) {
        await axios.put(`/api/cruds/${id}`, { color });
        this.cruds.find(crud => crud.id === id).color = color;
      },
      async del(id) {
        await axios.delete(`/api/cruds/${id}`);
        let index = this.cruds.findIndex(crud => crud.id === id);
        this.cruds.splice(index, 1);
      }
    },
    created: async function() {
        //wait for each read
        const data = await axios.get('/api/cruds');
        this.cruds = data.data
    }
  }
</script>
