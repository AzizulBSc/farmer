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
                <h1>All Category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All Category</li>
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
                    <h3 class="card-title">All Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $key }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->details)
                                    <a href="{{ route('details.index',$category->details->id) }}" ) }}" class="btn btn-sm btn-success" title="Show Details"><i class="fa fa-eye"></i></a>
                                    @endif
                                    @if(count($category->SubCategory)>0)
                                    <a href="{{ route('show.subcategory',$category->id) }}" class="btn btn-sm btn-primary" title="Show Sub Category"><i class="fa fa-list"></i></a>
                                    @endif
                                    {{-- <a href="{{ route('category.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a> --}}
                                    {{-- <a href="{{ route('category.delete', $category->id) }}"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure to delete?')">Delete</a> --}}
                                </td>
                                </tr>
                                @endforeach
                                <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item">
                            <p class="text-center">Showing {{ $categories->firstItem() }} to
                            {{ $categories->lastItem() }} of {{ $categories->total() }} entries</p>
                                {{$categories->links('pagination::bootstrap-4')}}
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endsection
