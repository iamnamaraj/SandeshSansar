<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">About Us</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Useful Links</h2>
                    <ul class="useful-links">
                        <li><a href="{{ route('home') }}">Home</a></li>

                        @if ($global_page_data->terms_status == 'Show')
                            <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_title }}</a></li>
                        @endif

                        @if ($global_page_data->privacy_status == 'Show')
                            <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_title }}</a></li>
                        @endif

                        @if ($global_page_data->disclaimer_status == 'Show')
                            <li><a href="{{ route('disclaimer') }}">{{ $global_page_data->disclaimer_title }}</a></li>
                        @endif

                        @if ($global_page_data->contact_status == 'Show')
                            <li><a href="{{ route('contact') }}">{{ $global_page_data->contact_title }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">Contact</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="right">
                            34 Antiger Lane,<br>
                            PK Lane, USA, 12937
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="right">
                            contact@arefindev.com
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="right">
                            122-222-1212
                        </div>
                    </div>
                    <ul class="social">
                        @foreach ($global_social_media as $media)

                            <li><a target="_blank" href="{{ $media->url }}"><i class="{{ $media->icon }}"></i></a></li>

                        @endforeach


                    </ul>
                </div>
            </div>

            <div class="col-md-3">


                <div class="item">
                    <h2 class="heading">Newsletter</h2>
                    <p>
                        In order to get the latest news and other great items, please subscribe us here:
                    </p>
                    <form action="{{ route('subscriber.send-email') }}" method="post" class="form_subscribe_ajax">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email address" class="form-control">
                            <span class="text-danger  error-text email_error"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Subscribe Now">
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="copyright">
    Copyright 2022, ArefinDev. All Rights Reserved.
</div>

<div class="scroll-top">
    <i class="fas fa-angle-up"></i>
</div>