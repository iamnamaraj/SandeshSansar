@extends('admin.layouts.app')

@section('heading', 'All subscribers')

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
                                    <th>Subscribers</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subscriber->email }}</td>

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