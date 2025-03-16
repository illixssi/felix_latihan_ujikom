<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mt-4">Sales</h3>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Sales</th>
            <th>Customer</th>
            <th>DO Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($sales as $sale) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= esc($sale['tgl_sales']); ?></td>
                <td><?= esc($sale['nama_customer']); ?></td>
                <td><?= esc($sale['do_number']); ?></td>
                <td>
                    <span class="badge <?= ($sale['status'] == 'Completed') ? 'bg-success' : 'bg-warning'; ?>">
                        <?= esc($sale['status']); ?>
                    </span>
                </td>
                <td>
                    <a href="<?= base_url('sales/view/' . $sale['id_sales']); ?>" class="btn btn-info btn-sm">View</a>
                    <a href="<?= base_url('sales/edit/' . $sale['id_sales']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('sales/delete/' . $sale['id_sales']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>