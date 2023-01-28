    <div class="sidebar">

        <div class="widget">

           @foreach ($global_top_sidebar_ad as $sidebar)
                <div class="ad-sidebar">

                    @if ($sidebar->sidebar_ad_url == '')
                        <img src="{{ asset('uploads/'.$sidebar->sidebar_ad) }}" alt="">
                    @else
                        <a href="{{ $sidebar->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$sidebar->sidebar_ad) }}" alt=""></a>
                    @endif

                </div>
           @endforeach

        </div>

        <div class="widget">
            <div class="tag-heading">
                <h2>Tags</h2>
            </div>

            <div class="tag">

                @php
                    $all_tags = \App\models\Tag::select('tag_name')->distinct()->get();
                @endphp

                @foreach ($all_tags as $tag)
                    <div class="tag-item">
                        <a href="{{ route('tag.show', $tag->tag_name) }}"><span class="badge bg-secondary">{{ $tag->tag_name }}</span></a>
                    </div>
                @endforeach

                </div>
        </div>

        <div class="widget">
            <div class="archive-heading">
                <h2>Archive</h2>
            </div>
            <div class="archive">

                @php
                    $archive_arr = [];
                    $all_post = \App\Models\Post::orderBy('id', 'desc')->get();
                    foreach($all_post as $post) {
                        $ts = strtotime($post->created_at);
                        $month = date('m', $ts);
                        $full_month = date('F',$ts);
                        $year = date('Y', $ts);

                        $archive_arr[] = $month .'-'. $full_month .'-'. $year;
                    }

                    $archive_arr = array_values(array_unique($archive_arr));

                @endphp

                <form action="{{ route('archive.show') }}" method="post" >
                    @csrf

                    <select name="archive_date" class="form-select" onchange="this.form.submit()">

                        <option value="">Select Month</option>
                        @for ($i=0; $i<count($archive_arr); $i++)
                            @php
                                $temp_arr = explode('-',$archive_arr[$i])
                            @endphp
                            <option value="{{$temp_arr[0].'-'.$temp_arr[2]}}">{{ $temp_arr[1] }}, {{ $temp_arr[2] }}</option>
                        @endfor


                    </select>
                </form>


            </div>
        </div>

        <div class="widget">

            @foreach ($global_live_data as $live)
                <div class="live-channel">
                    <div class="live-channel-heading">
                        <h2>{{  $live->heading }}</h2>
                    </div>
                    <div class="live-channel-item">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{  $live->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="widget">
            <div class="news">
                <div class="news-heading">
                    <h2>Popular & Recent News</h2>
                </div>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Recent News</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Popular News</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                        @foreach ($global_recent_news as $news)
                            @if ($loop->iteration > 5)
                                @break
                            @endif
                            <div class="news-item">
                                <div class="left">
                                    <img src="{{ asset('uploads/'.$news->photo) }}" alt="">
                                </div>
                                <div class="right">
                                    <div class="category">
                                        <span class="badge bg-success">{{ $news->rSubCategory->name }}</span>
                                    </div>
                                    <h2><a href="{{ route('front.post.view', $news->id) }}">{{ $news->title }}</a></h2>
                                    <div class="date-user">
                                        <div class="user">

                                            @if ($news->author_id == 0)
                                                @php
                                                    $user_data = App\Models\Admin::where('id', $news->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                    $user_data = App\Models\Author::where('id', $news->author_id)->first();
                                                @endphp
                                            @endif
                                            <a href="javascript:void;">{{ $user_data->name }}</a>

                                        </div>
                                        <div class="date">
                                            @php
                                                $ts = strtotime($news->updated_at);
                                                $updated_date = date('d M Y', $ts);
                                            @endphp
                                            <a href="javascript:void;">{{ $updated_date }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach


                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                    @foreach ($global_popular_news as $news)
                        @if ($loop->iteration > 5)
                            @break
                        @endif
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$news->photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $news->rSubCategory->name }}</span>
                                </div>
                                <h2><a href="{{ route('front.post.view', $news->id) }}">{{ $news->title }}</a></h2>
                                <div class="date-user">

                                    <div class="user">
                                        @if ($news->author_id == 0)
                                            @php
                                                $user_data = App\Models\Admin::where('id', $news->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                                $user_data = App\Models\Author::where('id', $news->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $user_data->name }}</a>

                                    </div>

                                    <div class="date">
                                        @php
                                            $ts = strtotime($news->updated_at);
                                            $updated_date = date('d M Y', $ts);
                                        @endphp
                                        <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>

        <div class="widget">
            @foreach ($global_bottom_sidebar_ad as $sidebar)
            <div class="ad-sidebar">

                @if ($sidebar->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$sidebar->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $sidebar->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$sidebar->sidebar_ad) }}" alt=""></a>
                @endif

            </div>
       @endforeach
        </div>

        <div class="widget">


            <div class="poll-heading">
                <h2>Online Poll</h2>
            </div>

            <div class="poll">
                <div class="question">
                   <b>{{ $global_poll_data->question }}</b>
                </div>


                @php

                    $total_vote = $global_poll_data->yes_vote +$global_poll_data->no_vote;

                    if($global_poll_data->yes_vote == 0) {
                        $yes_percent = 0;
                    } else {

                        $yes_percent =  ($global_poll_data->yes_vote * 100)/$total_vote;
                        $yes_percent =  ceil($yes_percent);
                    }

                    if($global_poll_data->no_vote == 0) {
                        $no_percent = 0;
                    } else {

                        $no_percent =  ($global_poll_data->no_vote * 100)/$total_vote;
                        $no_percent =  ceil($no_percent);
                    }

                @endphp

                @if (session()->get('current_poll_id') == $global_poll_data->id)

                    <div class="poll-result">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td style="width: 100px">Yes ({{ $global_poll_data->yes_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $yes_percent }}%" aria-valuenow="{{ $yes_percent }}" aria-valuemin="0" aria-valuemax="100">{{ $yes_percent }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No ({{ $global_poll_data->no_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $no_percent }}%" aria-valuenow="{{ $no_percent }}" aria-valuemin="0" aria-valuemax="100">{{ $no_percent }}%</div>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>

                        <a href="{{ route('vote.previous') }}" class="btn btn-primary old" style="margin-top: 0;">Old Result</a>

                    </div>

                @endif


                @if (session()->get('current_poll_id') != $global_poll_data->id)

                    <div class="answer-option">
                        <form action="{{ route('vote.submit') }}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{ $global_poll_data->id }}">

                            <div class="form-check">
                                <input class="form-check-input" type="radio"  name="vote" id="poll_id_1" value = "Yes" checked>
                                <label class="form-check-label" for="poll_id_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vote" id="poll_id_2" value = "No">
                                <label class="form-check-label" for="poll_id_2">No</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('vote.previous') }}" class="btn btn-primary old">Old Result</a>
                            </div>
                        </form>
                    </div>

                @endif

            </div>


        </div>

    </div>