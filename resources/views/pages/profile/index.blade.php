@extends('layouts.app')
@section('cotent')
<section>
    <div class="card">
        <div class="card-header">
            {{-- <h5>Profile {{Auth::user()->name}}</h5> --}}
        </div>
        <div class="card-body">
            <div class=" form-group">
                <label for="" class="form-label">Nama:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class=" form-group">
                <label for="" class="form-label">Nama:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class=" form-group">
                <label for="" class="form-label">New Password:</label>
                <input type="text" class="form-control" name="password">
            </div>
            <div class=" form-group">
                <label for="" class="form-label">Confirm New Password:</label>
                <input type="text" class="form-control" class="password">
            </div>
        </div>
    </div>
</section>
@endsection