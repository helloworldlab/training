<div class="modal fade" id="modal-hapus-rekod-pengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengesahan hapus rekod pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Adakah anda pasti untuk menghapuskan rekod yang dipilih?</p>
                <form id="form-hapus-rekod-pengguna" action="" method="post">
                    @csrf
                    @method('delete')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                <button form="form-hapus-rekod-pengguna" type="submit" class="btn btn-danger">Ya, hapus rekod</button>
            </div>
        </div>
    </div>
</div>