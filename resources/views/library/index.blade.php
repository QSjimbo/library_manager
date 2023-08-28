@extends('main')
@include('sidebar')
@include('footer')
@section('contents')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"></button>
            <span class="navbar-brand" id="page-title">Book List</span>
        </div>
    </div>
</nav>
<div id="area-book-list" class="area content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Library</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Title</th>
                            </thead>
                            <tbody>
                                <form action="{{ borrow }}" method="get">
                                    @csrf
                                    <?php foreach($libraries as $library ): ?>
                                        <tr>
                                            <td>{{ $library -> id }}</td>
                                            <td>{{ $library -> name }}</td>
                                            <td><input class="btn btn-info" type="submit" value="borrow"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

