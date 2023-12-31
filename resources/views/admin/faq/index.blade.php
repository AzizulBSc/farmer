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
                <h1>All FAQ</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">All FAQ</li>
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
                    <h3 class="card-title">All FAQ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Question</th>
                                <th scope="col">Ans</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $key => $faq)
                            <tr>
                                <th scope="row">{{ $faqs->firstItem() + $key }}</th>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->ans }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('faq.edit', $faq->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> &nbsp;
                                    <form action="{{ route('faq.destroy',$faq->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                                <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                    <ul class="pagination pagination-month justify-content-center">
                        <li class="page-item">
                            <p class="text-center">Showing {{ $faqs->firstItem() }} to
                            {{ $faqs->lastItem() }} of {{ $faqs->total() }} entries</p>
                                {{$faqs->links('pagination::bootstrap-4')}}
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</section>
@endsection
