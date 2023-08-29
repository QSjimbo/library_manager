
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
                                <th>rent_date</th>
                                <th>return_due_date</th>
                                <th>return_date</th>
                            </thead>
                            <tbody>
                                <?php foreach($libraries as $library ): ?>
                                    <?php if($user->id === $library -> user_id): ?>
                                        <tr>
                                            <td>{{ $library -> id }}</td>
                                            <td>{{ $library -> name }}</td>
                                            <?php if($librasy -> logs->rent_date === null ): ?>
                                                <td> - </td>
                                            <?php else: ?>
                                                <td>{{ $librasy -> logs->rent_date }}</td>
                                            <?php endif ?>
                                            <td>{{ $librasy -> logs->return_due_date }}</td>
                                            <td>{{ $librasy -> logs -> return_dat }}</td>
                                        </tr>
                                    <?php endif ?>
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

