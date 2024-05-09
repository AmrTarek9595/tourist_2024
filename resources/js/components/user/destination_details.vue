<template>

<div class="container-fluid pt-3" style="padding-top: 250px;" >
<div class="card-columns">
    <div class="col-3">
   <h1 class="text-center" style="font-weight:bold">{{ country }} Details</h1>
  </div>
</div>
</div>


  


<section class="ftco-section ftco-no-pt ftco-no-pb" >
<div class="container">
<div class="row">
<div class="col-lg-8 order-md-last ftco-animate py-md-5 mt-md-5">
<div id="program">
<h2 class="mb-3" id="heading">Description</h2>
<p  v-html="description"></p>
</div>

<div id="program">
<h2 class="mb-3" id="heading">Program Details</h2>
<p  v-html="program">  </p>
<p v-if="hotel" ><span id="heading">Hotel Name: </span> {{ hotel }}</p>
</div>

<div id="program">
<h2 class="mb-3" id="heading">Includes and not Includes</h2>
<span id="heading">Includes:</span><p  v-if="includes" v-html="includes"></p>
<span id="heading">Not Includes:</span><p v-if="not_includes" v-html="not_includes"> </p>
</div>

<div id="program">
<h2 class="mb-3" id="heading">Extra Details </h2>
<span id="heading">Start Trip: </span><p  v-if="start_date" v-html="start_date"></p>
<span id="heading">End Trip:</span><p v-if="end_date" v-html="end_date"> </p>
<span id="heading">Number of Days:</span><p v-if="no_dayes" v-html="no_dayes"> </p>
</div>

<div id="program">
<h2 class="mb-3" id="heading">Pricing </h2>
<span id="heading">Start Trip: </span><p  v-if="price" v-html="price"></p>

</div>
<!--<div class="tag-widget post-tag-container mb-5 mt-5">
<div class="tagcloud">
<a href="#" class="tag-cloud-link">Life</a>
<a href="#" class="tag-cloud-link">Sport</a>
<a href="#" class="tag-cloud-link">Tech</a>
<a href="#" class="tag-cloud-link">Travel</a>
</div>
</div>
-->
<div class="pt-5 mt-5">
<h3 class="mb-5 text-center">BOOK WITH US!</h3>
<h4 style="color: red;" v-for="error in reservation_message" :key="error.id" id="error_message">- {{ error[0]}} <br></h4>
<div class="comment-form-wrap pt-5">
<h3 class="mb-5">Leave a comment</h3>
<form action="#" class="p-5 bg-light">
<div class="form-group">
<label for="name">Name *</label>
<input type="text" class="form-control" id="name" v-model="reservation_name" required>
</div>
<div class="form-group">
<label for="email">Email *</label>
<input type="email" class="form-control" id="email" v-model="reservation_email" required>
</div>
<div class="form-group">
<label for="phone_number">Phone Number *</label>
<input type="number" class="form-control" id="phone_number" v-model="reservation_phone_number" min="0" required>
</div>



<div class="form-group">
<label for="message">Message</label>
<textarea name="" id="message" cols="3" rows="3" class="form-control" v-model="reservation_textarea"></textarea>
</div>
<div class="form-group">
<input type="submit" value="Send Reservation" @click.prevent="send_reservation()" class="btn py-3 px-4 btn-primary">
</div>
</form>
</div>
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
            id:'',
            key:'',
            tripimage:'',
            
            country:'',
            program:'',
            data:'',
            description:'',
            hotel:'',
            includes:'',
            not_includes:'',
            start_date:'',
            end_date:'',
            no_dayes:'',
            price:'',
            reservation_name:'',
            reservation_email:'',
            reservation_phone_number:'',
            reservation_textarea:'',
            reservation_message:'',
            
    }
  },
  mounted() {
    this.detect_id_key_of_dest();
    this.return_destination_data();

    this.getImages()
    window.scrollTo(0, 0);
},
computed:{
  
},
methods:{
  getImages:function(){
    let formdata=new FormData;
    formdata.append('trip_id',this.id);
    let y = axios.post('https://tourism.nrchrod.org/api/getImagesfortrip',formdata).then(response => {  
       this.tripimage=response.data.message;
      
});
  },
  send_reservation:function(){
   // mail("","My subject",$msg);
   let reservation= new FormData;
   reservation.append("reservation_name",this.reservation_name);
   reservation.append("reservation_email",this.reservation_email);
   reservation.append("reservation_phone_number",this.reservation_phone_number);
   reservation.append("reservation_textarea",this.reservation_textarea);
   reservation.append("reservation_trip_id",this.id);
   reservation.append("reservation_trip_key",this.key);
   
    
    let y = axios.post('https://tourism.nrchrod.org/api/reservation',reservation).then(response => {  
         this.reservation_message=response.data.message;
         document.getElementById('error_message').scrollIntoView({
  behavior: 'smooth'
});;
          })
          

    
  },
detect_id_key_of_dest:function(){
    
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    
    if( urlParams.has('end') )
    {
       this.id = urlParams.get('end');
        console.log(this.id)
    }
    
},



showSlides:function(n) {
  
  
},

        return_destination_data:function(){
            let formdata=new FormData;
            formdata.append("id",this.id)
            //formdata.append("key",this.key)
            
        let x= axios.post('https://tourism.nrchrod.org/api/return_specific_details_about_destinations',formdata).then(response => {  
            this.data=response.data.message
         this.country=response.data.message[0].Country;
         this.program=response.data.message[0].program;
         this.description=response.data.message[0].description;
         this.hotel=response.data.message[0].name_of_hotel;
         this.includes=response.data.message[0].includes;         
         this.not_includes=response.data.message[0].not_includes;
         this.start_date=response.data.message[0].date_start;
         this.end_date=response.data.message[0].date_end;
         this.no_dayes=response.data.message[0].no_days;
         this.price=response.data.message[0].price_single_double;



    });
  }
}
}
</script>
<style scoped>
#program{
    padding: 40px 30px;
    border-radius: 16px; 
    box-shadow: 0 12px 18px 0 rgba(104, 104, 104, 0.08);
    border: solid 1px #ebebeb; 
    background-color: #ffffff;
    margin-top: 40px;
    color:black
}
#heading{
    font-weight: bold;
}
img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>