@extends('admin.layouts.app')

@section('heading', 'Login page')


@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.login.update') }}" method="post" >
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="login_title" value="{{ $login->login_title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Staus *</label>
                            <select name="login_status" class="form-control">
                                <option value="Show" @if ($login->login_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if ($login->login_status == 'Hide') selected @endif>Hide</option>
                            </select>
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
