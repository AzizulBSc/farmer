@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $details->category->name }} Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{ $details->category->name??'' }} Details</li>
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
                <div class="card-header bg-primary d-flex justify-content-end">
                    {{-- <h3 class="card-title"> </h3> --}}
                    <a href="{{ route('details.edit',$details->id) }}" class="btn btn-sm btn-warning" title="Update Details"><i class="fa fa-edit"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  {!! $details->details !!}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection
