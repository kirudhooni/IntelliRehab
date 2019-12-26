<template>
                <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Group:</label>
                            <select class='form-control' v-model='group' @change="passSelectedGroup()">
                              <option v-for='group in groups' :value='group.id'>{{ group.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>  
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                group: 0,
                groups: [],
            }
        },
        methods:{
            getGroups(){
              axios.get('/groups/getGroups')
              .then(function (response) {
                 this.groups = response.data;
              }.bind(this));
            },

            passSelectedGroup(){
                Event.$emit('groupSelected',this.group)
            },
        },
        created: function(){
            this.getGroups()
        }
    }

</script>
