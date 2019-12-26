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
            <div class="col-md-2">
                <button class="btn btn-primary btn-block mb-2" @click="oneToRight">&raquo;</button>
                <button class="btn btn-primary btn-block mb-2" @click="oneToLeft">&laquo;</button>
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

            usersNotInGroup(usersInGroup){
                var allUsers =[];
                axios.get('/users/getAllUsers')
              .then(function (response) {
                 this.allUsers = response.data;
              }.bind(this));
               
               this.list2 = arr_diff(usersInGroup,allUsers);
            },
            onRecieveGroup(groupID){

                axios.get('/groups/getUsers'+ groupID)
              .then(function (response) {
                 this.list2 = response.data;
              }.bind(this));
            },
            arr_diff (a1, a2) {

                var a = [], diff = [];
                for (var i = 0; i < a1.length; i++) {
                    a[a1[i]] = true;
                }
                for (var i = 0; i < a2.length; i++) {
                    if (a[a2[i]]) {
                    delete a[a2[i]];
                } else {
                    a[a2[i]] = true;
                }
                }
                for (var k in a) {
                    diff.push(k);
                }
            return diff;
            },

        },

        created(){

           
            Event.$on('groupSelected',(group)=>{

                this.allUsers=[]
                this.list1 = []
                this.list2 =[]
                axios.get('/groups/getUsers/'+ group).then((response) => {
                  
                  for (var i = 0; i < response.data.length; i++) {  
                  this.list2.push(response.data[i].firstname);
                  }
                 
                 
            });

              
                axios.get('/users/getAllUsers').then((response) => {
                     
                  for (var i = 0; i < response.data.length; i++) {  
                     
                  this.allUsers.push(response.data[i].firstname);
                  }
              });


                var array1 = this.allUsers;
                var array2 = this.list2;
                console.log(array1)
               var temp = [];
                array1 = array1.toString().split(',').map(Number);
                array2 = array2.toString().split(',').map(Number);

                for (var i in array1) {
                if(array2.indexOf(array1[i]) === -1) temp.push(array1[i]);
                }
                for(i in array2) {
                if(array1.indexOf(array2[i]) === -1) temp.push(array2[i]);
                }
                temp.sort((a,b) => a-b);
                
                console.log(temp)
                this.list1= temp;
            });


            
        },
    }
</script>
