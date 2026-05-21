<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Celebrate FEST NOW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-orange: #FF6B35;
            --primary-purple: #7B2CBF;
            --dark-gray: #2D3748;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--primary-orange) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        
        .error-container {
            text-align: center;
            padding: 2rem;
        }
        
        .error-code {
            font-size: 8rem;
            font-weight: 700;
            margin: 0;
            animation: bounce 2s ease-in-out infinite;
        }
        
        @keyframes  bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .error-message {
            font-size: 2rem;
            font-weight: 600;
            margin: 2rem 0;
        }
        
        .error-description {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 3rem;
        }
        
        .btn-home {
            background-color: white;
            color: var(--primary-purple);
            font-weight: 600;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
            color: var(--primary-orange);
        }
        
        .error-icon {
            font-size: 5rem;
            margin-bottom: 2rem;
            animation: shake 3s ease-in-out infinite;
        }
        
        @keyframes  shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-gift"></i>
        </div>
        <h1 class="error-code">404</h1>
        <h2 class="error-message">Oops! Page Not Found</h2>
        <p class="error-description">
            The page you're looking for doesn't exist or has been moved.<br>
            Let's get you back to celebrating!
        </p>
        <a href="<?php echo e(app()->getLocale() === 'en' ? route('home') : route('home.localized', ['locale' => app()->getLocale()])); ?>" class="btn-home">
            <i class="fas fa-home me-2"></i> Back to Home
        </a>
        
        <?php if(isset($categories) && $categories->isNotEmpty()): ?>
        <div class="mt-5">
            <p class="mb-3">Or explore our popular categories:</p>
            <div class="d-flex justify-content-center flex-wrap gap-2">
                <?php $__currentLoopData = $categories->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($category->url); ?>" class="btn btn-outline-light btn-sm">
                    <?php echo e($category->name); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH /Users/donghuijiao/Downloads/template2 3/resources/views/errors/404.blade.php ENDPATH**/ ?>