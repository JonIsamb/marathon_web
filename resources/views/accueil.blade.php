@extends('layouts.app')

@section('content')
<div class="containerhome">
    <div class="presentation">
        <div class="header">
            <h1 class="header__title">Capitol Art Gallery</h1>
            <p class="header__desc">Le musée virtuel développé par une IA qui vous bluffera</p>
            <a href="{{ route('salle.show', 1) }}" class="header__cta button">Débuter la visite</a>
        </div>

        <div class="colors">
            <div class="colorsRed"></div>
            <div class="colorsBlue"></div>
            <div class="colorsGreen"></div>
        </div>
    </div>
</div>
<section class="desc">
    <div class="containerMax">

        <div class="desc__section">
            <div class="desc__text">
                <h2 class="desc__title">Un musée <span class="text-gradient">surprenant</span> !</h2>
                <p class="desc__p">La Capitol Art Gallery a décidé aujourd’hui d’innover et de changer les modes de visites habituels. Cette exposition a pris longtemps avant d’avoir le courage de se lancer, mais ce jour est arrivé et c’est avec fierté et détermination que l’exposition virtuelle de la Capitol Art Gallery ouvre ses portes !</p>
            </div>
            <div class="desc__deco desc__sq">
                <div class="desc__square green"></div>
                <div class="desc__square circle orange"></div>
                <div class="desc__square circle blue"></div>
                <div class="desc__square red"></div>
            </div>
        </div>
         <div class="desc__section">
            <div class="desc__text">
                <h2 class="desc__title"><span class="text-gradient">Voyagez</span> avec nous</h2>
                <p class="desc__p">Vous allez avoir la possibilité de vous déplacer virtuellement dans différentes salles qui sont séparées par thème. La Capitol Art Gallery souhaite être originale et changer vos façons de découvrir l’art.</p>
            </div>
            <div class="desc__deco"></div>
        </div>
         <div class="desc__section">
            <div class="desc__text">
                <h2 class="desc__title">Une intelligence <span class="text-gradient">artificielle</span>, ça vous dit?</h2>
                <p class="desc__p">Les intelligences artificielles sont en train de retourner le monde, cette nouvelle technologie consiste à mettre en œuvre un certain nombre de techniques visant à permettre aux machines d'imiter une forme d'intelligence réelle. Impressionnant non ? Dans cette exposition vous aurez la chance d’observer la génération d’images dans le style de grands artistes, tel que Picasso, Matisse, Van Gogh et Hokusai. Nous avons choisi des artistes plutôt différents afin que les styles soient variés et riches en découverte.</p>
            </div>
            <div class="desc__deco"></div>
        </div>
        <div class="desc__section desc__section-salles">
            <div class="desc__text">
                <h2 class="desc__title">5 <span class="text-gradient">SALLES</span>, des artistes de renommée, dont vous</h2>
                <p class="desc__p">Dans ces salles, 4 d’entre elles seront réparties par les 4 artistes (Picasso, Matisse, Van Gogh et Hokusai), vous trouverez des œuvres générées via les intelligences artificielles par le style d’un de ces artistes. Il nous manque une salle à vous présenter, vous vous demandez surement en quoi celle salle va consister. Surprise ! Elle vous sera entièrement dédiée, vous trouverez des œuvres générées par vous-mêmes, par vos propres choix. Vous aurez la possibilité de les ajouter et nous les faire partager.</p>
            </div>
            <div class="desc__deco desc__salles">
                <div class="desc__salle"></div>
                <div class="desc__salle"></div>
                <div class="desc__salle"></div>
                <div class="desc__salle"></div>
                <div class="desc__salle"></div>
            </div>
        </div>
        <div class="desc__section">
           <div class="desc__text">
               <h2 class="desc__title">MAIS, <span class="text-gradient">POURQUOI</span> ?</h2>
               <p class="desc__p">Pourquoi ce concept de visite artificielle sur les générations d’images ? Car la Capitol Art Gallery souhaite s’élancer vers la modernité en commençant par se mettre aux nouveaux modes de visites possibles via les nouvelles technologies. Cela vous permettra d’expérimenter de nouvelles choses.</p>
           </div>
           <div class="desc__deco"></div>
       </div>
       <a class="letsgo button">C'est parti !</a>
    </div>
    </section>
    @endsection
