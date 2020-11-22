@extends('frontendtemplate')
@section('content')

<!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="index.html" class="nav-brand">Music Library</a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{route('mainpage')}}">Home</a></li>
                                    <li><a href="{{route('songs')}}">Songs</a></li>
                                    
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                     <li><a href="{{route('Heart')}}">Favourite</a></li>
                                    <li class="nav-item dropdown">

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" style="color: black;">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>

                                        
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        
                                    </li>
                                </ul>

                                
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('frontend_asset/img/bg-img/bg-1.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{asset('frontend_asset/img/bg-img/bg-2.jpg')}});"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music <span>Colorlib Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Buy Now Area Start ##### -->
    
    <!-- ##### Buy Now Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">


                


                

  <div class="col-12 col-lg-4">

                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>
                        
                       
                        <!-- Single Top Item -->
                        @php $j=1; @endphp
                            @for($j;$j<8;$j++)
                            @php  
                                $song=$Allsong[$j];
                            @endphp
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp SongOfOneSinger" data-wow-delay="100ms">

                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="{{asset($song->singer->photo)}}" alt="">

                                </div>
                                <div class="content-">
                                    <h6>{{ $song->name }}</h6>
                                    <p>{{ $song->singer->name }}</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>

                                <source src="{{asset($song->song_url)}}">

                            </audio>
                        </div>
                       
                        @endfor
                   

                    


                    </div>
                </div>


                 <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Artist</h2>
                        </div>


                        @php $i=1; @endphp
                            @for($i;$i<9;$i++)
                            @php  
                                $singer=$Allsinger[$i];
                            @endphp
                    
                            <!-- Single Artist -->
                            <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                                <div class="thumbnail">
                                    <a  href="{{route('OneSingerSongs',$singer->id)}}">
                                    <img src="{{ $singer->photo }}" class="img-fluid " alt="{{$singer->id}}" style="height: 60px;" value="{{$singer->id}}" ></a>
                                </div>
                                <div class="content-">
                                    <a href="{{route('SongsByOneSingerOnePage',$singer->id)}}">  {{ $singer->name }}</a>
                                   
                                    
                                </div>
                            </div>

                            @endfor
                      
               
                       

                    </div>
                </div>
               

              

                <!-- ***** New Hits Songs///////////////////////////////// ***** -->
             

                <div class="col-12 col-lg-4 ">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>
                        
                        @foreach($Onesinger->songs as $song)
                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp SongOfOneSinger" data-wow-delay="100ms">

                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="{{asset($song->singer->photo)}}" alt="">
                                </div>
                                <div class="content-">
                                    <h6>{{ $song->name }}</h6>
                                    <p>{{ $song->singer->name }}</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>

                                <source src="{{asset($song->song_url)}}">

                            </audio>
                             
                        </div>
                        @endforeach
                   

                    


                    </div>
                </div>
            

                
                    <div class="col-12 col-lg-4 " id="songShow">

                </div>

                                    <!-- ***** Weeks Top ***** -->





            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url({{asset('frontend_asset/img/bg-img/bg-2.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <p>See what’s new</p>
                        <h2>What's Request</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <form action="" method="POST" class="checkoutform">
                        @csrf
                        <div class="contact-form-area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="request_msg" class="form-control request_msg" id="message" placeholder="Enter your request here!" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    @role('user')
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                    @else
                                    <button class="btn oneMusic-btn mt-30">Please Login or Register first! <i class="fa fa-angle-double-right"></i></button>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

@endsection


@section('script')

<script type="text/javascript">
    
    $(document).ready(function(){
        $.ajaxSetup({
                    headers: 
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                 });

        


        $('.SongOfSinger').click(function(){
             $(".songSH").hide();

            let SingerID =$(this).attr("value");
            //alert(SingerID);
            $.post("{{route('filterSongOfSinger')}}",{sid:SingerID},function(response){
                console.log(response);

                var i=response.length;
               

               // var songs = [];
               var html="";
               html+=`
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>`;
                for(let row of response)
                {
                    console.log(row.name);
                      html+=
                    ` <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp SongOfOneSinger" data-wow-delay="100ms">

                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="frontend_asset/img/bg-img/wt1.jpg" alt="">
                                </div>
                                <div class="content-">
                                    <h6> ${row.name} </h6>
                                   
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="${row.song_url}">
                            </audio>
                        </div>`
                }
                html+=`</div>`;

                $('#songShow').html(html);

            })

        })


       //$(document).ajaxComplete(function(){
         // $(".SongOfSinger").load("demo_ajax_load.asp");
   //<link rel="stylesheet" href="">
 // });




//

    })


</script>



@endsection

 <!-- Favicon -->
    





@section('hmhscript')
    
    <script>
        $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $('.checkoutform').submit(function(e){
                let request_msg = $('.request_msg').val();
                if(request_msg === ""){
                    return true;
                }else{
                    $.post("{{ route('request_song.store') }}", {request_msg:request_msg}, function(response){
                        alert(response);
                        location.href="/";
                    })
                }
                e.preventDefault();
            })
        });
    </script>
@endsection

