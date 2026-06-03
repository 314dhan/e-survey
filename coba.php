<!-- Button untuk memicu modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#topupModal">
    Top-up Berhasil
</button>

<!-- Modal -->
<div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topupModalLabel">Top-up Berhasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Top-up Anda berhasil terkirim!
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Top-up Berhasil',
        text: 'Top-up Anda berhasil terkirim!',
        showConfirmButton: false,
        timer: 2000 // Durasi pesan ditampilkan dalam milidetik (2 detik dalam contoh ini)
    });
</script>