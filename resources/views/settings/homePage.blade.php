@extends("layout.main")

@section("title")
   settings globale
@endsection
@section("title_page")
   <h2>les paramétres - home page</h2>
@endsection

@section("body")
    <h3   onclick="titre1();" id="titre1" style="cursor:pointer; margin-top:10px; background-color:rgb(203, 203, 203); padding:6px 10px;" id="slider1">Slider1</h3>
    <div  style="display:none; background:rgb(199, 199, 199); padding:15px; border-radius:10px;" id="slider1">
        @if ($settings1->img1!=null)
            <div style="width:100%;">
                <img style="width:100%; height:400px;" src="{{ $settings1->img1 }}" alt="">
                <a onclick="return confirm('vous voulez vraiment supprimer cette image ?')" href="{{ Route('supprimer_slider1_home_page') }}" class="w-100 btn btn-danger">supprimer</a>
            </div>
        @endif

        @if ($settings1->img2!=null)
            <div style="width:100%;">
                <img style="width:100%; height:400px;" src="{{ $settings1->img2 }}" alt="">
                <a onclick="return confirm('vous voulez vraiment supprimer cette image ?')"  href="{{ Route('supprimer_slider2_home_page') }}" class="w-100 btn btn-danger">supprimer</a>
            </div>
        @endif

    @if ($settings1->img3!=null)
            <div style="width:100%;">
                <img style="width:100%; height:400px;" src="{{ $settings1->img3 }}" alt="">
                <a onclick="return confirm('vous voulez vraiment supprimer cette image ?')"  href="{{ Route('supprimer_slider3_home_page') }}" class="w-100 btn btn-danger">supprimer</a>
            </div>
    @endif

    @if($settings->img1==null or $settings->img2==null or $settings->img3==null)
        <form enctype="multipart/form-data" action="{{ Route('settings_home_page_add_slider1') }}" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="img">image :</label>
                <input @error("img") is-invalid @enderror type="file" id="img" name="img"/>
                @error("img")
                     <span class="text-danger mt-1">{{$message}}</span>                    
                @enderror 
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="submit">ajouter</button>
            </div>
        </form>
    @endif
    </div>


    {{-- <h3  onclick="titre2();" id="titre2" style="cursor:pointer; margin-top:10px; background-color:rgb(203, 203, 203); padding:6px 10px;" id="slider1">Slider2</h3> --}}
    {{-- <div  style="display:none; background:rgb(199, 199, 199); padding:15px; border-radius:10px;" id="slider2">
        @foreach ($settings2 as $s)
                <div style="width:100%;">
                    <img style="width:100%; height:400px;" src="{{ $s->img }}" alt="">
                    <a onclick="return confirm('vous voulez vraiment supprimer cette image ?')" href="{{ Route('supprimer_appartement',$s->id) }}" class="w-100 btn btn-danger">supprimer</a>
                </div>
        @endforeach
        <form enctype="multipart/form-data" action="{{ Route('settings_home_page_add_slider2') }}" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="img">image :</label>
                <input  @error("img") is-invalid @enderror type="file" id="img" name="img"/>
                @error("img")
                   <span class="text-danger mt-1">{{$message}}</span>                    
                @enderror
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="submit">ajouter</button>
            </div>
        </form>
    </div> --}}


    <h3  onclick="titre3();" id="titre3" style="cursor:pointer; margin-top:10px; background-color:rgb(203, 203, 203); padding:6px 10px;" >vidéo</h3>
    <div  style="display:none; background:rgb(199, 199, 199); padding:15px; border-radius:10px;" id="slider3">
        <div style="width:100%;">
            @if($settings1->video!=null)
               <iframe width="100%" height="500" src="{{ $settings1->video }}" title_home_page="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @endif
        </div>
        <form enctype="multipart/form-data" action="{{ Route('settings_home_page_video') }}" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="video">changer le vidéo :</label>
                <textarea @error("video") is-invalid @enderror class="form-control" type="texteara" id="video" name="video"></textarea>
                @error("video")
                        <span class="text-danger mt-1">{{$message}}</span>                    
                @enderror 
            </div>
            <div class="mt-2">
                <button class="btn btn-success" type="submit">modifier</button>
            </div>
        </form>
    </div>
    <div class="mt-2">
        <a href="javascript:history.go(-1)" class="btn btn-light">back</a>
    </div>
@endsection


@if (session("modifier"))
<div style="position:fixed; bottom:12px; right:12px;"  id="modifier" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   <div style="display:flex; justify-content:space-between; padding:10px 15px;" class="toast-header ">
   <div style="width:30px; height:30px; border-radius:3px;" class="bg-primary"></div>
   <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
   </div>
   <div class="toast-body">
   {{ session("modifier") }}
   </div>
</div>
@endif



@section("cssCode")

@endsection

@section("script")
const modifier = document.getElementById('modifier');
if (modifier) {
    const toast = new bootstrap.Toast(modifier)
    toast.show()
}


function titre1(){
    $("#slider1").fadeToggle();
}

function titre2(){
    $("#slider2").fadeToggle();
}
function titre3(){
    $("#slider3").fadeToggle();
}
@endsection
