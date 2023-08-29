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
                                <?php foreach($libraries as $library ): ?>
                                    <tr>
                                        <td>{{ $library -> id }}</td>
                                        <td>{{ $library -> name }}</td>
                                        <td>
                                            <form action="borrow" method="get">
                                                <!-- ここに対したuser_idで表示分け -->
                                                <input class="btn btn-info" type="submit" value="borrow">
                                                <input type="hidden" name="id" value="{{ $library->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--
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
                                <?php foreach($libraries as $library ): ?>
                                    <tr>
                                        <td>{{ $library -> id }}</td>
                                        <td>{{ $library -> name }}</td>
                                        <td>
                                            <?php if($library->user_id === $user->id ) :?>
                                                <form action="return" method="post">
                                                    <input class="btn btn-danger" type="submit" value="return">
                                                    <input type="hidden" name="id" value="{{ $library->id }}">
                                                </form>
                                            <?php elseif ($library->user_id === 0):?>
                                                <form action="borrow" method="get">
                                                    <input class="btn btn-info" type="submit" value="borrow">
                                                    <input type="hidden" name="id" value="{{ $library->id }}">
                                                </form>
                                            <?php else: ?>
                                                <div class="btn btn-success">borrowing</div>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->

