<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                    <ul class="list-unstyled mb-0">
                        @foreach($categories as $category)
                        <li><a href="/category/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
</div>

