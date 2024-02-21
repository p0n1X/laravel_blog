<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/category/delete">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you want to delete this Category?
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" id="delete_id" name="delete_id" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.deleteBtn').click(function (e) {
                e.preventDefault();
                var delete_id = $(this).val();
                $('#delete_id').val(delete_id);
                $('#deleteModal').modal('show');
            });


        });
    </script>
@endsection
