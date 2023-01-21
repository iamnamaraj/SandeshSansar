@extends('admin.layouts.app')

@section('heading', 'Create poll')

@section('button')
    <a href="{{ route('admin.poll') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.poll.store') }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Question *</label>
                                <textarea name="question" class="form-control" style="height: 150px" cols="30" rows="10"></textarea>
                            </div>


                            <div class="form-group mb-3">
                                <label>yes vote </label>
                                <input type="text" class="form-control" name="yes_vote" value="">
                            </div>

                            <div class="form-group mb-3">
                                <label>No vote </label>
                                <input type="text" class="form-control" name="no_vote" value="">
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