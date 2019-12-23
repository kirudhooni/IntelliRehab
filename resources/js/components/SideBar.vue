<template>

    <div id="test" class= "sidebar-container">';
        <div class="w3-sidebar w3-bar-block w3-small  w3-center "  style="width:8%">

         <div @clicked="hover=true" :class="{'w3-black':hover}" > 
        <a href="#" class="w3-bar-item w3-button w3-padding-large" >
        <i class="fa fa-home w3-xlarge"></i>
        <p>HOME</p>
        </a>
        </div>  
        
        <a @clicked="hover=true" href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black" :class="{active:hover}">
        <i class="fa fa-wheelchair w3-xlarge"></i>
        <p>PATIENT</p>
        </a>

        <a @clicked="hover=true" href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black" :class="{active:hover}">
        <i class="fa fa-cogs w3-xlarge"></i>
        <p>ADMIN</p>
        </a>
        
        <a @clicked="hover=true" href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black" :class="{active:hover}">
        <i class="fa fa-sign-out w3-xlarge"></i>
        <p>LOGOUT</p>
        </a>
        </div>				
    </div>

</template>



<script>
    export default {
        data () {
            return {
                hover: false,
            }
        }
    }
</script>
