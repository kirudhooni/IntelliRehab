<template>
    <div>
        <div class="row" style="padding-top:30px; padding-bottom:10px;">
            <h3 class="col-md-4 text-center" for="inGroup">In Group</h3>
            <div class="col-md-2"></div>
            <h3 class="col-md-4 text-center" for="notInGroup">Not In Group</h3>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <select size="20" class="form-control" name="inGroup" id="list1" multiple>
                    <option v-for="item1 in list1" >{{ item1 }}</option>
                </select>
            </div>
            <div class="col-md-2" style="margin-top:100px;">
                <button class="btn btn-danger btn-block mb-2" @click="oneToRight">&raquo;</button>
                <button class="btn btn-success btn-block mb-2" @click="oneToLeft">&laquo;</button>
            </div>
            
            <div class="col-md-4">
                <select size="20" class="form-control" name="notInGroup" id="list2" multiple>
                    <option v-for="item2 in list2" >{{ item2 }}</option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('DualListBox mounted.')
        },

        data() {
            return {
                title: 'Dual List Box',
                newUsers: '',
                list1: [],
                list2: [],
                allUsers: [],
            }
        },
        methods: {
            oneToRight() {
                 
                var select = [];   
                var i; 
                $("#list1 :selected").each(function(){
                    select.push($(this).val()); 
                });
                if (select != ""){
                    for (i = 0; i < select.length; i++) {
                    this.list2.push(select[i])
                    var del = this.list1.indexOf(select[i])
                    this.list1.splice(del,1)
                    }
                    
                }
            },
            oneToLeft() {
                var select = [];   
                var i; 
                $("#list2 :selected").each(function(){
                    select.push($(this).val()); 
                });
                if (select != ""){
                    for (i = 0; i < select.length; i++) {
                    this.list1.push(select[i])
                    var del = this.list2.indexOf(select[i])
                    this.list2.splice(del,1)
                    }
                    
                }
            },
        },

        created(){

           
            Event.$on('groupSelected',(group)=>{

                this.allUsers=[]
                this.list1 = []
                this.list2 =[]
                axios.get('/users/getUsersInGroup/'+ group).then((response) => {
                  for (var i = 0; i < response.data.length; i++) {  
                  this.list1.push(response.data[i].firstname);
                  }
            });
                axios.get('/users/getUsersNotInGroup/'+ group).then((response) => {  
                  for (var i = 0; i < response.data.length; i++) {   
                  this.list2.push(response.data[i].firstname);
                  }
              });
            });


            
        },
    }
</script>
