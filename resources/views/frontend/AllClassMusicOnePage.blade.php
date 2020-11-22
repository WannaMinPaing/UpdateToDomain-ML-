@extends('frontendtemplate')
@section('content')

    <!-- ##### Header Area Start ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

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
                                    <li style="margin-right: 100px; width: 400px;"><input type="search" name="" class="filter_search form-control mb-3" placeholder="Search" style="background-color: #212529; color: #73f957;"></li>
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
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay mb-5" style="background-image:url({{asset('frontend_asset/img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <p>See what’s new</p>

            <h2>Enjoy The Music</h2>

        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <!--delete space wanna-->
    <!-- ##### Buy Now Area End ##### -->

    <!-- ##### Add Area Start ##### -->

    

    {{-- <div class="add-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="adds">
                        <a href="#"><img src="{{asset('frontend_asset/img/bg-img/add3.gif')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- ##### Add Area End ##### -->

    <div class="container mb-5 filter_active">
         


       <a  href="{{route('songs')}}" class="filter_btn_all my-3">All</a>
       
        <a  href="{{route('AllClassMusicOnePage2',"Internation" )}}" class="filter_btn_inter my-3">International</a>
        <a  href="{{route('AllClassMusicOnePage2',"Local" )}}" class="filter_btn_local my-3">Local</a>
        <a  href="{{route('AllClassMusicOnePage2',"Kpop" )}}" class="filter_btn_kpop my-3">K Pop</a>
        <a  href="{{route('AllClassMusicOnePage',"Male" )}}" class="filter_btn_male my-3">Male</a>
        <a  href="{{route('AllClassMusicOnePage',"Female" )}}" class="filter_btn_female my-3">Female</a>
        
    </div>


    <!-- ##### Song Area Start ##### -->
    <div class="one-music-songs-area mb-70">
        <div class="container">
            <div class="row filter_songs">

                <!-- Single Song Area -->
                @php 
                    $i = 1;
                @endphp
                @foreach($Singers as $Singer)
                 @foreach($Singer->songs as $song)
                 
                
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="{{asset($song->singer->photo)}}" alt="" >
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p >{{$i}}. {{$song->name}}
                                  

                                    <i type="submit" class="HIcon fas fa-heart fa-1x ml-3" style="color: blue" 
                                    id="{{$song->id}}"

                                    data-song_name="{{$song->name}}" data-song_url="{{asset($song->song_url)}}" data-id="{{$song->id}}"

                                    data-SingerImg="{{asset($song->singer->photo)}}"
                                    ></i>

                                     <i type="submit" class="far fa-thumbs-up BtnLike ml-3" id="{{$song->id}}"></i>

                                     
                                    
                                 </p>
                            </div>

                            <audio preload="auto" controls>
                                <source src="{{asset($song->song_url)}}">
                            </audio>
                        </div>
                    </div>
                </div>

                @php
                    $i++;
                @endphp
              @endforeach
                @endforeach
                
                 

            </div>
        </div>
    </div>
    <!-- ##### Song Area End ##### -->

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
    
    $(document).ready(function() {
        $('.filter_active > a').click(function(){
            $('.filter_active > a').removeClass('active_filter');
            $(this).addClass('active_filter');
        });

        
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        $('.filter_search').keyup(function() {
                var key = $(this).val();
                // console.log(key);
                $.post('{{route('search')}}', {key: key}, function(response) 
                {
                    // console.log(response);
                    var html = "";
                    var i = 1;
                    for (song of response) {
                        html+=`
                                <div class="col-12">
                                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                                        

                                        <div class="song-thumbnail">
                                            <img src="${song.singer.photo}" alt="" >
                                        </div>
                                        
                                        <div class="song-play-area">
                                            <div class="song-name">
                                                <p >${i++}. ${song.name }
                                                 
                                                 </p>

                                                 
                                                
                                                
                                            </div>
                                            <audio preload="auto" controls>
                                                <source src="${song.song_url}">
                                            </audio>

                                        </div>
                                    </div>
                                </div>
                                `;
                    }

                    $('.filter_songs').html(html);
                });
            });
        
    $(".HIcon").click(function(){
        $(this).css({"color": "red"});
        
         var id=$(this).data('id');
                var name=$(this).data('song_name');
                var url=$(this).data('song_url');
               

                var item=
                {
                    id:id,
                    name:name,
                    url:url,
                   
                    
                }
               
                   

                    var Heartlist=localStorage.getItem("Heart_song");

                    var HeartArray;
                
                    if(Heartlist==null)
                    {
                        HeartArray=[];
                    }
                    else
                    {
                        HeartArray=JSON.parse(Heartlist);
                    }

                    var have=true;
                    $.each(HeartArray,function(i,v)
                    {
                        if(v.id==id)
                        {
                           
                            have=false;
                        }
                    })

                    if(have)
                    {
                        HeartArray.push(item);
                    }

                    var itemstring=JSON.stringify(HeartArray);
                    localStorage.setItem("Heart_song",itemstring);
        });

    $('.checkoutform').submit(function(e){
                let request_msg = $('.request_msg').val();
                if(request_msg === ""){
                    return true;
                }else{
                    $.post("{{ route('request_song.store') }}", {request_msg:request_msg}, function(response){
                        alert(response);
                        $('.request_msg').val()="";
                    })
                }
                e.preventDefault();
            })

     $('.BtnLike').click(function(){
                $(this).css({"color":"blue"});
                var songb = $(this).attr('id');
                $.post("{{route('song.count')}}", {songb:songb}, function(response){
                    
                })
            })

    });

    </script>
    
@endsection