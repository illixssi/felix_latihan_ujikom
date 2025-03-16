<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Header dan Tombol Add -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mt-4">Customers</h3>
    <button class="btn btn-primary" onclick="showModal()">Add Customer</button>
</div>

<!-- Flash Message -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<!-- Tabel Data Customer -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Fax</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= esc($customer['nama_customer']); ?></td>
                <td><?= esc($customer['alamat']); ?></td>
                <td><?= esc($customer['telp']); ?></td>
                <td><?= esc($customer['fax']); ?></td>
                <td><?= esc($customer['email']); ?></td>
                <td>
                    <button class="btn btn-warning btn-sm"
                        onclick="editCustomer(
                            <?= $customer['id_customer']; ?>,
                            '<?= esc($customer['nama_customer']); ?>',
                            '<?= esc($customer['alamat']); ?>',
                            '<?= esc($customer['telp']); ?>',
                            '<?= esc($customer['fax']); ?>',
                            '<?= esc($customer['email']); ?>'
                        )">
                        Update
                    </button>
                    <a href="<?= base_url('customers/delete/' . $customer['id_customer']); ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus?');">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Form -->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalTitle">Add Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="customerForm" method="POST" action="<?= base_url('customers/store'); ?>">
                    <input type="hidden" name="id_customer" id="id_customer">

                    <div class="mb-3">
                        <label for="nama_customer" class="form-label">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="fax" class="form-label">Fax</label>
                        <input type="text" class="form-control" id="fax" name="fax">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
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
        document.getElementById('customerForm').action = "<?= base_url('customers/store'); ?>";
        document.getElementById('modalTitle').innerText = 'Add Customer';
        document.getElementById('id_customer').value = '';
        document.getElementById('nama_customer').value = '';
        document.getElementById('alamat').value = '';
        document.getElementById('telp').value = '';
        document.getElementById('fax').value = '';
        document.getElementById('email').value = '';
        new bootstrap.Modal(document.getElementById('customerModal')).show();
    }

    function editCustomer(id, nama, alamat, telp, fax, email) {
        document.getElementById('customerForm').action = "<?= base_url('customers/update'); ?>";
        document.getElementById('modalTitle').innerText = 'Update Customer';
        document.getElementById('id_customer').value = id;
        document.getElementById('nama_customer').value = nama;
        document.getElementById('alamat').value = alamat;
        document.getElementById('telp').value = telp;
        document.getElementById('fax').value = fax;
        document.getElementById('email').value = email;
        new bootstrap.Modal(document.getElementById('customerModal')).show();
    }
</script>

<?= $this->endSection() ?>