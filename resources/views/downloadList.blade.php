@extends('layouts/main')

@section('title', 'Download List')

@section('content')
    <div class="pagetitle">
        <h1>Download List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item">Download List</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Download List</h5>
                        <a href="{{ route('export-csv') }}" class="btn btn-secondary col-12 col-md-2">Download Csv</a>
                        <!-- Default Table -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $count = 0;
                                @endphp

                                @foreach ($data as $list)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->companyname }}</td>
                                        <td>{{ $list->category }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
