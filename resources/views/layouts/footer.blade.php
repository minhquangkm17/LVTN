@section('footer')
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="#"><img style="height: 100px; width:120px; object-fit: cover;"
                                    src="{{ asset($logo->url ?? '') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: {{ $info->address }}</li>
                            <li>Phone: {{ $info->number_phone }}</li>
                            <li>Email: {{ $info->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Các thông tin khác</h6>
                        <ul>
                            <li><a href="#">Giờ mở cửa: {{ $info->opentime }} AM</a></li>
                            <li><a href="#">Giờ mở cửa: {{ $info->closetime }} PM</a></li>
                            <li><a href="{{ asset('/gioi-thieu') }}">Về chúng tôi</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            
                        </ul>
                        <ul>
                        
                        <li><a href="#">Các dịch vụ</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Bản đồ</a></li>
                        <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy; All rights reserved || UTH 2022
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="public/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
