<template>
    <div>    
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h1><slot></slot></h1>
                </div>
                
            </div>
        </nav>
    </div> 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
