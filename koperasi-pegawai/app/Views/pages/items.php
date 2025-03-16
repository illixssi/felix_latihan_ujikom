<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mt-4">Items</h3>
    <button class="btn btn-primary" onclick="showModal()">Add Item</button>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Item</th>
            <th>Unit</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= esc($item['nama_item']); ?></td>
                <td><?= esc($item['uom']); ?></td>
                <td>Rp <?= number_format($item['harga_beli'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($item['harga_jual'], 0, ',', '.'); ?></td>
                <td>
                    <button class="btn btn-warning btn-sm"
                        onclick="editItem(
                            <?= $item['id_item']; ?>,
                            '<?= esc($item['nama_item']); ?>',
                            '<?= esc($item['uom']); ?>',
                            '<?= esc($item['harga_beli']); ?>',
                            '<?= esc($item['harga_jual']); ?>'
                        )">
                        Update
                    </button>
                    <a href="<?= base_url('items/delete/' . $item['id_item']); ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus?');">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="itemForm" method="POST" action="<?= base_url('items/store'); ?>">
                    <input type="hidden" name="id_item" id="id_item">

                    <div class="mb-3">
                        <label for="nama_item" class="form-label">Nama Item</label>
                        <input type="text" class="form-control" id="nama_item" name="nama_item" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit_of_measure" class="form-label">Unit</label>
                        <select class="form-select" id="unit_of_measure" name="unit_of_measure" required>
                            <option value="pcs">Pcs</option>
                            <option value="kg">Kg</option>
                            <option value="meter">Meter</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        document.getElementById('itemForm').action = "<?= base_url('items/store'); ?>";
        document.getElementById('modalTitle').innerText = 'Add Item';
        document.getElementById('id_item').value = '';
        document.getElementById('nama_item').value = '';
        document.getElementById('unit_of_measure').value = 'pcs';
        document.getElementById('harga_beli').value = '';
        document.getElementById('harga_jual').value = '';
        new bootstrap.Modal(document.getElementById('itemModal')).show();
    }

    function editItem(id, nama, unit, beli, jual) {
        document.getElementById('itemForm').action = "<?= base_url('items/update'); ?>";
        document.getElementById('modalTitle').innerText = 'Update Item';
        document.getElementById('id_item').value = id;
        document.getElementById('nama_item').value = nama;
        document.getElementById('unit_of_measure').value = unit;
        document.getElementById('harga_beli').value = beli;
        document.getElementById('harga_jual').value = jual;
        new bootstrap.Modal(document.getElementById('itemModal')).show();
    }
</script>

<?= $this->endSection() ?>