@extends('layouts.app')

@section("css")
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        *{
          --background-color: #202124;
          --gray: #555;
        }
html, body, #app {
  width:100%;
  height:100%;
  margin:0;
  padding:0;
  font-size:0;
  font-family: 'Montserrat', sans-serif;
}

#app {
  opacity:0;
  height:auto;
  background:radial-gradient(#ccc, #999);
}

#app img {
  display:block;
}

#detail {
  position:absolute;
  width:100%;
  height:100%;
  background:#111;
  top:100%;
  display:flex;
  flex-direction:column;
  align-items:center;
}

#detailImg {
  width:80%;
  height:80%;
}


#detailTxt {
  font-size:40px;
  letter-spacing:1px;

  margin-top:70vh;
  text-align:center;
  color: white;
    
  

}
.comm {
  max-width: 60vw;
  border-color: #0000;
  border-radius: 50px;
  background-color: var(--background-color);
  padding: 10px;
  padding-inline:40px;
  margin-top:20px;
  
}
.comm h3{
  text-align:center;
  font-size:20px;
}
.comm p{
  text-align:center;
  font-size:14px;
}
#detailDesc {
  color:#ccc;
  margin-top:30px;
  font-size:16px;
  letter-spacing:1px;
  opacity: 0;
  padding-inline:20vw;
}
#detailComms {
  color:#ccc;
  font-size:10px;
  letter-spacing:1px;
  opacity: 0;
  width:60vw;
  margin-inline:auto;
  max-height: 50vh;
  min-height: 300px;
  overflow: scroll;
}

#detailInput {
  color:#ccc;
  font-size:10px;
  margin-top:20px;
  width:70vw;
  margin-inline:auto;
  letter-spacing:1px;
  opacity: 0;
  z-index:20;
  color: darkgray;
  display:flex;
  justify-content:center;
  align-items:center;
  color: white;
  flex-direction:column;
}
#detailInput input, #detailInput textarea{
  background-color: var(--background-color);
  border-radius: 20px;
  border-color: #000F;
  border-width:0;
  width:50vw;
  padding-inline:30px;
  color: white;


}
#detailInput input{
  font-size:25px;
  text-align:center;
}
#detailInput textarea{
  resize: none;
  rows:5;
  padding:10px;
  padding-inline:30px;
  font-size: 16px
}

#detailInput textarea:focus,#detailInput input:focus{
    outline: none;
}
svg {
  pointer-events:none;
  position:absolute;
  top:0;
  left:0;
}
#close{
  position: sticky;
  margin-left:80vw;
  top: 5vh;
  min-width: 50px;
  min-height: 50px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:50px;
  color:#EF4444;
  z-index:20;
}
#headlines {
  max-width:800px;
  min-width:450px;
  left:50%;
  top:50%;
  transform:translate(-50%, -50%);
}
.imgBox{
  overflow: visible !important;
}
#detailImg{
    position: absolute;
    height: 60vh;
    top:5vh;
  }
 
  #like{
    position:absolute;
    top: 55vh;
    color: white;
    font-size: 25px;
    padding: 10px;
    right: 15vw;
  }
  #like button{
    border-radius:75px;
    padding:10px;
    font-size: 60px;
    background-color:#000000FF;
    color: white;
    aspect-ratio:1;
  }
  #like button i{
    display: flex;
    align-items:center;
    justify-content:center;
  }
  #comments_title{
    width: 100vw;
    text-align:center;
    Font-size: 28px;
    margin-top: 30px;
    color: white;
  }
  #sortComments{
    font-size:14px;
    color: var(--gray);
    display: flex;
    justify-content:center;
    align-items:center;
    height:50px;
    margin-bottom:20px;
  }
  #sortAsc, #sortDesc{
    padding:10px;
    font-size:35px;
    border-radius: 50px;
    aspect-ratio:1;
    display: flex;
    align-items:center;
    justify-content:center;
  }
  #sortAsc{
    margin-left:30px;
  }
  .active{
    font-size:32px;
    background-color: var(--gray);
    color:white;

  }
  #commentaire_cta{
    color:white;
    text-align:center;
    font-size: 34px;
  }
  @media screen and (max-width: 1000px){
    #detailInput input, #detailInput textarea{
      width:70vw;
    }
    #detailComms {
      width: 70vw;
    }
    .comm {
      max-width: 70vw;
    }
  }
  #detailInput form{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: center;
    gap:10px;
  }
  #valider{
    background-color: var(--background-color);
    color: white;
    padding:10px;
    padding-inline:25px;
    border-color:#0000;
    border-radius:50px;
    font-size:16px;
    margin-bottom:30px
  }
  .AR_form{
    display:flex;
    justify-content: space-between;
    align-items:center;
    height: 50px;
    width: 70%;
    margin-inline:auto;
  }
  .validate, .reject{
    width: 50px;
    height: 50px;
    z-index: 20;
    position:absolute;
    left:0px;
    visibility: Hidden;
    
  }
  .bx-check{
    position: relative;
    color: green;
    font-size: 60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
  }

  .bxs-trash{
    position: relative;
    color:#EF4444;
    font-size: 40px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
  }
@media screen and (max-width: 600px){
  #detailInput input, #detailInput textarea{
    width:80vw;
  }
  #detailImg{
    height: 40vh;
  }
  #close{

  right: 20px;
  top: 20px;
  }
  #detailTxt{
    margin-top:40vh;
    
  }
  #detailImg {
  width:100%;
  top:0;
  }
  #like{
    top:30vh;
    right:2vw;
  }
  #like button{
    font-size: 40px;
  }
  #detailComms {
    width: 90vw;
  }
  .comm {
  max-width: 90vw;
  }
  @media screen and (min-width: 1250px){
    #like{
      top:32vh;
      right:32vw;
    }
  }
}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollToPlugin.min.js
"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection


@section('content')
    
<div id="scrollDist">
  <div id="app">
    
    <div id="imgGroup">
  @if(($salle->id)+1<=5)
      <img src="{{asset('storage/images/salles/portal.png')}}" draggable="false" data-to="{{($salle->id)+1}}" data-x="250" data-y="-300">
  @else
      <img src="{{asset('storage/images/salles/portalO.png')}}" draggable="false" data-to="{{($salle->id)+1}}" data-x="250" data-y="-300">

  @endif
    @foreach ($oeuvres as $oeuvre)
      <img src="{{asset('storage/'.$oeuvre->media_url)}}" draggable="false" data-id="{{$oeuvre->id}}" data-desc="{{$oeuvre->description}}" data-x="{{$oeuvre->coord_x}}" data-y="{{$oeuvre->coord_Y}}" alt="{{$oeuvre->nom}}">
    @endforeach
    </div>
    
  <div id="detail">
    <div id="close"><i class='bx bx-x' ></i></div>
    <div id="detailImg"></div>
    @auth()
        <form id="like" method="POST" action=""> <!-- route('user.like') --> 
            @csrf
            <input type="hidden" name="oeuvre_id" class="oeuvre_id" value="">
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
            <button type="submit" class="btn btn-primary"><i class='bx bx-like'></i></button>
        </form>
    @endauth
    <div id="detailTxt"></div>
    <div id="detailDesc"></div>
    <div id="comments_title"><h2>Commentaires</h2></div>
    <div id="sortComments">
      <h2 >par date</h2> 
      <h2 id="sortAsc"><i class='bx bxs-chevron-up' ></i></h2>
      <h2 id="sortDesc"><i class='bx bxs-chevron-down' ></i></h2>
    </div>
    <div id="detailComms"></div>
    @auth()
    <div id="detailInput">
      <h1 id="commentaire_cta">Participez à la discussion</h1>
      <form method="POST" action="{{route('commentaire.store')}}">
          @csrf
          <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre">
    
          <textarea type="text" name="texte" class="form-control" id="texte" placeholder="Commentez"></textarea>
    
          <input type="hidden" name="oeuvre_id" class="oeuvre_id" value="{{$oeuvre->id}}">
          <button type="submit" id="valider">Valider</button>
      </form>
    </div>
    @endauth
  </div>
  
</div>

<script>
  let commentaires = [
      <?php  
    foreach($commentaires as $comm){
      if($comm->valide){
        echo "{ titre: \"". $comm->titre. "\", contenu: \"". $comm->contenu . "\", id: \"". $comm->id . "\", idOeuvre:\"".$comm->oeuvre_id."\", date: \"". $comm->date_post . "\", valid:\"".$comm->valide."\"}," ;
      } else {
        if($user->admin){
          echo "{ titre: \"". $comm->titre. "\", contenu: \"". $comm->contenu . "\", id: \"". $comm->id . "\", idOeuvre:\"".$comm->oeuvre_id."\", date: \"". $comm->date_post . "\", valid:\"".$comm->valide."\"}," ;
        }
      }
    }
    ?>];
    window.onload = () => {
      gsap.registerPlugin(ScrollTrigger);
      gsap.set('#scrollDist', {
        width: '100%',
        height: gsap.getProperty('#app', 'height'), // apply the height of the image stack
        onComplete: () => {
          gsap.set('#app, #imgGroup', {opacity:1, position:'fixed', width:'100%', height:'100%', top:0, left:0, perspective:300}) 
          gsap.set('#app img', {
            position: 'absolute',
            attr: { 
              id: (i,t,a) => { //use GSAP's built-in loop to setup each image
                initImg(i,t);
                return 'img'+i;
              }
            }
          })
        }
          
      })

      gsap.timeline({
        defaults:{ duration:1 },
        onUpdate:()=>{ }, //close detail view on scroll
        scrollTrigger:{
          trigger: '#scrollDist',
          start: 'top top',
          end: 'bottom bottom',
          scrub: 1
        }
      })
      .fromTo('.imgBox', {z:-3000}, {z:350, stagger:-0.3, ease:'none'}, 0.3)
      .fromTo('.imgBox img', {scale:3}, {scale:1.15, stagger:-0.3, ease:'none'}, 0.3)      
      .to('.imgBox', {duration:0, pointerEvents:'auto', stagger:-0.3}, 0.5)
      .from('.imgBox img', {duration:0.3, opacity:0, stagger:-0.3, ease:'power1.inOut'}, 0.3)
      .to('.imgBox img', {duration:0.1, opacity:0, stagger:-0.3, ease:'expo.inOut'}, 1.2)      
      .to('.imgBox', {duration:0, pointerEvents:'none', stagger:-0.3}, 1.27)
      .add('end')
 
      // intro animation
      //gsap.fromTo(window, {scrollFrom:gsap.getProperty('#box1','height')} {duration:2.4, scrollTo:gsap.getProperty('#box1','height'), ease:'power1.out'});
      //gsap.from('.imgBox', {duration:0.2, opacity:0, stagger:0.06, ease:'power1.inOut'})
    }
  
  function initImg(i,t){
    const box = document.createElement('div') // make a container div
    box.appendChild(t) // move the target image into the container
    document.getElementById('imgGroup').appendChild(box) // put the container into the imgGroup div
    gsap.set(box, {
        pointerEvents:'none',
        position:'absolute',
        attr:{ id:'box'+i, class:'imgBox' },
        width:t.width,
        height:t.height,
        overflow:'hidden',
        top:'50%',
        left:'50%',
        x:t.dataset.x,
        y:t.dataset.y,
        xPercent:-50,
        yPercent:-50,
        perspective:500
      })

    
    t.onmousedown =()=> {
      gsap.to(t, {z:-25, ease:'power2'})
      
    }
    
    t.onmouseup =()=> gsap.to(t, {z:0, ease:'power1.inOut'})
    
    
    t.onclick =()=> showDetail(t)
  }  
  
  function showDetail(t){
    @auth 
    for (elem of document.getElementsByClassName("oeuvre_id")){
      elem.value = t.dataset.id;
    }
    @endauth
     if (t.dataset.to){
      if(parseInt(t.dataset.to)>=6){
        window.location.replace("/");
      } else{
        window.location.replace("/salle/"+t.dataset.to);
      }
      
    } else {
      gsap.timeline() //detailDesc
        .set('#detailTxt', {textContent:t.alt}, 0)
        .set('#detailDesc', {textContent:t.dataset.desc}, 0)
        .set('#detailImg', {background:'url('+t.src+') center no-repeat'}, 0)
        .fromTo('#detail', {top:'100%'}, {top:0, ease:'expo.inOut'}, 0)
        .fromTo('#detailImg', {y:'100%'}, {y:'0%', ease:'expo', duration:0.7}, 0.2)
        .fromTo('#detailTxt', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
        .fromTo('#detailDesc', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
        .fromTo('#detailComms', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
        .fromTo('#detailInput', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
      document.body.style.overflow = "hidden";
      let comms_target = document.getElementById("detailComms");

      for (comm of commentaires){
        if(t.dataset.id == comm.idOeuvre){
          let comm_container = document.createElement("div");
          comm_container.classList.add("comm");
          let titre = document.createElement("h3");
          titre.textContent= comm.titre;
          comm_container.appendChild(titre);
          let content = document.createElement("p");
          content.textContent= comm.contenu;
          comm_container.appendChild(content);
        @auth()
          @if(Auth::user()->admin==1)
            if(!parseInt(comm.valide)){
              let form = document.createElement("form");
              form.setAttribute("method", "post");
              form.setAttribute("action", "route('user.validate')");
              form.classList.add("AR_form");

              let commId = document.createElement("input");
              commId.setAttribute("type", "hidden");
              commId.setAttribute("name", "commId");
              commId.setAttribute("value", comm.id);

              form.appendChild(commId);
            
          

              let validate = document.createElement("input");
              validate.setAttribute("type", "submit");
              validate.setAttribute("name", "submit");
              validate.innerHtml = "<i class='bx bx-check'></i>";
              validate.id="submit_validate";
              validate.classList.add("validate");


              let checkmark = document.createElement('i');
              checkmark.classList.add("bx");
              checkmark.classList.add("bx-check");
              checkmark.appendChild(validate);
              
              form.appendChild(checkmark);
              

              let reject = document.createElement("input");
              reject.setAttribute("type", "submit");
              reject.setAttribute("name", "submit");
              reject.classList.add("reject");
              reject.id="submit_reject";
              reject.innerHtml = "<i class='bx bxs-trash'></i>";

              let trash = document.createElement('i');
              trash.classList.add("bx");
              trash.classList.add("bxs-trash");
              trash.appendChild(reject);

              form.appendChild(trash);

              let csrf = document.getElementsByName("_token")[0].cloneNode();
              form.appendChild(csrf);
              comm_container.appendChild(form);

            }
            @endif
            @endauth

          comms_target.appendChild(comm_container);
        }
      }
      document.getElementById("detail").style.overflow = "scroll";
    }

  }
  
  function closeDetail(){
    gsap.timeline()
        .to('#detailTxt', {duration:0.3, opacity:0}, 0)
        .to('#detailDesc', {duration:0.3, opacity:0}, 0)   
        .to('#detailComms', {duration:0.3, opacity:0}, 0)   
        .to('#detailInput', {duration:0.3, opacity:0}, 0)       
        .to('#detailImg', {duration:0.3, y:'-100%', ease:'power1.in'}, 0)
        .to('#detail', {duration:0.3, top:'-100%', ease:'expo.in'}, 0.1)
    document.body.style.overflow = "scroll";
    document.getElementById("detail").style.overflow = "hidden";
  }
  document.getElementById('close').onclick = closeDetail;
    
  if (ScrollTrigger.isTouch==1) { // on mobile, hide mouse follower + remove the x/y positioning from the images
    
    gsap.set('.imgBox', {x:0, y:0})
  } else {
    
    // quickTo can be used to optimize x/y movement on the cursor...but it doesn't work on fancier props like 'xPercent'

    
    window.onmousemove =(e)=> {      
      gsap.to('.imgBox', { // move + rotate imgBoxes relative to mouse position
        xPercent:-e.clientX/innerWidth*100,
        yPercent:-25-e.clientY/innerHeight*50,
        rotateX:8-e.clientY/innerHeight*16,
        rotateY:-8+e.clientX/innerWidth*16
      })
      
      gsap.to('.imgBox img', { // move images inside each imgBox, creates additional parallax effect
        xPercent:-e.clientX/innerWidth*10,
        yPercent:-5-e.clientY/innerHeight*10
      })
      
      
    }
  }

var wheelDistance = function(evt) {
 
 // Detail describes the scroll precisely
 // Positive for downward scroll
 // Negative for upward scroll
 var d = evt.detail;
      console.log("scrolled");
 // Returning normalized value
 return -d / 30;
}

// Adding event listener for some element
let speed = document.addEventListener(
    "DOMMouseScroll", wheelDistance);


    let sortAsc = document.getElementById("sortAsc");
    let sortDesc = document.getElementById("sortDesc");

    sortAsc.addEventListener("click", ()=>{
      sortDesc.classList.remove("active");
      sortAsc.classList.add("active");
    });
    sortDesc.addEventListener("click", ()=>{
      sortAsc.classList.remove("active");
      sortDesc.classList.add("active");
    });

</script>
@endsection
