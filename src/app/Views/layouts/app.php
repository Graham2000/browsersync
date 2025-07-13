<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? 'BrowserSync' ?></title>
    <link href="/dist/output.css" rel="stylesheet">
</head>
<body>
<div class="max-w-6xl mx-auto px-4 py-8 h-screen">
    <div class="grid grid-cols-3 gap-4 h-full">
        <?php include __DIR__ . '/../partials/sidebar.php'; ?>
        
        <div class="h-full col-span-2 ml-8 p-6">
            <?php include $view; ?>
        </div>
    </div>
</div>

<?php if (isset($data['scripts']) && is_array($data['scripts'])): ?>
    <?php foreach ($data['scripts'] as $script): ?>
        <script src="<?= $script ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>  