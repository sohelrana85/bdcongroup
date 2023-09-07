<footer class="footer-area pt-4 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset($content->logo) }}" class="footer-logo-one" alt="Logo">
                            {{-- <img src="{{ asset($content->logo) }}" class="footer-logo-two" alt="Logo"> --}}
                        </a>
                    </div>
                    <p>
                        {!! Str::limit($about->description, 120) !!}
                    </p>

                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="footer-list">
                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li>
                            <a href="javascript:">Projects</a>
                        </li>
                        <li>
                            <a href="javascript:">Service</a>
                        </li>
                        <li>
                            <a href="javascript:">News & Events</a>
                        </li>
                        <li>
                            <a href="javascript:">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="footer-widget">
                    <h3>Contacts</h3>
                    <ul class="footer-list-two">
                        <li>
                            <i class='bx bx-location-plus'></i>
                            {{ $content->address }}
                        </li>
                        <li>
                            <i class='bx bx-phone'></i>
                            <a href="tel:{{ $content->phone }}">{{ $content->phone }}</a>
                        </li>
                        <li>
                            <i class='bx bx-phone'></i>
                            <a href="tel:{{ $content->phone_two }}">{{ $content->phone_two }}</a>
                        </li>
                        <li>
                            <i class='bx bxs-envelope'></i>
                            <a href="mailto:{{ $content->email }}"><span class="__cf_email__"
                                    data-cfemail="224b4c444d62444b4c47410c414d4f">{{ $content->email }}</span></a>
                        </li>
                    </ul>

                    <ul class="social-link">
                        <li>
                            <a href="{{ $content->facebook }}" target="_blank"><i class='bx bxl-facebook'></i></a>
                        </li>
                        <li>
                            <a href="{{ $content->twitter }}" target="_blank"><i class='bx bxl-twitter'></i></a>
                        </li>
                        <li>
                            <a href="{{ $content->instagram }}" target="_blank"><i class='bx bxl-instagram'></i></a>
                        </li>
                        <li>
                            <a href="{{ $content->youtube }}" target="_blank"><i class='bx bxl-youtube'></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6">
                <div class="footer-widget pl-2">
                    <h3>Newsletter</h3>
                    <div class="newsletter-area">
                        <form class="newsletter-form" data-toggle="validator" method="POST">
                            <input type="email" class="form-control" placeholder="Your Email*" name="EMAIL" required
                                autocomplete="off">
                            <button class="default-btn" type="submit">
                                Subscribe
                            </button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</footer>

<div class="copy-right-area">
    <div class="container">
        <div class="copy-right-text">
            <div class="row">
                <div class="text-center col-lg-6 text-lg-start">
                    <p>
                        Copyright ©
                        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> {{ $content->com_name }}. All Rights
                    </p>
                </div>
                <div class="text-center col-lg-6 text-lg-end">
                    <p>Design & Developed By: <a href="https://sohelranabd.com/" target="_blank">Sohel Rana</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
