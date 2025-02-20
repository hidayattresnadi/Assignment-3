<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-4 text-center">
    <h1 class="mb-4">Course List</h1>
</div>

<?= $content ?? '' ?>

<?= $this->endSection() ?>