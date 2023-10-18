@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $prodtech->title??'' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Production Technology</li>
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
                    <h5>{{ $prodtech->category->name??""}} ({{ $prodtech->parent->title??"" }})</h5>
                    <div class="ml-auto">
                        <a href="{{route('prodtech.edit',$prodtech->id)}}" class="btn btn-sm btn-warning"
                            title="Update Prodtech">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! $prodtech->description !!}
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
