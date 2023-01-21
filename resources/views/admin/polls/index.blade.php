@extends('admin.layouts.app')

@section('heading', 'Poll list')

@section('button')
    <a href="{{ route('admin.poll.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Question</th>
                                    <th>Yes vote</th>
                                    <th>No vote</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($polls as $poll)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $poll->question }} </td>
                                        <td> {{ $poll->yes_vote }} </td>
                                        <td> {{ $poll->no_vote }} </td>

                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin.poll.edit', $poll->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin.poll.delete', $poll->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>

                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection