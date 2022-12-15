@extends('layouts.app')

@section("css")
    @vite(["/resources/css/salle.css"])
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
      <img src="{{asset('storage/'.$oeuvre->media_url)}}" draggable="false" data-id="{{$oeuvre->id}}" data-auteur="{{$oeuvre->auteur}}" data-desc="{{$oeuvre->description}}" data-x="{{$oeuvre->coord_x}}" data-y="{{$oeuvre->coord_Y}}" alt="{{$oeuvre->nom}}">
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
    <div id="detailAuteur"></div>
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
        echo "{ titre: \"". $comm->titre. "\", contenu: \"". $comm->contenu . "\", id: \"". $comm->id . "\", idOeuvre:\"".$comm->oeuvre_id."\", date: \"". $comm->updated_at . "\", valid:\"".$comm->valide."\"}," ;
      } else {
        if($user->admin){
          echo "{ titre: \"". $comm->titre. "\", contenu: \"". $comm->contenu . "\", id: \"". $comm->id . "\", idOeuvre:\"".$comm->oeuvre_id."\", date: \"". $comm->updated_at . "\", valid:\"".$comm->valide."\"}," ;
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
      const url = new URL(location.href);
      const urlId = url.href.split('#')[1]
      console.log(urlId)
      const boxToScroll = document.querySelector(`#box${urlId}`)
      console.log(boxToScroll)
      const {height, bottom} = boxToScroll.getBoundingClientRect()
      console.log(height, bottom)
      gsap.to(window, {duration:.5, scrollTo: bottom-height-150, ease:'power1.out'})
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

  function createComment(comm, id) {
    if(id == comm.idOeuvre){
      let comm_container = document.createElement("div");
      let titre = document.createElement("h3");
      let content = document.createElement("p");
      let comms_target = document.getElementById("detailComms");
      comm_container.classList.add("comm");
      titre.textContent= comm.titre;
      comm_container.appendChild(titre);
      content.textContent= comm.contenu;
      comm_container.appendChild(content);
    @auth()
      @if(Auth::user()->admin==1)
        if(!parseInt(comm.valide)){
          let form_container= document.createElement("div");
          form_container.id = "form_container";
          form_container.classList.add("AR_form");

          let form_validate = document.createElement("form");
          form_validate.setAttribute("method", "post");
          form_validate.setAttribute("action", "route('commentaire.valide')");

          let commId = document.createElement("input");
          commId.setAttribute("type", "hidden");
          commId.setAttribute("name", "commId");
          commId.setAttribute("value", comm.id);

          form_validate.appendChild(commId);

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
          
          form_validate.appendChild(checkmark);
          let csrf = document.getElementsByName("_token")[0].cloneNode();
          form_validate.appendChild(csrf);




          let form_reject = document.createElement("form");
          form_reject.setAttribute("method", "post");
          form_reject.setAttribute("action", "route('commentaire.supprime')");

          let reject = document.createElement("input");
          reject.setAttribute("type", "submit");
          reject.setAttribute("name", "submit");
          reject.classList.add("reject");
          reject.id="submit_reject";
          reject.innerHtml = "<i class='bx bxs-trash'></i>";

          commId = document.createElement("input");
          commId.setAttribute("type", "hidden");
          commId.setAttribute("name", "commId");
          commId.setAttribute("value", comm.id);
          form_reject.appendChild(commId);

          let trash = document.createElement('i');
          trash.classList.add("bx");
          trash.classList.add("bxs-trash");
          trash.appendChild(reject);

          form_reject.appendChild(trash);
          csrf = document.getElementsByName("_token")[0].cloneNode();
          form_reject.appendChild(csrf);

          form_container.appendChild(form_validate);
          form_container.appendChild(form_reject);

          comm_container.appendChild(form_container);

        }
        @endif
        @endauth

      comms_target.appendChild(comm_container);
    }
  }
  
  function showDetail(t){
    console.log("t:::",t)
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
        .set('#detailAuteur', {innerHtml:"<a href=''>"+t.dataset.auteur+"</a>"}, 0)
        .set('#detailImg', {background:'url('+t.src+') center no-repeat'}, 0)
        .fromTo('#detail', {top:'100%'}, {top:0, ease:'expo.inOut'}, 0)
        .fromTo('#detailImg', {y:'100%'}, {y:'0%', ease:'expo', duration:0.7}, 0.2)
        .fromTo('#detailTxt', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
        .fromTo('#detailDesc', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
        .fromTo('#detailComms', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
        .fromTo('#detailInput', {opacity:0}, {opacity:1, ease:'power2.inOut'}, 0.4)
      document.body.style.overflow = "hidden";
      let comms_target = document.getElementById("detailComms");
      document.getElementById('sortAsc').dataset.idSelected = t.dataset.id
      document.getElementById('sortDesc').dataset.idSelected = t.dataset.id
      for (comm of commentaires){
        if(t.dataset.id == comm.idOeuvre){
          createComment(comm, t.dataset.id)
          /*let comm_container = document.createElement("div");
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
              let form_container= document.createElement("div");
              form_container.id = "form_container";
              form_container.classList.add("AR_form");

              let form_validate = document.createElement("form");
              form_validate.setAttribute("method", "post");
              form_validate.setAttribute("action", "route('commentaire.valide')");

              let commId = document.createElement("input");
              commId.setAttribute("type", "hidden");
              commId.setAttribute("name", "commId");
              commId.setAttribute("value", comm.id);

              form_validate.appendChild(commId);

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
              
              form_validate.appendChild(checkmark);
              let csrf = document.getElementsByName("_token")[0].cloneNode();
              form_validate.appendChild(csrf);




              let form_reject = document.createElement("form");
              form_reject.setAttribute("method", "post");
              form_reject.setAttribute("action", "route('commentaire.supprime')");

              let reject = document.createElement("input");
              reject.setAttribute("type", "submit");
              reject.setAttribute("name", "submit");
              reject.classList.add("reject");
              reject.id="submit_reject";
              reject.innerHtml = "<i class='bx bxs-trash'></i>";

              commId = document.createElement("input");
              commId.setAttribute("type", "hidden");
              commId.setAttribute("name", "commId");
              commId.setAttribute("value", comm.id);
              form_reject.appendChild(commId);

              let trash = document.createElement('i');
              trash.classList.add("bx");
              trash.classList.add("bxs-trash");
              trash.appendChild(reject);

              form_reject.appendChild(trash);
              csrf = document.getElementsByName("_token")[0].cloneNode();
              form_reject.appendChild(csrf);



              form_container.appendChild(form_validate);
              form_container.appendChild(form_reject);

              comm_container.appendChild(form_container);

            }
            @endif
            @endauth

          comms_target.appendChild(comm_container);
          */}
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
  let speed = document.addEventListener("DOMMouseScroll", wheelDistance);
  let sortAsc = document.getElementById("sortAsc");
  let sortDesc = document.getElementById("sortDesc");

  sortAsc.addEventListener("click", (e)=>{
    sortDesc.classList.remove("active");
    sortAsc.classList.add("active");
    const id = e.currentTarget.dataset.idSelected
    
    const commContainer = document.querySelector('#detailComms')
    commContainer.innerHTML=""
    const filtered = commentaires.filter(c => c.idOeuvre == id)
    const sorted = filtered.sort((a, b) => new Date(b.date) - new Date(a.date))
    sorted.forEach(el => createComment(el, id))
    commContainer.scrollTo(0, 0)
  });
  sortDesc.addEventListener("click", (e)=>{
    sortDesc.classList.add("active");
    sortAsc.classList.remove("active");
    const id = e.currentTarget.dataset.idSelected
    
    const commContainer = document.querySelector('#detailComms')
    commContainer.innerHTML=""
    const filtered = commentaires.filter(c => c.idOeuvre == id)
    const sorted = filtered.sort((a, b) => new Date(a.date) - new Date(b.date))
    sorted.forEach(el => createComment(el, id))
    commContainer.scrollTo(0, 0)
  });


</script>
@endsection
