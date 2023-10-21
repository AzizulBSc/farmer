@extends('layouts.main')
@section('styles')
<style>

</style>

@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Communication</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Communication</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('flash-message')
            <div class="card">
                <div class="card-header bg-primary d-flex">
                    <h5>Communication Details</h5>
                    <div class="ml-auto">
                        @if ($communication == null )
                        <a href="{{route('communication.create')}}" class="btn btn-sm btn-success"
                            title="Add Communication">
                            <i class="fa fa-plus"> Add</i>
                        </a>
                        @else
                        <a href="{{route('communication.edit',$communication->id??"")}}" class="btn btn-sm btn-warning"
                            title="Update Communication">
                            <i class="fa fa-edit"> Edit</i>
                        </a>
                        @endif
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! $communication->details??"" !!}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endsection
