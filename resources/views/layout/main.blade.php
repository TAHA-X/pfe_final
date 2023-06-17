<!DOCTYPE html>
<html lang="en">

<head>
	@include("layout.head")
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/guide.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/projets.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/projet.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
</head>

<body>
	<div class="wrapper">
		@include("layout.aside")
        <div class="main">
            @include("layout.header")
			<main class="m-3">
                <h2 class="mb-2">@yield("title_page")</h2>
				<div style="border-radius:13px; padding:17px;" class="container-fluid shadow shadow-lg bg-white ">
                     @yield("body")
                </div>
			</main>

		</div>
	</div>

	@include("layout.footerScript")


</body>

</html>
