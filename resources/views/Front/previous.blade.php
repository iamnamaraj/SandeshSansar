@extends('front.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Previous polls</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="">Previous polls</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @foreach ($poll_data as $poll)
                    @if($loop->iteration == 1)
                        @continue
                    @endif

                    @php
                        $total_vote =  $poll->yes_vote + $poll->no_vote;

                        if( $poll->yes_vote == 0) {

                            $yes_percent = 0;
                        } else {

                            $yes_percent = ( $poll->yes_vote * 100 )/$total_vote;
                            $yes_percent = ceil($yes_percent);
                        }

                        if( $poll->no_vote == 0) {

                            $no_percent = 0;
                        } else {

                            $no_percent = ( $poll->no_vote * 100 )/$total_vote;
                            $no_percent = ceil($no_percent);
                        }


                    @endphp

                    <div class="poll-item">
                        <div class="question">
                            Question: {{ $poll->question }}
                        </div>
                        <div class="poll-date">
                            @php
                                $ts = strtotime($poll->created_at);
                                $created_date = date('d M Y', $ts);
                            @endphp
                            <b>Poll Date:</b> {{$created_date}}
                        </div>
                        <div class="total-vote">

                            <b>Total Votes:</b>{{ $total_vote}}
                        </div>
                        <div class="poll-result">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Yes ({{ $poll->yes_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{  $yes_percent }}%" aria-valuenow="{{  $yes_percent }}" aria-valuemin="0" aria-valuemax="100">{{  $yes_percent }}%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No ({{ $poll->no_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{  $no_percent }}%" aria-valuenow="{{  $no_percent }}" aria-valuemin="0" aria-valuemax="100">{{  $no_percent }}%</div>
                                            </div>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
</div>
@endsection