<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-4">
    <span class="badge bg-primary-subtle text-primary mb-2">Page::faqs() · Named Route: page.faqs</span>
    <h1 class="h2 fw-bold mb-2">Pertanyaan yang Sering Diajukan (FAQs)</h1>
    <p class="text-muted">Ringkasan konsep Router &amp; Controller CodeIgniter 4 beserta layanan ShopEase Fresh.</p>
</div>

<div class="accordion" id="faqAccordion">
    <?php foreach ($faqs as $idx => $faq): ?>
        <div class="accordion-item border rounded-3 mb-3 overflow-hidden shadow-sm">
            <h2 class="accordion-header">
                <button class="accordion-button fw-semibold <?= $idx === 0 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $idx ?>">
                    <?= esc($faq['q']) ?>
                </button>
            </h2>
            <div id="faq<?= $idx ?>" class="accordion-collapse collapse <?= $idx === 0 ? 'show' : '' ?>" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-secondary small">
                    <?= esc($faq['a']) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>

