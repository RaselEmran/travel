@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')

@endpush
@section('page-header')
		<img src="{{asset('fontend/images/bg1.jpg')}}" class="bg1"/>

				<div class="middle-right titleimg">

				<h2><strong>Times To Explore</strong></h2>

				<p class="subtitle">Start your new adventure here</p>

				<div class="search-bar">

					<input type="text" id="search" class="input-field" name="search" placeholder="Search by destination, activity, or interest" /><button class="search-btn-icon"><img class="search-bar-icon" src="{{asset('fontend/images/search.png')}}"/></button>

				</div>

				</div>
@endsection

@section('content')


		<div class="row">

			<div id="content2" class="boxes">

				<div class="container">

					<div class="row">	

						<div class="col-md-4">

							<h4 class="h41">See the best of the world</h4>

							<p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>

						</div>

						<div class="col-md-4">

							<h4 class="h41">Keep up with your schedule</h4>

							<p class="p1">Get to know when to depart so you won't miss out what you've planned</p>

						</div>

						<div class="col-md-4">

							<h4 class="h41">Find a travel buddy</h4>

							<p class="p1">Get match with a friendly companion to travel together</p>

						</div>

					</div>

				</div>

			</div>

		</div>

	

		<div class="row">

			<div id="content3">

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<h4><b>Explore The World</b></h4>

						</div>
						
                        <div class="col-md-10">

							<p class="p1">Discover a different side of these beloved cities</p>

						</div>
						<div class="col-md-2">

							<p class="p1"><a class="views-all-btn flt-right" href="">View All</a></p>

						</div>
						
						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/penang.jpg')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">PENANG</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/kuala-lumpur.jpg')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">KUALA LUMPUR</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/sabah.jpg" class="img1')}}"/>

							<div class="centered titleimg1 darkbg1">SABAH</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/sarawak.jpg')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">SARAWAK</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/melaka.jpg')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">MELAKA</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src=".{{asset('fontendimages/kedah.jpg')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">KEDAH</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src=".{{asset('fontendimages/terengganu.jpg')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">TERENGGANU</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src=".{{asset('fontendimages/pahang.jpg')}}')}}" class="img1"/>

							<div class="centered titleimg1 darkbg1">PAHANG</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	

		<div class="row">

			<div id="content4">

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<h4><b>Recommended for you</b></h4>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/langkawi.jpg')}}" class="img1"/>

							<div class="bottomed titleimg2 darkbg2">LANGKAWI</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/kundasang.jpg')}}" class="img1"/>

							<div class="bottomed titleimg2 darkbg2">KUNDASANG</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/genting-highland.jpg')}}" class="img1"/>

							<div class="bottomed titleimg2 darkbg2">GENTING HIGHLAND</div>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<img src="{{asset('fontend/images/redang-island.jpg')}}" class="img1"/>

							<div class="bottomed titleimg2 darkbg2">REDANG ISLAND</div>

						</div>					

					</div>

				</div>

			</div>

		</div>

		

		<div class="row">

			<div id="content5">	

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<div class="bg2">

								<img src="{{asset('fontend/images/bg2.jpg')}}" class="bg2" />

								<div class="bottom-right titleimg3">TRAVEL TIPS</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		

		<div class="row">

			<div id="content6">

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<h4><b>Stays for you</b></h4>
							
						</div>
						
						<div class="col-md-10">
						    
							<p class="p1">Make sure you don't miss out any attractive hotspot nearby your destination</p>

						</div>
						
						<div class="col-md-2">

							<p class="p1"><a class="views-all-btn flt-right" href="">View All</a></p>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<center>

							<div class="darkbg3">

								<img src="{{asset('fontend/images/hotelimg.jpg')}}" class="img3"/>

								<div class="row">

									<div class="col-md-12 titleimg4">Venn Homestay, Balik Pulau, Penang</div>							

									<div class="col-md-7 reviewcontainer">

										<img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review"> (188)</span>

									</div>

									<div class="col-md-5 price1">MYR 350</div>

								</div>

							</div>

							</center>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<center>

							<div class="darkbg3">

								<img src="{{asset('fontend/images/hotelimg.jpg')}}" class="img3"/>

								<div class="row">

									<div class="col-md-12 titleimg4">Venn Homestay, Balik Pulau, Penang</div>							

									<div class="col-md-7 reviewcontainer">

										<img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review"> (188)</span>

									</div>

									<div class="col-md-5 price1">MYR 350</div>

								</div>

							</div>

							</center>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<center>

							<div class="darkbg3">

								<img src="{{asset('fontend/images/hotelimg.jpg')}}" class="img3"/>

								<div class="row">

									<div class="col-md-12 titleimg4">Venn Homestay, Balik Pulau, Penang</div>							

									<div class="col-md-7 reviewcontainer">

										<img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review"> (188)</span>

									</div>

									<div class="col-md-5 price1">MYR 350</div>

								</div>

							</div>

							</center>

						</div>

						<div class="col-lg-3 col-md-6 borderimg1">

							<center>

							<div class="darkbg3">

								<img src="{{asset('fontend/images/hotelimg.jpg')}}" class="img3"/>

								<div class="row">

									<div class="col-md-12 titleimg4">Venn Homestay, Balik Pulau, Penang</div>							

									<div class="col-md-7 reviewcontainer">

										<img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review"> (188)</span>

									</div>

									<div class="col-md-5 price1">MYR 350</div>

								</div>

							</div>

							</center>

						</div>					

					</div>

				</div>

			</div>

		</div>

		

		<div class="row">	

			<div id="content7">	

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<h4><b>Things you might bring</b></h4>					

						</div>

						<div class="col-lg-6 col-md-12">

							<center>

							<div class="bg3">

								<img src="{{asset('fontend/images/bg3.jpg')}}" class="bg3"/>

								<div class="top-right titleimg5"><p>PROMOTION</p><p>10%</p></div>

							</div>

							</center>

						</div>

						<div class="col-lg-6 col-md-12">

							<center>

							<div class="bg4">

								<img src="{{asset('fontend/images/bg4.jpg')}}" class="bg4"/>

								<div class="top-left titleimg6"><p>PROMOTION</p><p>10%</p></div>

							</div>

							</center>

						</div>

					</div>

				</div>

			</div>

		</div>

		

		<div class="row">

			<div id="content8">	

				<div class="container">

					<div class="row">

						<div class="col-md-12 headercontent">

							<center>

							<h4><b>Partnerships</b></h4>	

							<p class="p2">Yupa teams up with big names to bring you exclusive promotions</p>

							</center>

						</div>

						<div class="col-md-12 partner-container">

							<div class="col-md-2">

								<center>

								<div class="border-partner">

									<center>Partner 1</center>

								</div>

								</center>

							</div>

							<div class="col-md-2">

								<center>

								<div class="border-partner">

									<center>Partner 1</center>

								</div>

								</center>

							</div>

							<div class="col-md-2">

								<center>

								<div class="border-partner">

									<center>Partner 1</center>

								</div>

								</center>

							</div>

							<div class="col-md-2">

								<center>

								<div class="border-partner">

									<center>Partner 1</center>

								</div>

								</center>

							</div>

							<div class="col-md-2">

								<center>

								<div class="border-partner">

									<center>Partner 1</center>

								</div>

								</center>

							</div>

							<div class="col-md-2">

								<center>

								<div class="border-partner">

									<center>Partner 1</center>

								</div>

								</center>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		

		<div class="row">

			<div id="content9">

				<div class="whyyupa">				

					<div class="bg2">

						<img src="{{asset('fontend/images/bg5.jpg')}}" class="bg5" />

					<center>

						<div class="centered1 titleimg7">WHY YUPA</div>

						<div class="centered2 titleimg8">See why millions of travelers choose to experience the world as part of out strong and secure Yupa community.</div>

					</center>

					</div>

				</div>

			</div>

		</div>

		

	


                

@endsection

@push('js')

@endpush