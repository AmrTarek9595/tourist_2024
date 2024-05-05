<template>
    
    <div class="video" id="video">
        

         <img  id="video_2" src="public/images/intro.gif" autoplay muted="false" >

          <div class="buttons">
                
                <button type="button"  :onclick="disp_home" class="btn btn-primary">X</button>
               
            </div>
    </div> 

<div id="home">
<div id="cover" class="hero-wrap js-fullheight" >
    
    <img v-bind:src ='"https://tourism.nrchrod.org/public/homepage/"+cover_img' id="cover">
<div class="overlay"></div>
<div class="container" style="position: sticky;
bottom: 10px;">
    
<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">

<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">

<p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ cover_text_1 }}</p>
<h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ cover_text_2 }}</h1>
</div>
</div>
</div>

</div>

<section class="ftco-section services-section bg-light">
<div class="container">
<div class="row d-flex">
<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate">
<h2 class="mb-4">It's time to start your adventure</h2>
<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
<p><a href="destination" class="btn btn-primary py-3 px-4">Search Destination</a></p>
</div>
<div class="col-md-6">
<div class="row">
<div class="col-md-6 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services d-block">
<div class="icon"><span class="flaticon-paragliding"></span></div>
<div class="media-body">
<h3 class="heading mb-3">Activities</h3>
<p>A small river named Duden flows by their place and supplies it with the necessary</p>
</div>
</div>
</div>
<div class="col-md-6 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services d-block">
<div class="icon"><span class="flaticon-route"></span></div>
<div class="media-body">
<h3 class="heading mb-3">Travel Arrangements</h3>
<p>A small river named Duden flows by their place and supplies it with the necessary</p>
</div>
</div>
</div>
<div class="col-md-6 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services d-block">
<div class="icon"><span class="flaticon-tour-guide"></span></div>
<div class="media-body">
<h3 class="heading mb-3">Private Guide</h3>
<p>A small river named Duden flows by their place and supplies it with the necessary</p>
</div>
</div>
</div>
<div class="col-md-6 d-flex align-self-stretch ftco-animate">
<div class="media block-6 services d-block">
<div class="icon"><span class="flaticon-map"></span></div>
<div class="media-body">
<h3 class="heading mb-3">Location Manager</h3>
<p>A small river named Duden flows by their place and supplies it with the necessary</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="ftco-counter img" id="section-counter">
<div class="container">
<div class="row d-flex">
<div class="col-md-6 d-flex">
<div class="img d-flex align-self-stretch" style="background-image:url(public/images/about.jpg);"></div>
</div>
<div class="col-md-6 pl-md-5 py-5">
<div class="row justify-content-start pb-3">
<div class="col-md-12 heading-section ftco-animate">
<h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
</div>
</div>
<div class="row">
<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
<div class="block-18 text-center mb-4">
<div class="text">
<strong class="number" v-bind="no_success_tours">{{ no_success_tours }}</strong>
<span>Successful Tours</span>
</div>
</div>
</div>
<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
<div class="block-18 text-center mb-4">
<div class="text">
<strong class="number" v-bind="Number(no_happy_tourist)">{{ no_happy_tourist }}</strong>
<span>Happy Tourist</span>
</div>
</div>
</div>
<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
<div class="block-18 text-center mb-4">
<div class="text">
<strong class="number" v-bind="no_place_explored">{{ no_place_explored }}</strong>
<span>Place Explored</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center pb-4">
<div class="col-md-12 heading-section text-center ftco-animate">
<h2 class="mb-4">Best Place Destination</h2>
</div>
</div>
<div class="row">
<div class="col-md-3 ftco-animate" v-for="data5 in dest_data" :key="data5.id">
<div class="project-destination">
  <router-link :to='""' class="img" :style="{backgroundImage:'url(https://tourism.nrchrod.org/public/covertrips/'+data5.cover+')'}">
<div class="text">
<h3 style="color:black">{{data5.Country}}</h3>

</div></router-link>
</div>
</div>



</div>
</div>
</section>
<section class="ftco-section ftco-no-pt">
<div class="container">
<div class="row justify-content-center pb-4">
<div class="col-md-12 heading-section text-center ftco-animate">
<h2 class="mb-4">Tour Destination</h2>
</div>
</div>



<div class="row">
<div class="col-md-4 ftco-animate" v-for="data4 in dest_data" :key="data4.id">
<div class="project-wrap">
<router-link :to='"/details?end="+data4.id' class="img" :style="{backgroundImage:'url(https://tourism.nrchrod.org/public/covertrips/'+data4.cover+')'}"></router-link>
<div class="text p-4">
<span class="price">{{data4.price_cover}}</span>
<span class="days">{{data4.no_days}} Days Tour</span>
<h3><a href="#">{{data4.Country}}</a></h3>

<ul>

</ul>
</div>
</div>
</div>




</div>
</div>
</section>
<section class="ftco-section testimony-section bg-bottom" style=" padding-bottom: 215px;background-image: url(public/images/bg_3.jpg);">
<div class="container">
<div class="row justify-content-center pb-4">
<div class="col-md-7 text-center heading-section ftco-animate">
<h2 class="mb-4">Tourist Feedback</h2>
</div>
</div>





<div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators" >
  <li data-target="#demo" v-for="(item,index) in feedback" :key="index" :data-slide-to="index" :class="index === 0 ? 'active' : ''"></li>
  
  
</ul>

<!-- The slideshow -->
<div class="carousel-inner" >
  <div v-for="(item,index) in feedback" :key="index" :class="index === 0 ? 'carousel-item active' : 'carousel-item'" style="border: 5px  black;">
    <h5 style="color:black; font-size:15px;">{{ item.tourist_feedback}}</h5>
    <h4 style="font-style: italic;">{{ item.tourist_title }}</h4>
    <h4 style="color: black;
    font-style: italic;">{{ item.tourist_name}}</h4>
  </div>
 

</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>




</div>

</section>

</div>


</template>
<style>
#cover {

 
  background-repeat: no-repeat;
  background-attachment: fixed;

  width: 100%;
    height: 100%;
    background-size: 100% 100%;
    border: 1px solid red;
  
}
</style>
<script>
    export default {
        data() {
    return {
        cover_img: '',
        cover_text_1:'',
        cover_text_2:'',
        no_happy_tourist:'',
        no_place_explored:'',
        no_success_tours:'',
        feedback:'',
        dest_data:''
        
      
    };
  },
        mounted() {
            console.log('Component mounted.')
           this.return_destination();

            document.getElementById("home").style.display="none";
           
            setTimeout(this.disp_home,11000);
            this.home_page();
            
        },
        methods:{
           disp_home:function(){
                document.getElementById("video").style.display="none"
                document.getElementById("home").style.display="block"
            }, 
            
            home_page:function(){
                let x= axios.post('/api/test').then(response => {
        
        this.cover_img=response.data.message[0].cover
        
        this.cover_text_1=response.data.message[1].cover_text_1

        this.cover_text_2=response.data.message[1].cover_text_2

        this.no_happy_tourist=response.data.message[2].no_happy_tourist

        this.no_place_explored=response.data.message[2].no_place_explored
        
        this.no_success_tours=parseInt(response.data.message[2].no_success_tours)

      
      
        this.feedback=response.data.message[3]
        
       
      
        console.log(response.data.message)
    });    
            
            },
            return_destination:function(){
                let x= axios.post('https://tourism.nrchrod.org/api/return_destination').then(response => {  
                this.dest_data=response.data.message2
        
            
    }); }
         
        }
    }
</script>
