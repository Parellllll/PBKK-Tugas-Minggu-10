<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card card-se p-4 p-lg-5 mb-4">
    <span class="badge bg-primary-subtle text-primary align-self-start mb-2"><?= esc($badge) ?></span>
    <h1 class="h2 fw-bold mb-2"><?= esc($heading) ?></h1>
    <p class="text-secondary mb-0"><?= esc($lead) ?></p>
</div>

<div class="row g-4">
    <?php foreach ($points as $pt): ?>
        <div class="col-md-4">
            <div class="card card-se h-100 p-4">
                <h2 class="h6 fw-bold mb-2"><?= esc($pt['title']) ?></h2>
                <p class="text-muted small mb-0"><?= esc($pt['desc']) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>

