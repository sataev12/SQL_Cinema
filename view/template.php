<?php 
    ob_start(); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.min.css" integrity="sha512-i1b/nzkVo97VN5WbEtaPebBG8REvjWeqNclJ6AItj7msdVcaveKrlIIByDpvjk5nwHjXkIqGZscVxOrTb9tsMA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inspiration&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
</head>

<body>

    <section class="top-nav">
        <a href="page.php?action=acceuil">  
            <div class="logo">
                <!-- code SVG ici -->
                <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_15_23" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="23">
                        <path d="M24 0H0V23H24V0Z" fill="white"/>
                    </mask>
                    <g mask="url(#mask0_15_23)">
                        <path d="M2.34926 10.0859C2.25179 9.73736 2.25177 9.37038 2.34922 9.02184C2.44667 8.6733 2.63815 8.35548 2.9044 8.10034L8.45257 2.78335C8.7188 2.52819 9.05044 2.34469 9.41413 2.2513C9.77783 2.15791 10.1608 2.15792 10.5245 2.25134L15.7162 3.58449C15.7702 2.90288 16.0178 2.24842 16.4322 1.692L10.1792 0.0864884C9.73036 -0.0287505 9.2578 -0.0287482 8.80898 0.086496C8.36016 0.201741 7.9509 0.428167 7.62233 0.743019L0.775488 7.30457C0.446946 7.61946 0.210676 8.01166 0.0904219 8.44178C-0.0298328 8.8719 -0.0298354 9.32478 0.090414 9.75489L1.83018 15.9772C2.39892 15.561 3.07604 15.3025 3.78763 15.23L2.34926 10.0859Z" fill="#18CDCA"/>
                        <path d="M20.1649 7.59813L21.6513 12.9141C21.7488 13.2627 21.7487 13.6297 21.6513 13.9782C21.5538 14.3268 21.3623 14.6445 21.096 14.8997L15.5479 20.2168C15.2816 20.472 14.95 20.6554 14.5863 20.7488C14.2227 20.8421 13.8396 20.8421 13.476 20.7488L8.10828 19.3704C8.03265 20.0524 7.76293 20.7013 7.32855 21.2463L13.8214 22.9135C14.2702 23.0288 14.7428 23.0288 15.1915 22.9135C15.6404 22.7983 16.0496 22.5719 16.3783 22.257L23.2251 15.6955C23.5537 15.3805 23.7899 14.9884 23.9102 14.5582C24.0305 14.1281 24.0305 13.6752 23.9102 13.2451L22.1048 6.78989C21.5481 7.22534 20.8768 7.50503 20.1649 7.59813Z" fill="#18CDCA"/>
                        <path d="M1.98622 16.8353C1.54649 17.2567 1.24703 17.7937 1.12571 18.3781C1.00439 18.9626 1.06665 19.5685 1.30463 20.1191C1.5426 20.6696 1.9456 21.1402 2.46264 21.4713C2.9797 21.8024 3.58759 21.9792 4.20945 21.9792C4.83131 21.9792 5.4392 21.8024 5.95625 21.4713C6.47331 21.1402 6.87631 20.6696 7.11428 20.1191C7.35226 19.5685 7.41451 18.9626 7.29319 18.3781C7.17187 17.7937 6.87242 17.2567 6.43269 16.8353C5.84259 16.2711 5.04304 15.9542 4.20945 15.9542C3.37587 15.9542 2.57631 16.2711 1.98622 16.8353Z" fill="#4F80E1"/>
                        <path d="M17.4048 1.74803C16.9652 2.16942 16.6656 2.70631 16.5444 3.29082C16.423 3.8753 16.4853 4.48115 16.7233 5.03174C16.9612 5.58232 17.3642 6.05292 17.8812 6.384C18.3983 6.7151 19.0062 6.89182 19.628 6.89182C20.2499 6.89182 20.8578 6.7151 21.3749 6.384C21.8919 6.05292 22.2949 5.58232 22.5328 5.03174C22.7708 4.48115 22.8331 3.8753 22.7117 3.29082C22.5905 2.70631 22.291 2.16942 21.8513 1.74803C21.2613 1.18379 20.4616 0.866913 19.628 0.866913C18.7945 0.866913 17.9948 1.18379 17.4048 1.74803Z" fill="#4F80E1"/>
                        <path d="M13.8457 19.4872C13.7195 19.4872 13.5938 19.4713 13.4718 19.44L8.55835 18.1782C8.39452 17.3398 7.97006 16.5683 7.34067 15.9652C6.71127 15.3621 5.90632 14.9552 5.03143 14.7983L3.71492 10.0899C3.64965 9.85504 3.64984 9.60788 3.71548 9.37313C3.78112 9.13837 3.90991 8.92424 4.08896 8.75212L9.13211 3.91898C9.3115 3.74705 9.53495 3.62342 9.78001 3.56049C10.0251 3.49757 10.2831 3.49758 10.5282 3.56052L15.3039 4.78687C15.4933 5.62012 15.9409 6.37911 16.5881 6.96443C17.2353 7.54975 18.0519 7.93411 18.9308 8.06715L20.2848 12.9109C20.35 13.1458 20.3499 13.393 20.2842 13.6277C20.2185 13.8625 20.0898 14.0766 19.9106 14.2488L14.8675 19.0818C14.7337 19.2107 14.5743 19.313 14.3989 19.3825C14.2236 19.4521 14.0356 19.4877 13.8457 19.4872Z" fill="#4F80E1"/>
                    </g>
                </svg>
            </div>
        </a>    
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
    </label>
        <ul class="menu">
        <li>One</li>
        <li>Two</li>
        <li>Three</li>
        <li>Four</li>
        <li>Five</li>
        </ul>
    </section>

    

    
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">
                <h2 class="uk-heading-bullet"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>


    



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="public/js/script.js"></script>
</body>
</html>

<?php

$titre = "acceuil";
$titre_secondaire = "Acceuil";
$contenu = ob_get_clean();
//Inclure le fichier
require "view/template.php"; ?>