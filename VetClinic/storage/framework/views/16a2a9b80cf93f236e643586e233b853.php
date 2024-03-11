<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Home'); ?>
<?php $__env->startSection('content'); ?>
<!-- home.html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OralEase - Home</title>
    <!-- Add your stylesheet link and other meta tags here -->
    <style>
        .content {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 50px 0;
            margin-top: 2px;
            margin-bottom: 3px;
        }


        .container-fluid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .col-12 {
            flex: 5;
            padding: 20px;
        }

        .col-12 img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <img src="/back/images/loginpic.jpg" alt="dental Image">
            </div>
            <div class="col-12">
                <h1>Welcome to OralEase - Your Trusted Dental Clinics</h1>
                <p>
                   OralEase is committed to providing quality healthcare services and products. Our experienced
                   dentists are dedicated to ensuring you receive the best possible care for your health needs.
                </p>
                <p>
                    Whether you need prescriptions filled, health consultations, or access to a wide range of
                    healthcare products, OralEase is here for you.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.landing-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/LandingPage/home.blade.php ENDPATH**/ ?>