<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'url' => 'javascript:history.back()',
    'text' => 'Retour',
    'class' => '',
    'color' => 'var(--bz-color-theme-primary)',
    'size' => 'medium'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'url' => 'javascript:history.back()',
    'text' => 'Retour',
    'class' => '',
    'color' => 'var(--bz-color-theme-primary)',
    'size' => 'medium'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $sizeClasses = [
        'small' => 'text-sm',
        'medium' => 'text-base',
        'large' => 'text-lg'
    ];
    $sizeClass = $sizeClasses[$size] ?? 'text-base';
?>

<a href="<?php echo e($url); ?>" 
   class="back-arrow-link <?php echo e($sizeClass); ?> <?php echo e($class); ?>"
   style="--arrow-color: <?php echo e($color); ?>;"
   title="<?php echo e($text); ?>">
    <i class="fas fa-arrow-left"></i>
    <span class="back-text"><?php echo e($text); ?></span>
</a>

<style>
.back-arrow-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--arrow-color, var(--bz-color-theme-primary));
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 8px 12px;
    border-radius: 6px;
    background: transparent;
}

.back-arrow-link:hover {
    color: var(--arrow-color, var(--bz-color-theme-primary));
    background: rgba(236, 40, 28, 0.1);
    transform: translateX(-3px);
}

.back-arrow-link i {
    font-size: 0.9em;
    transition: transform 0.3s ease;
}

.back-arrow-link:hover i {
    transform: translateX(-2px);
}

.back-arrow-link .back-text {
    font-weight: 500;
}

/* Variantes de taille */
.back-arrow-link.text-sm {
    font-size: 0.875rem;
    padding: 6px 10px;
}

.back-arrow-link.text-lg {
    font-size: 1.125rem;
    padding: 10px 16px;
}

/* Variante avec bordure */
.back-arrow-link.bordered {
    border: 2px solid var(--arrow-color, var(--bz-color-theme-primary));
}

.back-arrow-link.bordered:hover {
    background: var(--arrow-color, var(--bz-color-theme-primary));
    color: white;
}

/* Variante avec fond */
.back-arrow-link.filled {
    background: var(--arrow-color, var(--bz-color-theme-primary));
    color: white;
}

.back-arrow-link.filled:hover {
    background: var(--bz-color-theme-secondary);
    color: var(--bz-color-common-black);
}

/* Variante outlined */
.back-arrow-link.outlined {
    background: transparent;
    color: var(--arrow-color, var(--bz-color-theme-secondary));
    border: 2px solid var(--arrow-color, var(--bz-color-theme-secondary));
    border-radius: 8px;
    padding: 10px 20px;
    transition: all 0.3s ease;
}

.back-arrow-link.outlined:hover {
    background: var(--arrow-color, var(--bz-color-theme-secondary));
    color: white;
    transform: translateX(-3px);
    box-shadow: 0 4px 15px rgba(255, 204, 0, 0.3);
}

/* Style intégré pour la page About */
.back-arrow-link.about-style {
    background: rgba(255, 204, 0, 0.1);
    color: var(--bz-color-theme-secondary);
    border: 1px solid rgba(255, 204, 0, 0.3);
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 0.9rem;
    font-weight: 400;
    transition: all 0.3s ease;
    box-shadow: none;
}

.back-arrow-link.about-style:hover {
    background: var(--bz-color-theme-secondary);
    color: var(--bz-color-common-black);
    border-color: var(--bz-color-theme-secondary);
    transform: translateX(-2px);
    box-shadow: 0 2px 8px rgba(255, 204, 0, 0.2);
}

.back-arrow-link.about-style i {
    font-size: 0.85em;
    margin-right: 6px;
}
</style> <?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/includes/main/back-arrow.blade.php ENDPATH**/ ?>