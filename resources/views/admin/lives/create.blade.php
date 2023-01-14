@extends('admin.layouts.app')

@section('heading', 'Create live')

@section('button')
    <a href="{{ route('admin.live') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.live.store') }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Heading *</label>
                                <input type="text" class="form-control" name="heading" value="">
                            </div>


                            <div class="form-group mb-3">
                                <label>Video_id *</label>
                                <input type="text" class="form-control" name="video_id" value="">
                            </div>



                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>

    </div>

@endsection