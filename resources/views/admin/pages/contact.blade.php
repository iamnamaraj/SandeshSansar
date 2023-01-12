@extends('admin.layouts.app')

@section('heading', 'Contact page')


@section('main_content')
<div class="section-body">
    <form action="{{ route('admin.contact.update') }}" method="post" >
        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="contact_title" value="{{ $contact->contact_title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Staus *</label>
                            <select name="contact_status" class="form-control">
                                <option value="Show" @if ($contact->contact_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if ($contact->contact_status == 'Hide') selected @endif>Hide</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Details</label>
                            <textarea name="contact_detail" class="form-control snote" cols="30" rows="10">{{ $contact->contact_detail }}</textarea>
                        </div>


                        <div class="form-group mb-3">
                            <label>Map (iframe code)</label>
                            <textarea name="contact_map" style="height: 150px" class="form-control" cols="30" rows="10">{{ $contact->contact_map }}</textarea>

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
