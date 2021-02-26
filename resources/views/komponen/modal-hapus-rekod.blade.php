<div class="modal fade" id="modal-hapus-rekod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Rekod</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Adakah anda pasti untuk menghapuskan rekod yang dipilih?</div>
                <form id="form-hapus-rekod" action="" method="post">
                    @csrf
                    @method('delete')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button form="form-hapus-rekod" type="submit" class="btn btn-primary">Ya, hapus rekod.</button>
            </div>
        </div>
    </div>
</div>