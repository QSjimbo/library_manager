@section('sidebar')
<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/library/index" class="simple-text">
                XX  Library
            </a>
        </div>
        <ul class="nav">
            <li class="link active">
                <a href="{{ url('library/index' )}}">
                    <i class="ti-book"></i>
                    <p>Book List</p>
                </a>
            </li>
            <li class="link " id="link-book-list">
                <a href="{{ url('library/history' )}}">
                    <i class="ti-user"></i>
                    <p>Borrow History</p>
                </a>
            </li>
            <li class="link">
                <a href="/logout">
                    <i class="ti-back-left"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
        <ul class="nav">
        <li class="user">
            <!-- ○○さんの部分は実際のログイン中のユーザー名とする -->
            <!-- <p>○○さんがログイン中</p> -->
            <p>{{ $user->name }}さんがログイン中</p>
    </div>
</div>
@endsection



