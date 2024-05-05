<template>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
<a class="navbar-brand" href="#" :onclick="home">Vacation<span>Travel Agency</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
<span class="oi oi-menu"></span> Menu
</button>
<div class="collapse navbar-collapse" id="ftco-nav">
<ul class="navbar-nav ml-auto">
<li id="nav" class="nav-item"><a href="#" :onclick="home"  class="nav-link" >Home</a></li>
<li id="nav" class="nav-item"><a href="#" :onclick="Destination" class="nav-link">Booking</a></li>
<li id="nav" class="nav-item"><a href="#" :onclick="about" class="nav-link">About</a></li>




</ul>
</div>
</div>
</nav>
    <div>
        <router-view></router-view>
    </div>
   
</template> 
<style>
#nav:hover{
    color: #b57d7b;
    transition: width 0.2s;
    text-decoration: underline;
}
</style>
<script>
    export default {
        mounted() {
            //console.log('Component mounted.')
        },
        methods:{
            home:function(){
               
                window.location.href="/"
                
                },
                about:function(){
            window.location.href="about"
       
                },
                Destination:function(){
            window.location.href="destination"
       
                }
        }
    }
</script>