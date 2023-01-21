@extends('admin.layouts.app')

@section('heading', 'Edit poll')

@section('button')
    <a href="{{ route('admin.poll') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Go back</a>
@endsection

@section('main_content')

    <div class="section-body">
        <form action="{{ route('admin.poll.update',$poll->id) }}" method="post" >
            @csrf

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="form-group mb-3">
                                <label>Question *</label>
                                <textarea name="question" class="form-control" style="height: 150px" cols="30" rows="10">{{ $poll->question }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>yes vote </label>
                                <input type="text" class="form-control" name="yes_vote" value="{{ $poll->yes_vote }}">
                            </div>

                            <div class="form-group mb-3">
                                <label>No vote </label>
                                <input type="text" class="form-control" name="no_vote" value="{{ $poll->no_vote }}">
                            </div>


                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div>

@endsection