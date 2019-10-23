@include('user.includes.header')




    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding" style="margin-top: 70px">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                     @if(\Session::has('msg'))
          <div class = 'alert alert-success'>
            <p>{{ \Session::get('msg') }}</p>
          </div></br>
          @endif
          @if($errors->any())
          <div class = 'alert alert-danger'>
            <ul>
              @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
              @endforeach
            </ul>
          </div>
          @endif
 



          
                @if(Auth::check() == false)

                <h3>Place your Comments</h3>
 <br>
            <form method="POST" action="{{ url('user/comment') }}">
                        <textarea name="comment" style="width: 600px;height: 200px;border: 2px solid #a9c6c9;"></textarea>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-primary" value="Send" disabled="">
                    </form>
                    <br>
          <h3>User's Views</h3>
          <hr>
                    @foreach($comments as $key)

                    <div class="car-list-content">
                        <div class="single-car-wrap">
                            <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-11">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <div class="car-list-info">
                                        <p><b>By: {{ $key->user['email'] }}</b></p>
                                        <p>{{ $key['comment'] }}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <br>

                   
                     
                    @endforeach
                    
                    <br>

                @else

                <h3>Place your Comments</h3>
 <br>
            <form method="POST" action="{{ url('user/comment') }}">
                        <textarea name="comment" style="width: 600px;height: 200px;border: 2px solid #a9c6c9;" required=""></textarea>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-primary" value="Send">
                    </form>
                    <br>
          <h3>User's Views</h3>
          <hr>

                @foreach($comments as $key)

                

                    <div class="car-list-content">
                        <div class="single-car-wrap">
                            <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-11">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <div class="car-list-info">
                                        <p><b>By: {{ $key->user['email'] }}</b></p>
                                        <p>{{ $key['comment'] }}</p>
                                        @if(Auth::user()->email == $key->user['email'])
                                                                        <a href="{{ url('/user/updatemessage/'.$key['id']) }}">Edit</a>

 
                     <form action = "{{ url('/user/deletemessage') }}" method = 'POST'>
                        <input type = 'hidden' name = 'id' value = "{{ $key['id'] }}" />
                         <input type = 'hidden' name = '_token' value = '{{ csrf_token() }}' />
                         <input type = 'hidden' name = '_method' value = 'DELETE' />
                     <button style="height: 26px; float: right; margin-bottom: 12px;" class="btn btn-danger btn-xs fa fa-trash-o"></button>
                      </form>                              
                                @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                    <br>

                   
                     
                    @endforeach
                    
                    <br>
                     @endif
                  
                  


                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            
                            <!-- <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul> -->
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>

                <!-- Car List Content End -->

               @include('user.includes.sidebar')

               
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->



 @include('user.includes.footer')