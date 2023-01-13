@extends('admin.layouts.app')

@section('heading', 'Create mail')


@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.subscriber.mail.send') }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label>Subject *</label>
                                <input type="text" class="form-control" name="subject" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>Message *</label>
                                <textarea name="message" class="form-control snote" cols="30" rows="10"></textarea>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>

        </form>

    </div>

@endsection