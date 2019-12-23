<template>
    <div>    
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h1><slot></slot></h1>
                </div>
                <div class="d-flex flex-column text-muted"> 
                    <!-- test_username -->
                    <div>{{ user.firstname }} {{ user.lastname }}</div>
                    <div>{{ user.level }}</div>
                    <!-- {{ user.level }} -->
                </div>      
            </div>
        </nav>
    </div> 
</template>

<script>
    export default {
        props: ['model'],

        data () {
            return {
                user: this.model
            }
        }
    }
</script>
