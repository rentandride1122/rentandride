@include('user.includes.header')


    <!--== Slider Area Start ==-->
    <section id="slider-area">
        
        <!--== slide Item One ==-->
        <div class="single-slide-item overlay">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5">
                        <div class="book-a-car">

                            <form action="{{ url('client/bookcar') }}" method="POST">
                                                               

                                <!--== Pick Up Date ==-->
                                <div class="pick-up-date book-item">
                                    <h4>PICK-UP DATE:</h4>
                                    <input type="date" name="booking_from" placeholder="Pick Up Date" />

                                    <div class="return-car">
                                        <h4>Return DATE:</h4>
                                        <input type="date" name="booking_to" placeholder="Return Date" />
                                    </div>
                                </div>
                                <!--== Pick Up Location ==-->

                                <!--== Car Choose ==-->
                                <!-- <div class="choose-car-type book-item">
                                    <h4>CHOOSE CAR TYPE:</h4>
                                    <select class="custom-select">
                                      <option selected>Select</option>
                                      <option value="1">BMW</option>
                                      <option value="2">Audi</option>
                                      <option value="3">Lexus</option>
                                    </select>
                                </div> -->
                                <!--== Car Choose ==-->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="privatecar_id" value="{{ $privatecar_id }}">
                                <div class="book-button text-center">
                                    <button class="book-now-btn">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7 text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider-right-text">
                                    <h1>BOOK A CAR TODAY!</h1>
                                    <p>FOR AS LOW AS $10 A DAY PLUS 15% DISCOUNT <br> FOR OUR RETURNING CUSTOMERS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== slide Item One ==-->
    </section>
    <!--== Slider Area End ==-->

    @include('user.includes.footer')    