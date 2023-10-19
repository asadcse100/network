<footer class="bg-dark text-muted">
      <section class="container py-4">
            <div class="row">
                  @php
                  $qry = DB::table('site_settings')->first();
                  $play_store_logo = DB::table('system_configurations')->where('type', 'play_store_logo')->first()->value;
                  $apple_store_logo = DB::table('system_configurations')->where('type', 'apple_store_logo')->first()->value;
                  $play_store_link = DB::table('system_configurations')->where('type', 'play_store_link')->first()->value;
                  $apple_store_link = DB::table('system_configurations')->where('type', 'apple_store_link')->first()->value;
                  $facebook_url = DB::table('system_configurations')->where('type', 'facebook_url')->first()->value;
                  $instagram_url = DB::table('system_configurations')->where('type', 'instagram_url')->first()->value;
                  $youtube_url = DB::table('system_configurations')->where('type', 'youtube_url')->first()->value;
                  $linkedin_url = DB::table('system_configurations')->where('type', 'linkedin_url')->first()->value;
                  $twitter_url = DB::table('system_configurations')->where('type', 'twitter_url')->first()->value;
                  $pinterest_url = DB::table('system_configurations')->where('type', 'pinterest_url')->first()->value;
                  $contact_address = DB::table('system_configurations')->where('type', 'contact_address')->first()->value;
                  $contact_email = DB::table('system_configurations')->where('type', 'contact_email')->first()->value;
                  $contact_phone = DB::table('system_configurations')->where('type', 'contact_phone')->first()->value;
                  @endphp
                  <div class="col-lg-3">
                        <img src="@if(!empty($qry->logo)){{asset('site_images')}}/{{$qry->logo}}@endif" alt="@if(!empty($qry->logo)){{$qry->logo}}@endif" height="100" />
                  </div>
                  <div class="col-lg-6">
                        <div class="feature col">
                              <h1 class="h1 text-start">Join Us Today</h1>
                        </div>
                        <div class="feature col text-end mt-4">
                              <a href="{{Route('publisher.register')}}" class="btn btn-warning">Become an Affiliate</a>
                              <!-- <a href="/advertisers" class="btn btn-mw-light px-4 mb-3 mx-2">Become an Advertiser</a> -->
                        </div>
                  </div>
            </div>
      </section>
      <hr class="my-3">
      <section class="container py-3">
            <div class="row">
                  <div class="col-md-2 border-end mt-4">
                        <h4 class="fw-bold mb-4 text-muted">Website</h4>
                        <hr />
                        <ul class="list-unstyled">
                              <li class="mb-4"><a class=" text-decoration-none text-muted" href="{{Route('home')}}">Home </a></li>
                              <li class="mb-4"><a class=" text-decoration-none text-muted" href="{{Route('blogs')}}">Blogs</a></li>
                              <li class="mb-4"><a class=" text-decoration-none text-muted" href="#about">About</a></li>
                              <li class="mb-4"> <a class=" text-decoration-none text-muted" href="#contact">Contact us </a></li>
                        </ul>
                  </div>
                  <div class="col-md-2 border-end mt-4">
                        <h4 class="fw-bold mb-4 text-muted">Customer</h4>
                        <hr />
                        <ul class="list-unstyled">
                              <li class="mb-4">
                                    <a class=" text-decoration-none text-muted" href="{{url('/privacy')}}">Privacy </a>
                              </li>
                              <li class="mb-4">
                                    <a class=" text-decoration-none text-muted" href="{{url('/terms')}}">Terms </a>
                              </li>
                              <!-- <li class="mb-4">
                                    <a class=" text-decoration-none text-muted" href="{{url('/payments')}}">Payments </a>
                              </li> -->
                              <!-- <li class="mb-4"><a class=" text-decoration-none text-muted" href="{{url('/dmca')}}">FAQ</a></li> -->
                              <!-- <li class="mb-4"><a class=" text-decoration-none text-muted" href="{{url('/abuse')}}">Report Abuse</a></li> -->
                        </ul>
                  </div>
                  <div class="col-md-4 mt-4">
                        <h4 class="fw-bold mb-4 text-muted">Office Address</h4>
                        <hr />
                        <ul class="list-unstyled text-muted">
                              <li class="mb-4">
                                    @if(!empty($contact_address)){!! $contact_address !!}@endif
                              </li>
                              <li class="mb-4">@if(!empty($contact_email)){{$contact_email}}@endif</li>
                              <li class="mb-4">@if(!empty($contact_phone)){{$contact_phone}}@endif</li>
                        </ul>
                  </div>
                  <div class="col-md-4 mt-4">
                              <div class="col-6">
                                    <h4 class="text-muted">Certificates</h4>
                                    <hr>
                                    @foreach(DB::table('certificates')->where('is_active',1)->get() as $certificate)
                                    <img src="{{asset('uploads/' . $certificate->image)}}" height="100" class="img-fluid w-50" alt="Top CPA Network" />
                                    @endforeach
                              </div>
                              <div class="col-6">
                                    <h4 class="text-muted">Mobile App</h4>
                                    <hr>
                                    @if(!empty($play_store_logo))
                                    <a href="@if(!empty($play_store_link)){{$play_store_link}}@endif" target="_blank"><img src="{{asset('uploads/' . $play_store_logo)}}" height="60" alt="Play Store Logo" /></a>
                                    @endif
                                    @if(!empty($apple_store_logo))
                                    <a href="@if(!empty($apple_store_link)){{$apple_store_link}}@endif" target="_blank"><img src="{{asset('uploads/' . $apple_store_logo)}}" height="60" alt="Apple Store Logo" /></a>
                                    @endif
                              </div>
                              
                  </div>
                  
                  <a class=" text-decoration-none text-muted" href="{{Route('admin.login')}}">Admin Login </a> | 
                              <a class=" text-decoration-none text-muted" href="{{Route('affliate.login')}}">Manager Login </a>
            </div>
      </section>
      <hr class="my-0">
      <section class="container py-3">
            <div class="row align-items-center pb-3">
                  <div class="col-md-6 my-3 text-muted">
                        <span>© {{date('Y')}} Copyright All rights reserved</span>
                  </div>
                  <div class="col-md-6 my-3">
                        @if(!empty($facebook_url))
                        <a href="{{$facebook_url}}" class="px-4  text-decoration-none" target="_blank">
                              <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                              </svg>
                        </a>
                        @endif
                        @if(!empty($instagram_url))
                        <a href="{{$instagram_url}}" class="px-4  text-decoration-none" target="_blank">
                              <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                              </svg>
                        </a>
                        @endif
                        @if(!empty($youtube_url))
                        <a href="{{$youtube_url}}" class="px-4  text-decoration-none" target="_blank">
                              <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"></path>
                              </svg>
                        </a>
                        @endif
                        @if(!empty($linkedin_url))
                        <a href="{{$linkedin_url}}" class="px-4  text-decoration-none" target="_blank">
                              <svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                              </svg>
                        </a>
                        @endif
                        @if(!empty($twitter_url))
                        <a href="{{$twitter_url}}" class="px-4  text-decoration-none" target="_blank">
                        <svg width="16px" height="16px" viewBox="0 -4 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <title>Twitter-color</title>
                              <desc>Created with Sketch.</desc>
                              <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Color-" transform="translate(-300.000000, -164.000000)" fill="#00AAEC">
                                          <path d="M348,168.735283 C346.236309,169.538462 344.337383,170.081618 342.345483,170.324305 C344.379644,169.076201 345.940482,167.097147 346.675823,164.739617 C344.771263,165.895269 342.666667,166.736006 340.418384,167.18671 C338.626519,165.224991 336.065504,164 333.231203,164 C327.796443,164 323.387216,168.521488 323.387216,174.097508 C323.387216,174.88913 323.471738,175.657638 323.640782,176.397255 C315.456242,175.975442 308.201444,171.959552 303.341433,165.843265 C302.493397,167.339834 302.008804,169.076201 302.008804,170.925244 C302.008804,174.426869 303.747139,177.518238 306.389857,179.329722 C304.778306,179.280607 303.256911,178.821235 301.9271,178.070061 L301.9271,178.194294 C301.9271,183.08848 305.322064,187.17082 309.8299,188.095341 C309.004402,188.33225 308.133826,188.450704 307.235077,188.450704 C306.601162,188.450704 305.981335,188.390033 305.381229,188.271578 C306.634971,192.28169 310.269414,195.2026 314.580032,195.280607 C311.210424,197.99061 306.961789,199.605634 302.349709,199.605634 C301.555203,199.605634 300.769149,199.559408 300,199.466956 C304.358514,202.327194 309.53689,204 315.095615,204 C333.211481,204 343.114633,188.615385 343.114633,175.270495 C343.114633,174.831347 343.106181,174.392199 343.089276,173.961719 C345.013559,172.537378 346.684275,170.760563 348,168.735283" id="Twitter">

                                          </path>
                                    </g>
                              </g>
                        </svg>
                        </a>
                        @endif
                        @if(!empty($pinterest_url))
                        <a href="{{$pinterest_url}}" class="px-4  text-decoration-none" target="_blank">
                        <svg width="16px" height="16px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <circle cx="16" cy="16" r="14" fill="white" />
                              <path d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 21.6801 5.38269 26.5702 10.2435 28.7655C10.25 28.6141 10.2573 28.4752 10.2636 28.3561C10.2722 28.1938 10.2788 28.0682 10.2788 27.9976C10.2788 27.5769 10.5649 25.4904 10.5649 25.4904L12.3149 18.3053C12.0457 17.8678 11.8438 16.9423 11.8438 16.2356C11.8438 12.9711 13.6611 12.2644 14.7716 12.2644C16.1851 12.2644 16.5048 13.7957 16.5048 14.9231C16.5048 15.5194 16.1955 16.4528 15.8772 17.4134C15.5398 18.4314 15.1923 19.4799 15.1923 20.1899C15.1923 21.5697 16.5553 22.2596 17.4976 22.2596C19.988 22.2596 22.2764 19.1298 22.2764 16C22.2764 12.8702 20.8125 9.08412 16.0168 9.08412C11.2212 9.08412 9.06731 12.7356 9.06731 15.5288C9.06731 17.4134 9.77404 18.7933 10.1274 19.0288C10.2284 19.1186 10.4 19.3957 10.2788 19.786C10.1577 20.1764 9.9367 21.0481 9.84135 21.4351C9.83013 21.5248 9.72356 21.6774 9.38702 21.5697C8.96635 21.4351 6.29087 19.7524 6.29087 15.5288C6.29087 11.3053 9.60577 6.39182 16.0168 6.39182C22.4279 6.39182 25.7091 10.6995 25.7091 16C25.7091 21.3005 21.4183 24.6827 18.1538 24.6827C15.5423 24.6827 14.5192 23.516 14.3341 22.9327L13.3413 26.7187C13.1069 27.3468 12.6696 28.4757 12.1304 29.4583C13.3594 29.8111 14.6576 30 16 30Z" fill="#BB0F23" />
                        </svg>
                        </a>
                        @endif
                        
                  </div>
            </div>
      </section>
</footer>