@extends("layout.main")

@section("title")
    afficher appartements
@endsection

@section("title_page")
   <h2>afficher appartements</h2>
@endsection

@section("body")
<div class="table-responsive">
    <div id="appartements">
         tage 4
      <div style="display:flex; justify-content:space-around; margin-top:10px;">
         @foreach ($tage4 as $app)
            <div style="display:flex; flex-direction:column; gap:5px; align-items:center;">
                  <div style="width:50px; height:50px; font-size:20px; display:grid; place-items:center; border-radius:50%;"
                        class="@if($app['status']=='pasVendu') bg-dark text-white
                              @elseif($app['status']=='vendu') bg-success text-white
                              @else bg-primary text-white @endif">
                  {{ $app["num"] }}
                  </div>

                  @if($app["status"]=="pasVendu")
                        <a onclick="return confirm('voulez vous vraiment mettre cet appartement en cours ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.enCours',$app['id']) }}" class="bg-primary"></a>
                  @elseif($app["status"]=="enCours")
                        <a onclick="return confirm('voulez vous vraiment mettre cet appartement pas vendu ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.pasVendu',$app['id']) }}" class="bg-danger"></a>
                  @endif
            </div>
         @endforeach
      </div>

       tage 3

       <div style="display:flex; justify-content:space-around; margin-top:10px;">
            @foreach ($tage3 as $app)
               <div style="display:flex; flex-direction:column; gap:5px; align-items:center;">
                     <div style="width:50px; height:50px; font-size:20px; display:grid; place-items:center; border-radius:50%;"
                           class="@if($app['status']=='pasVendu') bg-dark text-white
                                 @elseif($app['status']=='vendu') bg-success text-white
                                 @else bg-primary text-white @endif">
                     {{ $app["num"] }}
                     </div>

                     @if($app["status"]=="pasVendu")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement en cours ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.enCours',$app['id']) }}" class="bg-primary"></a>
                     @elseif($app["status"]=="enCours")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement pas vendu ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.pasVendu',$app['id']) }}" class="bg-danger"></a>
                     @endif
               </div>
            @endforeach
         </div>

         tage 2

         <div style="display:flex; justify-content:space-around; margin-top:10px;">
            @foreach ($tage2 as $app)
               <div style="display:flex; flex-direction:column; gap:5px; align-items:center;">
                     <div style="width:50px; height:50px; font-size:20px; display:grid; place-items:center; border-radius:50%;"
                           class="@if($app['status']=='pasVendu') bg-dark text-white
                                 @elseif($app['status']=='vendu') bg-success text-white
                                 @else bg-primary text-white @endif">
                     {{ $app["num"] }}
                     </div>

                     @if($app["status"]=="pasVendu")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement en cours ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.enCours',$app['id']) }}" class="bg-primary"></a>
                     @elseif($app["status"]=="enCours")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement pas vendu ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.pasVendu',$app['id']) }}" class="bg-danger"></a>
                     @endif
               </div>
            @endforeach
         </div>

         tage1

         <div style="display:flex; justify-content:space-around; margin-top:10px;">
            @foreach ($tage1 as $app)
               <div style="display:flex; flex-direction:column; gap:5px; align-items:center;">
                     <div style="width:50px; height:50px; font-size:20px; display:grid; place-items:center; border-radius:50%;"
                           class="@if($app['status']=='pasVendu') bg-dark text-white
                                 @elseif($app['status']=='vendu') bg-success text-white
                                 @else bg-primary text-white @endif">
                     {{ $app["num"] }}
                     </div>
   
                     @if($app["status"]=="pasVendu")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement en cours ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.enCours',$app['id']) }}" class="bg-primary"></a>
                     @elseif($app["status"]=="enCours")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement pas vendu ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.pasVendu',$app['id']) }}" class="bg-danger"></a>
                     @endif
               </div>
            @endforeach
         </div>

         tage 0

         <div style="display:flex; justify-content:space-around; margin-top:10px;">
            @foreach ($tage0 as $app)
               <div style="display:flex; flex-direction:column; gap:5px; align-items:center;">
                     <div style="width:50px; height:50px; font-size:20px; display:grid; place-items:center; border-radius:50%;"
                           class="@if($app['status']=='pasVendu') bg-dark text-white
                                 @elseif($app['status']=='vendu') bg-success text-white
                                 @else bg-primary text-white @endif">
                     {{ $app["num"] }}
                     </div>
   
                     @if($app["status"]=="pasVendu")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement en cours ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.enCours',$app['id']) }}" class="bg-primary"></a>
                     @elseif($app["status"]=="enCours")
                           <a onclick="return confirm('voulez vous vraiment mettre cet appartement pas vendu ?')" style="width:15px; height:15px; border-radius:50%;" href="{{ Route('appartements.pasVendu',$app['id']) }}" class="bg-danger"></a>
                     @endif
               </div>
            @endforeach
         </div>

    </div>
</div>
@endsection

@section("cssCode")

@endsection

@section("script")

@endsection
