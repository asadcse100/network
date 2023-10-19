<section id="team">
    <div class="content bg-white block-team-1 padding-top-140 padding-bot-160">
        <div class="container">
            <div class="header text-center scroll-animated-from-bottom">
                <h1>Our Team</h1>
            </div>
            <div class="slider-container scroll-animated-from-bottom">
                <div class="slider-team cbp cbp-slider-edge pagination-top pagination-custom-1">
                    @foreach(App\Models\Affliate::get() as $affliate)
                    <!-- <img src="{{asset('uploads/'. $affliate->photo)}}" alt="{{$affliate->photo}}" /> -->
                    <div class="cbp-item">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <img src="{{asset('uploads/'. $affliate->photo)}}" alt="{{$affliate->photo}}"/>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <h5 class="hover-animated">{{$affliate->name}}</h5>
                                        <p class="hover-animated">Affiliate Manager</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>