@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Details</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category Details</li>
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
                <div class="card-header bg-primary">
                    <h3 class="card-title"> {{ $details->category->name }}</h3>
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
