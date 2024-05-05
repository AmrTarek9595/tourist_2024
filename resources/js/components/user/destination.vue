<template>
<!--Best Place Destination-->
<section class="ftco-section">
<div class="container">
<div class="row justify-content-center pb-4">
<div class="col-md-12 heading-section text-center ftco-animate">
<h2 class="mb-4">Best Place Destination</h2>
</div>
</div>
<div class="row">
<div class="col-md-3 ftco-animate" v-for="data2 in best_place_data_max_4" :key="data2.id">
<div class="project-destination">
<a href="#" class="img" :style="{backgroundImage:'url(https://tourism.nrchrod.org/public/covertrips/'+data2.cover+')'}">
<div class="text">
<h3 style="color:black;font-weight: bold;"> {{data2.city}}, {{data2.Country}}</h3>
<span>{{data2.no_days}}</span>
</div>
</a>
</div>
</div>



</div>
</div>
</section>





<!--Check in and booking -->
<section class="ftco-section ftco-no-pb ftco-no-pt">
<div class="container">
<div class="row">
<div class="col-md-12 mb-5">
<div class="search-wrap-1 search-wrap-notop ftco-animate p-4">
<form action="#" class="search-property-1" >
<div class="row">
<div class="col-lg align-items-end">
<div class="form-group">
<label for="#">Destination</label>
<div class="form-field">
<div class="icon"><span class="ion-ios-search"></span></div>

<select class="form-select form-control" aria-label="Default select example" v-model="search_destination">
  <option value="select_all">All Destinations</option>
  <option v-for="data3 in list_of_country" :key="data3.id" :value="data3.Country" >{{data3.Country}}</option>
  
</select>

</div>
</div>
</div>
<div class="col-lg align-items-end">
<div class="form-group">
<label for="#">Check-in date</label>
<div class="form-field">
<!--:min="min_date"  max="2024-12-31" datepicker-->
<input type="date" class="form-control" v-model="check_in" id="dt" placeholder="Check-in" autocomplete="off" :onchange="limit_date_between_chekin_checkout"/>
</div>

</div>
</div>
<div class="col-lg align-items-end">
<div class="form-group">
<label for="#">Check-out date</label>
<div class="form-field">

<input type="date" class="form-control" v-model="check_out" id="dt2" autocomplete="off" placeholder="Check-out" min=""/>
</div>
</div>
</div>
{{ check_in }}
{{ check_out }}
<div class="col-lg align-self-end">
<div class="form-group">
<div class="form-field">
<input type="submit" value="Search" class="form-control btn btn-primary" @click.prevent="check_subtract_between_two_dates">
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>






<!--Tour Destination-->
<section class="ftco-section ftco-no-pt">
<div class="container">
<div class="row justify-content-center pb-4">
<div class="col-md-12 heading-section text-center ftco-animate">
<h2 class="mb-4">Tour Destination</h2>
</div>
</div>
<div class="row" v-if="tour_dest_visability">
<div  class="col-md-4 ftco-animate" v-for="data in dest_data" :key="data.id">
<div class="project-wrap">
<router-link :to='"/details?end="+data.id' class="img" :style=" {backgroundImage:'url(https://tourism.nrchrod.org/public/covertrips/'+data.cover+')'} ">
</router-link>

<div class="text p-4">
<span class="price">{{data.price_cover}}</span>
<span class="days">{{data.no_days}} Days Tour</span>
<h3><a href="#"> {{data.city}}, {{data.Country}}</a></h3>
<p class="location"><span class="ion-ios-map"></span> {{ data.Country }}</p>

</div>

</div>
</div>

</div>
<!--section of display when search is selected -->
<div class="row" v-if="tour_search_result_visability">
    <h1 class="text-center" style="color:red;font-weight: 700;">{{warning_message_if_not_available_data }}</h1>

<div  class="col-md-4 ftco-animate" v-for="data3 in search_data" :key="data3.id">
    
<div class="project-wrap">
<router-link :to='"/details?end="+data3.id' class="img" :style=" {backgroundImage:'url(https://tourism.nrchrod.org/public/covertrips/'+data3.cover+')'} ">
</router-link>

<div class="text p-4">
<span class="price">{{data3.price_cover}}</span>
<span class="days">{{data3.no_days}} Days Tour</span>
<h3><a href="#">{{data3.city}},{{data3.Country}}</a></h3>
<p class="location"><span class="ion-ios-map"></span> {{ data3.Country }}</p>

</div>

</div>
</div>











</div>





<div class="row mt-5">
<div class="col text-center">
<div class="block-27">
<ul>
<li><a href="#">&lt;</a></li>
<li class="active"><span>1</span></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#">&gt;</a></li>
</ul>
</div>
</div>
</div>
</div>
</section>
</template>

<script>
export default {
    data() {
    return {
        dest_data:'',
        best_place_data_max_4:'',
        search_data:'',
        search_destination:'',
        check_in:'',
        check_out:'',
       
        
        warning_message_if_not_available_data:'',
        tour_dest_visability:false,
        tour_search_result_visability:false
      
    };
  },
        mounted() {
            
            this.return_destination_data();
            
           this.limit_date_between_chekin_checkout();
        },
        methods:{
  
            return_destination_data:function(){
                let x= axios.post('https://tourism.nrchrod.org/api/return_destination').then(response => {  
                this.dest_data=response.data.message,
                this.best_place_data_max_4=response.data.message2   
                this.list_of_country=response.data.message3
                this.tour_dest_visability=true;
                this.tour_search_result_visability=false
            
    });    
            
            },
            limit_date_between_chekin_checkout:function(){
           
            document.getElementById('dt').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];
           var firstdate = document.getElementById("dt").value;
            document.getElementById("dt2").value = "";
            document.getElementById("dt2").setAttribute("min",firstdate);
          
  },      check_subtract_between_two_dates:function(){
         
    var d=new FormData;
    d.append("search_dest",this.search_destination);
    d.append("check_in",this.check_in);
    d.append("check_out",this.check_out);
    let y = axios.post('https://tourism.nrchrod.org/api/search_destination',d).then(response => {  
                this.search_data=response.data.message  
                this.tour_dest_visability=false;
                this.tour_search_result_visability=true
                /**CHECK IF API RETURN MESSAGE INCLUDE CHOICE DESTINATION FIRST TO HIDE REPEATED DISPLAY COUNTRY AND CONTROL IF WARNING MESSAGE DISPLAY OR NO  */
                if(this.search_data == "please choice Check-In & check-out dates and Destination First"){
                    this.warning_message_if_not_available_data= this.search_data;
                    this.search_data='';

                }  
                /**TO HIDE WARNING MESSAGE WHERE DATA RETURNED FROM API INCLUDE DATA*/
                else {
                    this.warning_message_if_not_available_data=''
                }
                      
    });    
       
    //Math.ceil(Math.abs(new Date(this.check_out)-new Date(this.check_in)) / (1000 * 60 * 60 * 24))  
 },
    
         
        }
    
}
</script>

<style>
select option{
    background-color: black;
}
</style>